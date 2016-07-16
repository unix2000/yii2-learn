<?php
namespace frontend\controllers;

use yii\web\Controller;

class RouteController extends Controller {
    public function actionTypes($types){
        $params = explode('/', $types);
        print_r($params);
    }
}