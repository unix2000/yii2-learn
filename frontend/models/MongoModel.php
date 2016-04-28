<?php
namespace frontend\models;

use yii\mongodb\ActiveRecord;
class MongoModel extends ActiveRecord {
    public static function collectionName(){
        return 'customer';
    }

    public function attributes(){
        return ['_id', 'name', 'email', 'address', 'status'];
    } 
}