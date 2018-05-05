<?php

namespace app\models;

use app\components\DictModel;
use Yii;

/**
 * This is the model class for table "dict_department".
 *
 * @property int $id
 * @property string $name
 */
class DictDepartment extends DictModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dict_department';
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public static function getMap()
    {
        $map = [];

        $models = DictDepartment::find()->all();
        foreach ($models as $model) {
            $map[$model->id] = $model->name;
        }

        return $map;
    }
}
