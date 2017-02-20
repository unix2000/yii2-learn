<?php
namespace frontend\controllers;
use yii\web\Request;
class RequestController extends BaseController{
    public function actionIndex(){
		//Request $req
        //phalcon2 
//         if($this->request_cookies->has('username')){
//             //echo $this->cookies->getValue('username');
//             echo $this->request_cookies->get('username');
//         }
//         if ($this->request->isAjax()) 
// 		$this->request->isPost();
// 		$this->request->isGet();
// 		$this->request->get('sex',1);
// 		$this->request->baseUrl;
// 		$this->request->cookies->add($cookie);
		//dump(\Yii::$app->getRequest()->getCookies());
		//dump(\Yii::$app->request);
		$req = new Request;
		dump($req->isGet);
    }
    
    public function actionFilters(){
        //middle software
        
    }
}