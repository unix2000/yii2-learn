<?php
namespace frontend\controllers;
use yii\web\Controller;
// use Yii as core;
use Yii;

class BaseController extends Controller {
    protected  $request;
    protected  $response;
    //public $cookies;
    protected  $request_cookies;
    protected  $response_cookies;
    protected  $session;
    protected  $view;
    public $cache;
    
    public function init(){
        //phalcon
//         $this->request = \Yii::$app->getRequest();
//         $this->response = \Yii::$app->getResponse();
        $this->request = \Yii::$app->request;
        $this->response = \Yii::$app->response;
        //$this->request_cookies = \Yii::$app->getRequest()->getCookies();
        //$this->response_cookies = \Yii::$app->getResponse()->getCookies();
        $this->session = \Yii::$app->getSession();
        $this->view = \Yii::$app->view; 
        $this->cache = \Yii::$app->cache;
    }
    
    //beforeAction
    public function beforeAction($action){
//         dump($action);
//         $app = Yii::$app;
//         echo 'this is a beforeAction';
//         if($app->getUser()){
//             $app->getResponse()->redirect(['site/login']);  
//         }
        return parent::beforeAction($action);
    }
    
    //afterAction
    public function afterAction($action, $result){
//         dump($action);
//         echo "<br />";
//         echo 'this is a afterAction';
//         dump($result);
    }
    
//     public function actions(){
//         return [];
//     }
//     public function behaviors(){
        
//     }
    public function actionC(){}
    public function actionR(){}
    public function actionU(){}
    public function actionD(){}
}