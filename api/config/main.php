<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'rest-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'controllerNamespace' => 'api\controllers',
    'modules' => [
        'v1' => [
            'class' => 'api\versions\v1\RestModule'
        ],
        'v2' => [
            'class' => 'api\versions\v2\RestModule'
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
//             'on beforeSend' => ['api\components\ResponseEvent', 'beforeSend'],
            'on beforeSend' => function ($event){
                $response = $event->sender;
                if ($response->data !== null) {
                    $return = ($response->statusCode == 200 ? $response->data : $response->data['message']);
                    $response->data = [
                        'success' => ($response->statusCode === 200),
                        'status' => $response->statusCode,
                        'data' => $return
                    ];
                }
            }
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => 'item'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/post', 'v1/comment', 'v2/post']],
                'OPTIONS v1/user/login' => 'v1/user/login',
                'POST v1/user/login' => 'v1/user/login',
                'POST v2/user/login' => 'v2/user/login',
                'OPTIONS v2/user/login' => 'v2/user/login',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'user/error',
        ],
    ],
    'params' => $params,
];