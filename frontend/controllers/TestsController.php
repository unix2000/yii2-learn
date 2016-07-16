<?php
namespace frontend\controllers;
use yii\web\Controller;

// class TestsController extends BaseController {
class TestsController extends Controller {
    public function actionHello(){
        $this->layout = false;
        echo 'ab webbench tests';
    }
    public function actionContainer(){
        
    }
    public function actionEvent(){
        
    }
    public function actionComponent(){
        
    }
    public function actionService(){
        
    }
    public function actionCluster(){
        
    }
    public function actionIndex(){
//         $controller = \Yii::$app->controller->id;
//         $action = \Yii::$app->controller->action->id;
//         echo $controller.'-----'.$action;
        
    }
    public function actionTree(){
        return $this->render('tree');
    }
    public function actionRequest(){
        var_dump(\Yii::$app->request);
    }
    public function actionResponse(){
        
    }
    public function actionSession(){
        $session = \Yii::$app->session;
        if (!$session->isActive){
            $session->open();
        }
        //var_dump(\Yii::$app->response);
        //var_dump($this->session);
        if($this->session->has('username')){
            var_dump($this->session->get('username'));
        } else {
            $this->session->set('username', 'liner');
            $this->session->set('session_array', array(
                'username' => 'liner',
                'dept_id' => '28',
            ));
            var_dump($this->session->get('session_array'));
            var_dump($this->session->get('username'));
        }
    }
    public function actionCache(){
        dump($this->cache);
    }
    public function actionCookies(){
        
    }
    public function actionView(){
        
    }
    public function actionMail(){
        //swiftmailer
        \Yii::$app->mailer->compose('templates')
            ->setFrom("liner.xie@qq.com")
            ->setTo("linux8000@qq.com")
            ->setSubject("邮件主题")
            ->send();
    }
}