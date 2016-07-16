<?php
namespace frontend\controllers;

class RequestController extends BaseController{
    public function actionIndex(){
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
		dump(\Yii::$app->getRequest()->getCookies());
    }
    
    public function actionFilters(){
        //middle software
        
    }
}