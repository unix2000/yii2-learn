<?php
namespace api\controllers;

//use yii\rest\Controller;
use yii\rest\ActiveController;
//Yii 将在末端使用的控制器的名称自动变为复数,可以用 yii\rest\UrlRule::$pluralize-属性来配置此项
// /items 类似于rails on ruby大量使用复数
class ItemController extends ActiveController {
	public $modelClass = 'frontend\models\Items';
}
