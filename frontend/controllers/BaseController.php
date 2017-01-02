<?php
namespace frontend\controllers;
use yii\web\Controller;
// use Yii as core;
use Yii;
use frontend\repositories\interfaces\IBaseRepository;
use yii\web\Response;
class BaseController extends Controller {
    protected  $request;
    protected  $response;
    //public $cookies;
    protected  $request_cookies;
    protected  $response_cookies;
    protected  $session;
    protected  $view;
    public $cache;
    protected $repo;
    
    public function init(){
        parent::init();
        Yii::$container->set(\frontend\repositories\interfaces\IBaseRepository::class, [
            'class' => \frontend\repositories\BaseRepository::class
        ]);
        Yii::$container->set('BaseRepository', function($container, $params, $config){
            return new \frontend\repositories\BaseRepository(new \frontend\models\Items());
        });
        $this->repo = Yii::$container->get('BaseRepository');
        // Yii::$app->response->format = Response::FORMAT_JSON;

        //phalcon
//         $this->request = \Yii::$app->getRequest();
//         $this->response = \Yii::$app->getResponse();
        $this->request = \Yii::$app->request;
        $this->response = \Yii::$app->response;
        //$this->request_cookies = \Yii::$app->getRequest()->getCookies();
        //$this->response_cookies = \Yii::$app->getResponse()->getCookies();
        $this->session = \Yii::$app->getSession();
        $this->view = \Yii::$app->view; 
        $this->cache = \Yii::$app->cache;
    }
    
    //beforeAction
    public function beforeAction($action){
//         dump($action);
//         $app = Yii::$app;
//         echo 'this is a beforeAction';
//         if($app->getUser()){
//             $app->getResponse()->redirect(['site/login']);  
//         }
        return parent::beforeAction($action);
    }
    
    //afterAction
    public function afterAction($action, $result){
//         dump($action);
//         echo "<br />";
//         echo 'this is a afterAction';
//         dump($result);
    }
    
//     public function actions(){
//         return [];
//     }
//     public function behaviors(){
        
//     }

    // public function verbs()
    // {
    //     return [
    //         'create'   => ['POST'],
    //         'delete'   => ['DELETE'],
    //         'update'   => ['PUT'],
    //         'index'    => ['GET'],
    //         'show'     => ['GET'],
    //         'delete-multiple' => ['DELETE']
    //     ];
    // }
    
    //只返回Response::FORMAT_JSON或XML
    // public function actionIndex()
    // {
    //     return $this->repo->searchByCriteria();
    // }
    // public function actionCreate(){
    //     $data = Yii::$app->request->post();
    //     $post = $this->repo->create($data);
    //     return $post;
    // }
    // public function actionShow($id){
    //     return $this->repo->findOneById($id);
    // }
    // public function actionUpdate(){
    //     $data = Yii::$app->request->post();
    //     $post = $this->repo->updateOneById($id, $data);
    //     return $post;
    // }
    // public function actionDelete($id){
    //     $this->repo->deleteOneById($id);
    // }
    // public function actionDeleteMultiple()
    // {
    //     $ids = Yii::$app->request->post()['ids'];
    //     $deletedCount = $this->repo->deleteManyByIds($ids);
    // }
}