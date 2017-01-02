<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use frontend\models\Items;

class Types extends ActiveRecord {
	public static function tableName(){
		return 'types';
	}
	public function getItems(){
		return $this->hasMany(Items::className(),['types_id' => 'id']);
	}
}