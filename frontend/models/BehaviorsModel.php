<?php
namespace frontend\models;

use yii\base\Model;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use frontend\component\TestsBehavior;

class BehaviorsModel extends Model {
    public function behaviors(){
    	return [
    		TestsBehavior::className()
    	];
    }
}