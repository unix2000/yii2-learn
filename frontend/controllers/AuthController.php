<?php
namespace frontend\controllers;

class AuthController extends BaseController {
	public function actions(){
        return [
            'login' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    public function successCallback($client){
        $attributes = $client->getUserAttributes();
        // 用户的信息在$attributes中，以下是您根据您的实际情况增加的代码
    	// 如果您同时有QQ互联登录，新浪微博等，可以通过 $client->id 来区别。
    }
    public function actionIndex(){
    	//return $this->render('index');
    	dump($this->request);
    }
}