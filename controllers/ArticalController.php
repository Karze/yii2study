<?php

namespace app\controllers;

use app\components\Controller;

class ArticalController extends Controller
{
    public function actionIndex()
    {
        var_dump(123);exit;
        return $this->render('index');
    }

}
