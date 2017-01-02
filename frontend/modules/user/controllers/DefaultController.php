<?php

namespace frontend\modules\user\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        // dump($this->module);
        return $this->render('index');

        //第一种调用方法
        // $module = \frontend\modules\user\Module::getInstance();

        //第二种调用方法
        // $module = \Yii::$app->getModule('users');

        //第三种调用
        // $module = \Yii::$app->controller->module;
        // dump($module);
        // dump($module->params);
    }
}
