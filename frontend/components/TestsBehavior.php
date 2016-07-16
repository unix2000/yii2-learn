<?php
namespace frontend\components;
use yii\base\Behavior;

class TestsBehavior extends Behavior {
	public function do_something(){
		echo 'do something';
	}
}