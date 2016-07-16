<?php
namespace frontend\models;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImg extends Model {
// 	public $image;
	
// 	public function rules(){
// 		return [
// 			[['images_upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'upload'],
// 		];
// 	}
    public $image;
    
    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->image as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}