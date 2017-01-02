<?php
namespace frontend\controllers;

use yii\web\Controller;

class JuiController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}