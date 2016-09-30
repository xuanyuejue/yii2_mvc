<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5CHKC5jt0704nnNnaqrSRJGWf_XgjG-U',
        ],
        'cache' => [
         //   'class' => 'yii\caching\FileCache',
              'class' => 'yii\redis\Cache',
        ],
        'session' => [
            'class' => 'yii\redis\Session',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
              'hostname' => '127.0.0.1',
              'password' => 'your auth',
              'port' => 6379,
              'database' => 0,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        //定义自己的路由
        'urlManager' => [
            'enablePrettyUrl' => true,//开启URL美化
            'showScriptName' => true, //禁用index.php文件
            'suffix' => '.html',   //路径上必须带有.html后缀,不然会报错404.
            'rules' => [
                'test/<id:\d+>' => 'test/test',//设置自己的路由规则
                'test2' =>'test/test2'
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
