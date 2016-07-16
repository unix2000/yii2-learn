<?php
namespace frontend\models;

use yii\base\Model;
use yii\base\Event;

class EventModel extends Model {
	const EVENT_NEW_USER = 'new-user';
	public function init(){
		$this->on(self::EVENT_NEW_USER, [$this, 'sendMail']);
  		$this->on(self::EVENT_NEW_USER, [$this, 'notification']);
	}

	public function sendMail($event){
	   echo 'mail sent to admin <br />';
	}

	public function notification($event){
	  echo 'notification created <br />';
	}
}