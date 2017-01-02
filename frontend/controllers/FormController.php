<?php
namespace frontend\controllers;

use yii\web\Controller;

class FormController extends Controller {
	public function actionIndex(){
		$this->layout='@app/views/layouts/column_2.php';
		return $this->render('index');
	}
}