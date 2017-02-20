<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Items;
class ItemsController extends Controller
{
    public function actions() {
        return [
            'create' => [
                'class' => 'frontend\actions\CreateAction',
                'modelClass' => Items::className()
            ],
            'index' => [
                'class' => 'frontend\actions\IndexAction',
                'modelClass' => Items::className()
            ],
            'view' => [
                'class' => 'frontend\actions\ViewAction',
                'modelClass' => Items::className()
            ],
            'delete' => [
                'class' => 'frontend\actions\DeleteAction',
                'modelClass' => Items::className()
            ],
        ];
    }
}