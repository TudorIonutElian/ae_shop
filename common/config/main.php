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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailtrap.io',
                'username' => '9cd7dc848e5bc1',
                'password' => '38199a109df0e6',
                'port' => '2525',
                'encryption' => 'tls',
            ],
        ],
    ],
    'name' => 'Afaceri Electronice Magazin',
];
