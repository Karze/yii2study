<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface
{
    public function rules()
    {
        return [
            // name, email, subject 和 body 属性必须有值
            [['username', 'password'], 'required'],
        ];
    }

    //软删除
//    public function delete()
//    {
//        $this->deleted_at = date("Y-m-d H:i:s", time());
//        $this->save();
//    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);//新建时保存hash
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //foreach (self::$users as $user) {
        //    if ($user['accessToken'] === $token) {
        //        return new static($user);
        //    }
        //}
        //
        //return null;
        return static::find()->where(['access_token' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //foreach (self::$users as $user) {
        //    if (strcasecmp($user['username'], $username) === 0) {
        //        return new static($user);
        //    }
        //}
        //
        //return null;

        return static::find()->where(['username' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //$hash = Yii::$app->security->generatePasswordHash($password);
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function isAdmin()
    {
        return $this->role == 0;
    }
}
