<?php
namespace frontend\models;

use yii\redis\ActiveRecord;
class RedisModel extends ActiveRecord {
    public function attributes(){
        return ['id', 'name', 'address', 'registration_date'];
    }
}