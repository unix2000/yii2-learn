<?php
namespace frontend\controllers;
use yii\helpers\Json;
use yii\web\Controller;

class ChatController extends Controller {
    public function actionIndex(){
        if (\Yii::$app->request->post()) {
            $name = \Yii::$app->request->post('name');
            $message = \Yii::$app->request->post('message');
                    
            return \Yii::$app->redis->executeCommand('PUBLISH', [
                'channel' => 'notification',
                'message' => Json::encode(['name' => $name, 'message' => $message])
            ]);
        
        }
        return $this->render('index');
    }
}