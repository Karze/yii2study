<?php
/**
 * Created by PhpStorm.
 * User: crrki
 * Date: 2018/5/2
 * Time: 18:11
 */

namespace app\components;


use yii\db\ActiveRecord;

class DictModel extends ActiveRecord
{
    public static function getMap()
    {
        $map = [];

        $models = self::find()->all();
        foreach ($models as $model) {
            $map[$model->id] = $model->name;
        }

        return $map;
    }
}