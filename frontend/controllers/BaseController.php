<?php
namespace frontend\controllers;
use yii\web\Controller;

class BaseController extends Controller {
    public $request;
    public $response;
    //public $cookies;
    public $request_cookies;
    public $response_cookies;
    public $session;
    public $view;
    public $cache;
    
    public function init(){
        //phalcon
//         $this->request = \Yii::$app->getRequest();
//         $this->response = \Yii::$app->getResponse();
        $this->request = \Yii::$app->request;
        $this->response = \Yii::$app->response;
        $this->request_cookies = \Yii::$app->getRequest()->getCookies();
        $this->response_cookies = \Yii::$app->getResponse()->getCookies();
        $this->session = \Yii::$app->getSession();
        $this->view = \Yii::$app->view; 
        $this->cache = \Yii::$app->cache;
    }
    public function actions(){
        return [];
    }
//     public function behaviors(){
        
//     }
    public function actionC(){}
    public function actionR(){}
    public function actionU(){}
    public function actionD(){}
}