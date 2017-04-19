<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yougao',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'zabbixdb' =>[
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.1.241;dbname=zabbix',
            'username' => 'zabbix',
            'password' => 'zabbix',
            'charset' => 'utf8',
        ],
        'zabbix' =>[
            'class' => 'app\components\ZabbixAPI',
            'zUrl' => 'http://192.168.1.245/z/api_jsonrpc.php',
        ],

        /* 数据库RBAC权限控制 */
        'authManager' => [
            'class' => 'app\models\rbac\DbManager',
        ],

        'urlManager' => [
            // 路由路径化
            'enablePrettyUrl' => true,
            // 隐藏入口脚本
            'showScriptName' => false,
            // 假后缀
//            'suffix'=>'.html',
            'rules' => [
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],


    ],

    /**
     * 通过配置文件附加行为，全局
     */
    'as rbac' => [
        'class' => 'app\components\behaviors\RbacBehavior',
        'allowActions' => [
            'site/login','site/logout','site/signup','site/error','public*','debug/*','gii/*', // 不需要权限检测
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
