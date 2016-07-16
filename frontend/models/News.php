<?php
namespace frontend\models;

// use yii\base\Model;

use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

class News extends ActiveRecord {
    public static function tableName(){
        return '{{%news}}';
    }
    
    public function behaviors() {
        return [
            [
                //auto add slug
                'class' => SluggableBehavior::className(),
                'attribute' => 'title', 
                //'slugAttribute' => 'slug',
            ],
        ];
    }
}