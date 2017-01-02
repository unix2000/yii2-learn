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
    //'defaultRoute' => 'ui/index',
	'catchAll' => [
        //'site/offline',
        //'param1' => '站点维护中...'
    ],
    //应用事件
    // 'on beforeRequest' => function ($event) {
    //     //类似于以上on beforeRequest
    //     // \Yii::$app->on(\yii\base\Application::EVENT_BEFORE_REQUEST, function ($event) {});
    //     // du($event);
    //     echo '--beforeRequest--<br />';
    // },
    // 'on afterRequest' => function ($event) {
    //     echo '--afterRequest--<br />';
    // },
    // 'on beforeAction' => function ($event) {
    //     if ( 2 > 3 ) {
    //         //$event->isValid = false;
    //         echo '--on beforeAction if true--<br />';
    //     } else {
    //         echo '--on beforeAction if false--<br />';
    //     }
    // },
    // 'on afterAction' => function ($event) {
    //     if ( 2 > 1) {
    //         // 修改 $event->result
    //         // echo '--on afterAction if true--<br />';
    //         $event->result = "Event Result";
    //         du($event);
    //     } else {
    //         echo '--on afterAction if false--<br />';
    //     }
    // },
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'top-menu',//right-menu,top-menu,left-menu
        	//'mainLayout' => '@frontend/views/layouts/main.php',
        	'controllerMap' => [
        		'assignment' => [
        			'class' => 'mdm\admin\controllers\AssignmentController',
        			'userClassName' => 'common\models\User',
        			'idField' => 'id'
        		]
        	],
        	'menus' => [
        		'assignment' => [
        			'label' => 'Grand Access' // change label
        		],
        		'route' => null, // disable menu
        	],
        ],
        'users' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // other module settings, refer detailed documentation
        ],
    ],
	'as access' => [
		'class' => 'mdm\admin\components\AccessControl',
		'allowActions' => [
			'admin/*', // add or remove allowed actions to this list
			'site/*',
		]
	],
    'components' => [
		'assetManager' => [
			'converter' => [
				'class' => 'yii\web\AssetConverter',
				'commands' => [
					'less' => ['css', 'lessc {from} {to}'],
					'ts' => ['js', 'tsc --out {to} {from}'],
				],
			],
			//'linkAssets' => true,
			'appendTimestamp' => true, //¼ÓÈëcssºÍjsÎÄ¼þÊ±¼ä´Á°æ±¾ºÅ
			'assetMap' => [
				//'jquery.js' => 'https://unpkg.com/jquery@2.2.4/dist/jquery.js',
				//'jquery.min.js' => 'https://unpkg.com/jquery@2.2.4/dist/jquery.min.js'
			],
			'bundles' => [
				'yii\web\JqueryAsset' => [
					'sourcePath' => null,
					'js' => [
						//APPLICATION_ENV == 'prod' ? 'jquery.min.js' : 'jquery.js'
						'http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js'
					]
				],
				//'yii\bootstrap\BootstrapAsset' => false,
				//'yii\web\YiiAsset' => false,
			]
		],
    	'view' => [
    	    'class' => 'yii\web\View',
    	    'renderers' => [
//     	        'tpl' => [
//     	            'class' => 'yii\smarty\ViewRenderer',
//     	            //'cachePath' => '@runtime/Smarty/cache',
//     	        ],
    	        'twig' => [
    	            'class' => 'yii\twig\ViewRenderer',
    	            'cachePath' => '@runtime/Twig/cache',
    	            // Array of twig options:
    	            'options' => [
    	                'auto_reload' => true,
    	            ],
    	            'globals' => ['html' => '\yii\helpers\Html'],
    	            'uses' => ['yii\bootstrap'],
    	        ],
    	    ],
    	],
    	'authManager' => [
    		'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
    	],
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
