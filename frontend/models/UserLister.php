<?php
namespace frontend\models;
use yii\base\Object;

class UserLister extends Object {
	public $finder;
	
	public function __construct(UserFinderInterface $finder, $config = []) {
		$this->finder = $finder;
		parent::__construct($config);
	}
} 