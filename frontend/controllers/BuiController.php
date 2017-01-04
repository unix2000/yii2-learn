<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Items;

class BuiController extends Controller 
{
    public function actionListbox()
    {
    	return $this->render('listbox');
    }
    public function actionGrid()
    {
        return $this->render('grid');
    }
    public function actionDatas()
    {
		$req = \Yii::$app->getRequest();
		if ($req->isAjax){
			$start = $req->get('start');
			$limit = $req->get('limit');
			$count = Items::find()->count();
			$data = Items::find()
				->select(['id','name','email','address'])
				->offset($start)
				->limit($limit)
				->asArray()
				->all();
			$arr = array();
			$arr['rows'] = $data;
			$arr['results'] = $count;
			$arr['hasError'] = false;
			echo json_encode($arr);
		}
    }
}