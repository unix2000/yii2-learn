<?php
namespace frontend\controllers;

use yii\web\Cookie;
use yii\web\Response;
use yii\web\Controller;
// use frontend\components\PhpArrayFormatter;
// use yii\web\Response;
use frontend\models\Items;
use Yii;

class ResponseController extends Controller {
	public function actionFor(){
		// \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		// \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
		$data = Items::find()->limit(5)->asArray()->all();
		$callback = Yii::$app->request->get('callback',null);
		$format = $callback ? Response::FORMAT_JSONP : Response::FORMAT_JSON;
        Yii::$app->response->format = $format;
        
		if($callback){
			return array(
				'callback' => $callback,
				'data' => $data
			);
		}
		return $data;		
		//dump($data);
		//return $data;
	}
    public function actionTest(){
        $data = array(
            'ret' => 1,
            'data' => [
                'username' => 'liner',
                'nickname' => 'liner.xie',
            
			],
			'messages' => 'success',
        
			);
        //return json_output($data);
        return xml_output($data);
    }
    public function actionIndex(){
//        $cookies = $this->response_cookies;
        $cookies = \Yii::$app->getResponse()->getCookies();
        $data = array(
            'name' => 'username',
            'value' => 'liner',
        );
        //$cookies->add(new Cookie($data));
        //$cookies->remove('username');
        //remove( $cookie, $removeFromBrowser = true )
        //setcookie("username", "", time()-3600);
        $cookies->add(new Cookie($data));
        dump($this->request->cookies->get('username')->value); //getValue
        //unset($cookies['username']);
    }
    public function actionFormat(){
//         $result = array('code' => $code, 'msg' => $msg, 'data' => $data);
//         $callback = Yii::$app->request->get('callback',null);
        
//         $format = $callback ? Response::FORMAT_JSONP : Response::FORMAT_JSON;
//         Yii::$app->response->format = $format;
        
//         if($callback){
//             return array(
//                 'callback' => $callback,
//                 'data' => $result
//             );
//         }
//         return $result;
        
//         return \Yii::createObject([
//             'class' => 'yii\web\Response',
//             'format' => \yii\web\Response::FORMAT_JSON,
//             'data' => [
//                 'message' => 'hello world',
//                 'code' => 100,
//             ],
//         ]);
        //$format = \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //$format = \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
//         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
//         $data = array('username'=>'liner','nickname'=>'谢小林');
        //root node <response></response>
//         \Yii::$app->response->format = 'php';
//         \Yii::$app->response->format = \Yii::$app->response->formatters([
//             PhpArrayFormatter,
//         ]);
        //错误写法 更改root node response
//         \Yii::$app->response->formatters = [
//             Response::FORMAT_XML => ['class' => 'yii\web\XmlResponseFormatter','rootTag'=>'xml'],
//         ];
        //正确写法,改为微信接口格式
        //$data = ['some--中文', 'array', 'of', 'data' => ['associative', 'array']];
        $data = [
            'FromUserName' => 'oauth_id_abcdefgh',
            'ToUserName' => 'oauth_id_ijklmnopqrst',
        ];
        $response = \Yii::createObject([
            'class' => Response::className(),
            'format' => Response::FORMAT_XML,
            'data' => $data
        ]);
        // \Yii::$app->response->formatters[Response::FORMAT_XML] = [ //写法错误
        $response->formatters[Response::FORMAT_XML] = [ 
            //两种class写法都正确
            'class' => 'yii\web\XmlResponseFormatter',
            //'class' => $response->formatters[Response::FORMAT_XML],
            'rootTag' => 'xml',
            //'contentType' => 'text/html',
        ];
        //$items = ['some', 'array', 'of', 'data' => ['associative', 'array']];
        //return $items;
        return $response;
    }
}