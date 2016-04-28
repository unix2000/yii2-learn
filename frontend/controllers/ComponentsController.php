<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\components\MyClass;
use frontend\components\Foo;
use frontend\components\FooEvent;
use yii\base\Event;

class ComponentsController extends Controller {
	public function actionIndex(){
		// $component = new MyClass(1,2,['prop1'=>3,'prop2'=>4]);
		// $component = \Yii::createObject([
		// 	'class' => MyClass::ClassName(),
		// 	'prop1' => 3,
		// 	'prop2' => 4,
		// ], [1, 2]);
		// dump($component);
		//yii2只读与只写
		//$label_object = new Foo();
		//echo $label_object->setLabel(11);
		//echo $label_object->Label = 11;
        //event
// 	    $foo = new Foo;	    
// 	    // 处理器是全局函数
// 	    $foo->on(Foo::EVENT_HELLO, 'function_name');	    
// 	    // 处理器是对象方法
// 	    $foo->on(Foo::EVENT_HELLO, [$object, 'methodName']);	    
// 	    // 处理器是静态类方法
// 	    $foo->on(Foo::EVENT_HELLO, ['app\components\Bar', 'methodName']);	    
// 	    // 处理器是匿名函数
// 	    $foo->on(Foo::EVENT_HELLO, function ($event) {
// 	        //事件处理逻辑
// 	    });
	    
	    $foo = new FooEvent();
//         dump($foo->bar());
        
	    $foo->on(FooEvent::EVENT_HELLO, function ($event) {
	        echo $event->data;
	    }, 'abc');	    
	}
}