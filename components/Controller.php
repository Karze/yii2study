<?php
/**
 * Created by PhpStorm.
 * User: crrki
 * Date: 2018/3/17
 * Time: 15:38
 */

namespace app\components;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class Controller extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}