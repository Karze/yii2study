<?php

namespace app\models;

use app\components\DictModel;
use Yii;

/**
 * This is the model class for table "dict_major".
 *
 * @property int $id
 * @property string $name
 */
class DictMajor extends DictModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dict_major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t("app", "Name"),
        ];
    }
}
