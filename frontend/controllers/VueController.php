<?php
namespace frontend\controllers;

use yii\web\Controller;
class VueController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
	public function actionHttp()
	{
		return $this->render('http');	
	}
	public function actionVueResource()
	{
		return $this->render('vue-resource');
	}
	public function actionRoute()
	{
		return $this->render('route');
	}
	public function actionVuex()
	{
		return $this->render('vuex');
	}
}