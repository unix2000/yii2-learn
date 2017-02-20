<?php
namespace frontend\controllers;
use Yii;
use yii\helpers\ArrayHelper;
use frontend\components\CustomFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
// class TestController extends BasicController 
class TestController extends Controller 
{
    public $pageTitle;
//     public function actions()
//     {
//         return ArrayHelper::merge(parent::actions(), [
//             'page' => [
//                 //test/page?view=contact
//                 'class' => 'yii\web\ViewAction',
//             ], 
//         ]);
//     }
//     public function behaviors()
//     {
// //         $behaviors = parent::behaviors();
// //         $rules = $behaviors['access']['rules'];
// //         $rules = ArrayHelper::merge(
// //             $rules,
// //             [
// //                 [
// //                     'allow' => true,
// //                     'actions' => ['page']
// //                 ]
// //             ]
// //         );
// //         $behaviors['access']['rules'] = $rules; 
// //         return $behaviors;
        
// //         return [
// //             'access' => [
// //                 'class' => CustomFilter::className(),
// //             ],
// //         ];

//         return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'rules' => [
//                     [
//                         'allow' => true,
//                         'roles' => ['@'],
//                         'actions' => ['user']
//                     ],
//                     [
//                         'allow' => true,
//                         'roles' => ['?'],
//                         'actions' => ['index', 'success', 'error']
//                     ]
//                 ],
//                 'denyCallback'  => function ($rule, $action) {
//                     Yii::$app->session->setFlash('error', 'This section is only for registered users.');
//                     $this->redirect(['index']);
//                 },
//             ],
//         ];
//     }
    public function actionIndex()
    {
        $this->pageTitle = 'Controller context test';
        return $this->render('index');
    }
    public function hello()
    {
        $name = Yii::$app->request->get('name');
        echo $name ? $name : 'nothing';
    }
    public function actionUser()
    {
        return $this->renderContent('user');
    }
    
    public function actionSuccess()
    {
        Yii::$app->session->setFlash('success', 'Everything went fine!');
        $this->redirect(['index']);
    }
    
    public function actionError()
    {
        Yii::$app->session->setFlash('error', 'Everything went wrong!');
        $this->redirect(['index']);
    }
}