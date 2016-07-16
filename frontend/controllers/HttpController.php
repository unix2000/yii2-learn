<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\httpclient\Client;

class HttpController extends Controller {
	public function actionIndex(){
		$client = new Client();
		$response = $client->createRequest()
		    ->setMethod('get')
		    ->setUrl('http://phalapi.oschina.mopaas.com/Public/demo/')
		    //->setData(['name' => 'John Doe', 'email' => 'johndoe@domain.com'])
		    ->send();
		if ($response->isOk) {
		    dump($response->data);
		}
	}
} 