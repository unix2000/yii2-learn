<?php

namespace frontend\modules\user\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        dump($this->module);
        return $this->render('index');
    }
}
