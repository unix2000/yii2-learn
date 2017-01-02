<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\TestsModel;
//use frontend\models\BehaviorsModel;
use frontend\models\EventModel;
use frontend\components\Foo;
use frontend\components\FooEvent;
use yii\base\Event;

class EventController extends Controller {
	public function actionTests(){
	    //model trigger  //init() on()
		$model = new EventModel();
		$model->trigger(EventModel::EVENT_NEW_USER);

	    // yii\base\Event tests
	    
	}
//     public function behaviors(){
//         //parent::behaviors();
        
//     }
	public function actionIndex(){
		$obj = new TestsModel();
		//绑定在全局函数
// 		$this->on('ea', 'globals_tests','data tests');
		$this->on('ea', 'globals_tests',['username' => 'liner.xie','email' => 'liner.xie@qq.com']);
		//绑定在对象
		$this->on('eb', [$obj,'do_one'],'Events b data test');
		//绑定在class
// 		$this->on('ec',['SomeClass','function_name'],'datas');
		
		//回调
		$this->on('ed', function($data){
			echo 'events d tests';
			dump($data->name);
			//$data 参数具体内容请查看相关dump
			dump($data->sender);
		});
		//触发
		//$this->trigger('ea');
		//$this->trigger('eb');
		$this->trigger('ed');
				
		//obj extend Component
//         Event::on($class, $name, $handler);
//         Event::trigger($class, $name);
// 		$obj = new FooEvent();
// 		Event::on(FooEvent::className(), FooEvent::EVENT_HELLO, function ($event) {
// 		    //echo $event->sender;  // displays "app\models\Foo"
// 		    echo $event->name;
// 		});
		
// 		Event::trigger(FooEvent::className(), FooEvent::EVENT_HELLO);
	}
}