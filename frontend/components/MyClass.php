<?php
namespace frontend\components;
use yii\base\Object;

class MyClass extends Object {
	public $prop1;
	public $prop2;
	public function __construct($param1,$param2,$config=[]){
		//配置生效前的初始化过程
		parent::__construct($config);
	}
	public function init(){
		parent::init();
		//配置生效后的初始化过程
	}
}