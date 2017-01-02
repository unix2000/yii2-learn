<?php
namespace frontend\controllers;
use yii\web\Controller;

class SemanticController extends Controller
{
	public $layout = 'semantic';
	public function actionIndex()
	{
		return $this->render('index');
	}
}