<?php
namespace frontend\controllers;

use yii\web\Controller;

class MetroController extends Controller 
{
	public $layout = "metro";
	public function actionIndex()
	{
		return $this->render('index');
	}
}