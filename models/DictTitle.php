<?php

namespace app\models;

use app\components\DictModel;
use Yii;

/**
 * This is the model class for table "dict_title".
 *
 * @property int $id
 * @property string $name
 */
class DictTitle extends DictModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dict_title';
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
