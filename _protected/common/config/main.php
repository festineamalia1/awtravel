<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

         'pusher' => [
    'class'     => 'Pusher\Pusher',
    //Mandatory parameters
    'appId'     => '750509',
    'appKey'    => 'f5878d67d87c61bdfc03',
    'appsecret' => '078b6cddcc4b2ada7240',
    //Optional parameter
    'options'   => ['useTLS' => true]
],
    ],
];
