<?php
namespace frontend\models;
use yii\base\Model;

class TestsModel extends Model {
	const EVENT_TEST='event_test';
	
	public function do_one($param){
		//echo $param->data;
		// 停止执行此事件的后续处理程序
		$param->handled = true;
		dump($param->data);
		//嵌套绑定测试
		
	}
	public function do_two($param){
// 		echo $param->data;
		dump($param->data);
	}
}