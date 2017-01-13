<?php
namespace api\controllers;

//use yii\rest\Controller;
use yii\rest\ActiveController;
//Yii 将在末端使用的控制器的名称自动变为复数,可以用 yii\rest\UrlRule::$pluralize-属性来配置此项
// /items 类似于rails on ruby大量使用复数
use yii\rest\Controller;
use frontend\models\Items;
use yii\web\Response;
use yii\base\Event;

// class ItemController extends ActiveController {
// 	public $modelClass = 'frontend\models\Items';
// }

class ItemController extends Controller 
{
	public function init(){
		parent::init();

		//以下代码未生效 ？ 暂放全局 见main.php
// 		\Yii::$app->on(Response::EVENT_BEFORE_SEND, function ($event) {
//     	    $response = $event->sender;
//             if ($response->data !== null) {
//                 $return = ($response->statusCode == 200 ? $response->data : $response->data['message']);
//                 $response->data = [
//                     'success' => ($response->statusCode === 200),
//                     'status' => $response->statusCode,
//                     'data' => $return
//                 ];
//             }
//         });
//         \Yii::$app->trigger('EVENT_BEFORE_SEND',new Event(['sender' => $this]));
//         \Yii::$app->trigger(Response::EVENT_BEFORE_SEND);
	}
	public function actionIndex()
	{
		// return ['usernmae' => 'liner.xie' ];
		// $data = Items::find()->limit(10)->asArray()->all();
		$q = new \yii\db\Query();
		$data = $q->select([ 'id', 'name', 'email' ])
			->from('items')
			->limit(5)
			->all();
		return $data;
	}
}
