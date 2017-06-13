<?php

$params = require(__DIR__ . '/params.php');

$config = [
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'rest',
			'enableCookieValidation' => true,
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		/*'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => false,
		],*/
		'user' => [
			'class'=>'yii\web\User',
			'identityClass' => 'app\models\User',
			'idParam'=>'userClient',
			'enableAutoLogin' => true,
			'loginUrl'=>'/git/BoostNow/web/site/login',
			'returnUrl'=>'/git/BoostNow/web/',
			'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
            ],
		],
		'admin' => [
			'class'=>'yii\web\User',
			'identityClass' => 'app\models\Admin',
			'idParam'=>'userAdmin',
			'enableAutoLogin' => true,
			'loginUrl'=>'/git/BoostNow/web/site/admin-login',
			'returnUrl'=>'/git/BoostNow/web/site/contact',
			'identityCookie' => [
                'name' => '_backendUser', // unique for backend
            ],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => false,
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
		/*'view' => [
			'theme' => [
				'basePath' => '@app/themes/basic',
				'baseUrl' => '@web/themes/basic',
				'pathMap' => [
					'@app/views' => '@app/themes/basic',
					'@app/modules' => '@app/themes/basic/modules',
					'@app/widgets' => '@app/themes/basic/widgets',
				],
			],
		],*/
		'db' => require(__DIR__ . '/db.php'),
		'urlManager' => [
			'enablePrettyUrl' => true,
			//'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				//'about' => 'site/about',
				[
		            'pattern' => 'main-admin/<controller:[\w\-]+>/<action:[\w\-]*>/<id:[\w\-]*>',	//'main-admin' is new name of the 'admin' directory all routes will be handle through {/main-admin}
		            'route' => 'admin/<controller>/<action>',
		            //'suffix' => '.json',
		            'defaults' => [
		            	'controller' => 'main',
				        'action' => 'login',
				        'id' => 0
				    ],	
		        ],
		        [
					'pattern' => '<controller:[\w\-]+>/<action:[\w\-]*>/<id:[\w\-]*>',
					'route' => '<controller>/<action>',
					'defaults' => [
						'controller' => 'site',
						'action' => 'index',
						'id' => 0
					],
				],
			],
		],
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
