<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\News;
use yii\web\NotFoundHttpException;

class NewsController extends Controller {
    public function actionIndex(){
        //slug tests
        $obj = new News();
//         for ($i = 1; $i < 1000; $i++) {
//             $obj->title = 'title-slug' .$i;
//             $obj->content = 'content-hello-slug-tests' .$i;
//             $obj->insert();
//         }
        //$obj->content = "hello-world";
        //$obj->save();
        $data = $obj->find()->limit(10)->all();
        return $this->render('index',[
            'data' => $data
        ]);
    }
    
    protected function findModelBySlug($slug)
    {
        if (($model = News::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
    
    public function actionView($slug)
    {
        dump($this->findModelBySlug($slug));
    }
}