<?php
return [
	'name' => ' iRefer',//
    'language'=>'th', //
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'modules' => [
		'gridview' =>  ['class' => '\kartik\grid\Module'],
		//'gridview' => ['class' => 'kartik\grid\Module'],
        /*'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
		]*/
	],
];
