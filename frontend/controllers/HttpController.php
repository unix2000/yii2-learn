<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\httpclient\Client;

class HttpController extends Controller {
	public function actionIndex(){
		$client = new Client();
		$response = $client->createRequest()
		    ->setMethod('get')
		    ->setUrl('https://api.douban.com/v2/movie/top250?count=10')
		    // ->setUrl('http://phalapi.oschina.mopaas.com/Public/demo/')
		    //->setData(['name' => 'John Doe', 'email' => 'johndoe@domain.com'])
		    ->send();
		if ($response->isOk) {
		    dump($response->data);
		}
	}
	public function actionJqueryAjax()
	{
		return $this->render('jquery-ajax.php');
	}
} 