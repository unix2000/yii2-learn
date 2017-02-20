<?php
namespace frontend\models;

use yii\db\ActiveRecord;
use frontend\models\Types;
class Items extends ActiveRecord {
	//Active Record events
	//EVENT_INIT
	//EVENT_BEFORE_UPDATE
	//EVENT_BEFORE_INSERT
	//EVENT_BEFORE_DELETE
	//EVENT_AFTER_UPDATE
	//EVENT_AFTER_INSERT
	//EVENT_AFTER_DELETE
	//EVENT_AFTER_FIND
    // public static function primaryKey(){
    //     return 'id';
    // }
    public function rules(){
        return [
            [['name','email'],'required'],
            ['email','email'],
            [['images_upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'upload'],
        ];
    }
    //phalcon function getSource()
    public static function tableName(){
        return 'items';
    }
    public function getTypes(){
    	return $this->hasOne(Types::className(),['id' => 'types_id']);
    }
}