<?php

namespace app\models;

use app\components\DictModel;
use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $name 姓名
 * @property int $title_id 职称id
 * @property int $department_id 院系id
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class Teacher extends DictModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_id', 'department_id'], 'integer'],
            [['name', 'title_id', 'department_id'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'PName'),
            'title_id' => Yii::t('app', 'Title'),
            'department_id' => Yii::t('app', 'Department'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }
}
