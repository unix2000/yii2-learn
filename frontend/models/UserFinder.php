<?php
namespace frontend\models;

use yii\base\Object;
use yii\db\Connection;
use yii\di\Container;

class UserFinder extends Object implements UserFinderInterface {
	public $db;
	
	public function __construct(Connection $db, $config = []){
		$this->db = $db;
		parent::__construct($config);
	}
	
	public function findUser(){
		echo 'function-findUser()';
	}
}