<?php
namespace frontend\models;

use yii\db\ActiveRecord;
class Items extends ActiveRecord {
    public function rules(){
        return [
            [['images_upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'upload'],
        ];
    }
    //phalcon function getSource()
    public static function tableName(){
        return 'items';
    }
}