<?php
namespace frontend\controllers;

class ReactController extends \yii\web\Controller 
{
	public $layout = 'react';
	public function actionIndex()
	{
		return $this->render('index');
	}
}