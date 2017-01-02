<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\web\Request;
use yii\filters\AccessControl;
use yii\web\HttpException;
use yii\helpers\Url;
use frontend\models\Tree;
use Yii;

class TestsController extends Controller {
// class TestsController extends BaseController {
    public function actionTest()
    {
        // du(Yii::$app->extensions); //默认返回@vendor/yiisoft/extensions.php
        // du(Yii::$app->layout);
        // du(Yii::$app->layoutPath);
        // du(Yii::$app->viewPath);
        // du(Yii::$app->runtimePath);
        // du(Yii::$app->vendorPath);
        
    }
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				// Specifies the actions that the rules should be applied to
				'only' => ['secure'],
				// The rules surrounding who should and should not have access to the page
				'rules' => [
					[
						'allow' => true,
						'matchCallback' => function($rule,$action) {
							return !\Yii::$app->user->isGuest && \Yii::$app->user->identity->role->id === 2;
						}
					],
				],
				// The action that should happen if the user shouldn't have access to the page
				'denyCallback' => function ($rule, $action) {
					if (\Yii::$app->user->isGuest)
						return $this->redirect(Url::to('/site/login'));
					else
						throw new HttpException('403', '你没有权限访问此页面');
				},
			],
		];
	}
    public function actionHello(){
        // $this->layout = false;
        // echo 'ab webbench tests';
        du(\Yii::$app->user->identity);
        return $this->render('hello');
    }
    public function actionContainer(){
        
    }
    public function actionEvent(){
        
    }
    public function actionComponent(){
        
    }
    public function actionService(){
        du(\Yii::$app->security);
    }
    public function actionCluster(){
        
    }
    public function actionIndex(){
//         $controller = \Yii::$app->controller->id;
//         $action = \Yii::$app->controller->action->id;
//         echo $controller.'-----'.$action;
        
        //repository
        // dump($this->repo->findOneById(1));
        // dump($this->repo->limit(5)->findAll());
        // dump($this->repo->limit(6)->findManyBy('email','liner.xie@qq.com'));
        dump($this->repo->searchByCriteria());
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