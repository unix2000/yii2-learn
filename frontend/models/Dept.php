<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class Dept extends ActiveRecord 
{
	public static function tableName()
	{
		return 'department';
	}
}