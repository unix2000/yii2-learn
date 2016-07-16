<?php
use kartik\mpdf\Pdf;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//right-menu,top-menu,left-menu
        ],
        'users' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // other module settings, refer detailed documentation
        ],
    ],
    'components' => [
    	'authClientCollection' => [
    		'class' => 'yii\authclient\Collection',
    		'clients' => [
    			'weibo' => [
    				'class' => 'yii\authclient\Weibo',
    				'clientId' => 'wb_key',
    				'clientSecret' => 'wb_secret',
    			],
    			'qq' => [
    				//'class' => 'yii\authclient\Qq',
                    'class'=>'frontend\components\QqOAuth',
    				'clientId' => 'qq_appid',
    				'clientSecret' => 'qq_appkey',
    			],
    			'weixin' => [
    				'class' => 'yii\authclient\Weixin',
    				'clientId' => 'weixin_appid',
    				'clientSecret' => 'weixin_appkey',
    			],
    		],
    	],
//         'response' => [
//             'formatters' => [
//                 'php' => 'frontend\components\PhpArrayFormatter',
//             ],
//         ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/mydatabase',
            //'dsn' => 'mongodb://liner:123456@localhost:27017/mydatabase',
//             'dsn' => 'mongodb://username:password@mongos1_domain:27017,mongos2_domain:27017,mongos3_domain:27017/mydatabase',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'authManager' => [
            //'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
            'class' => 'yii\rbac\DbManager',
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/route.php'),
        ],
    ],
    'params' => $params,
];
