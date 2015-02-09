<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
		'v1' => [
			'basePath' => '@app/versions/v1',
			'class' => 'api\versions\v1\Module'
		]
	],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => 'v1/cat',
					'tokens' => [
						'{id}' => '<id:\\w+>'
					]
				],
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => 'v1/photo',
					'tokens' => [
						'{id}' => '<id:\\w+>'
					]
				]
			],
		],
		'formatter' => [
			'class' => 'yii\i18n\Formatter',
			'dateFormat' => 'php:d-M-Y',
			'datetimeFormat' => 'php:d-M-Y H:i:s',
			'timeFormat' => 'php:H:i:s',
		]
    ],
    'params' => $params,
];
