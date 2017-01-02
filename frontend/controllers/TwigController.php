<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Items;

class TwigController extends Controller {
	public function actionIndex(){
		//swig template
		$data = Items::find()->limit(100)->asArray()->all();
		return $this->render('index.twig',[
		    'email' => 'liner.xie@qq.com',
			'data' => $data
		]);
	}
}