<?php
namespace frontend\components;
use yii\base\Object;

class Foo extends Object {
    //属性
	private $_label;
	public $_value;
	public function __construct(){
		
	}
	public function setLabel($value){
		$this->_label = trim($value);
	}
	public function getLabel(){
		return $this->_label;
	}
}