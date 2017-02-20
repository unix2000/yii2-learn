<?php
namespace frontend\controllers;

use yii\web\Controller;
class VueController extends Controller
{
	public function actionComponent()
	{
	    return $this->render('component');
	}
    public function actionApiData()
	{
	    //获取api.dev数据
	    return $this->render('api-data');
	}
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
	//element ui
	public function actionElement()
	{
		return $this->render('element');
	}
	public function actionForm()
	{
		return $this->render('form');
	}
	public function actionUp()
	{
		return $this->render('upload');
	}
	public function actionRate()
	{
		return $this->render('rate');
	}
	public function actionTree()
	{
		return $this->render('tree');
	}
	public function actionTable()
	{
		return $this->render('table');
	}
	public function actionStep()
	{
		return $this->render('step');
	}
}