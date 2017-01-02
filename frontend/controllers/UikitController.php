<?php
namespace frontend\controllers;
use yii\web\Controller;

class UikitController extends Controller 
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}