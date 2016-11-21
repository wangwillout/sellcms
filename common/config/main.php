<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            //'defaultRoles' => ['guest'],
        ],
        'qiniu' => [ 
              'class' => 'chocoboxxf\Qiniu\Qiniu',
              'accessKey' => 'd27qzK2267kyE03rqtz4I0nRMDxkRGtgzg2B6y3P',
              'secretKey' => '-m13gFc9rLIqwNGjpZhhwz05bXLgAmUE0SpjvimQ',
              'domain' => 'qiniu.aliapp.com/',
              'bucket' => 'ancda',
              'secure' => false, // 是否使用HTTPS，默认为false
        ]
    ],
];
