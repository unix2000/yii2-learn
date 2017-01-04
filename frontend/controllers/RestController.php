<?php
namespace frontend\controllers;
// use yii\rest\ActiveController;

class RestController extends \yii\rest\Controller {
    public function actionIndex()
	{
		return [ 'foo' => 'bar' ];
	}
}