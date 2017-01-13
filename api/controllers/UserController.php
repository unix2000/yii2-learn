<?php
namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;
use api\filters\auth\HeaderParamAuth;

class UserController extends ActiveController
{
    public $modelClass = "common\models\User";
//     http://api.dev/users/1?fields=id,username
    //$serializer序列化，headers发送额外其他信息，比如分页以及链接信息
//     <_links>...</_links>
//     <_meta>
//     <totalCount>10</totalCount>
//     <pageCount>1</pageCount>
//     <currentPage>1</currentPage>
//     <perPage>20</perPage>
//     </_meta>
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'users',
    ];
    
    public function actions()
    {
        //默认action为 index,view,create,update,delete,options
        $actions = parent::actions();
        //disable ActiveController actions
//         unset($actions['delete'],$actions['create'],$actions['index']);

        //另一种禁用方法如下，写到配置文件
//         [
//             'class' => 'yii\rest\UrlRule',
//             'controller' => 'user',
//             // 'only' => [ 'index' ], // Only allow index
//             'except' => ['delete', 'create', 'update'], // Disabled
//         ]

        //自定义ActiveController actions
//         $actions['index']['prepareDataProvider'] = [$this,'prepareDataProvider'];
        unset($actions['delete'],$actions['create']);
        return $actions;                
    }
    
    //Authentication filters
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //第一种验证httpBasicAuth
//         $behaviors['authenticator'] = [
//             'auth' => ['common\models\User', 'httpBasicAuth' ],
//             'class' => HttpBasicAuth::className(),
//         ];
        
        //第二种验证 实现yii\web\IdentityInterface接口findIdentityByAccessToken函数
        //http://api.dev/users?token=pPRz4f4crz_rq_EMZuqPFMLcXh-3b6bx
        /**
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
            'tokenParam' => 'token',
        ];
        */
        
        //第三种验证方式OAuth2，如果不熟悉OAuth2流程，可模拟 Headers:Authorization: Bearer <token>
//         $behaviors['authenticator'] = [
//             'class' => HttpBearerAuth::className(),
//         ];
        
        //第四种验证方式-混合验证Composite authentication 必须全部通过
//         $behaviors['authenticator'] = [
//             'class' => CompositeAuth::className(),
//             'authMethods' => [
//                 HttpBasicAuth::className(),
//                 QueryParamAuth::className(),
//             ],
//         ];

        //第五种验证方式--自定义验证filters
//         $behaviors['authenticator'] = [
//             'class' => HeaderParamAuth::className(),
//             'only' => [ 'index', 'delete', 'update', 'create' ],
//         ];
        
        //verbs
        $behaviors['verbs'] = [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'index' => ['get'], //默认只能接受get请求
                'view' => ['get'],
                'create' => ['get', 'post'],
                'update' => ['get', 'put', 'post'],
                'delete' => ['post', 'delete'],
            ],
        ];

        //cors 跨域访问
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                //只允许https://frontend.dev通过ajax访问本域名
                'Origin' => ['http://frontend.dev'],
                // 访问者只允许 POST和 DELETE方法 
                'Access-Control-Request-Method' => ['POST','DELETE'],
                //Set cache control headers
                'Access-Control-Max-Age' => 3600,
                //Allow the X-Pagination-Current-Page header to be exposed to the browser
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];
        
        //速率限制
//         $behaviors['rateLimiter'] = [
//             'class' => \yii\filters\RateLimiter::className(),
//             'enableRateLimitHeaders' => true,
//         ];
        return $behaviors;
    }
    
    //检查当前用户
//     public function checkAccess($action,$model){
//         // check if the user can access $action or $model
//         // throw ForbiddenHttpException if access should be denied
//     }
    public static function prepareDataProvider()
    {
        //只能静态调用，函数必须public，无法private或protected，没道理
        return ['data' => ['username' => 'liner.xie' ]];
    }
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        if ($exception !== null)
            return ['exception' => $exception];
    }
}