<?php
namespace frontend\models;

use yii\db\ActiveRecord;
// class Tree extends \kartik\tree\models\Tree {
//     public static function TableName(){
//         return 'tbl_tree';
//     }
// }

class Tree extends ActiveRecord {
    use \kartik\tree\models\TreeTrait;
    public static function TableName(){
        return 'tbl_tree';
    }
}