<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-08
 * Time: 18:02
 */

use Phalcon\Logger;

return [
    'env' => 'pdt', // dev test unit-testing pre pdt
    'debug' => false,
    'php_error_report' => E_ALL,
    'timeZone' => 'Asia/Shanghai',
    'application' => [
        'name' => 'My App',
        'baseUri' => '/',
        'publicUrl' => 'vokuro.phalconphp.com',
        'cryptSalt' => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D',
    ],

    'database' => [
        'adapter' => 'Mysql',
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'vokuro'
    ],
    'paths' => [
        'app' => APP_PATH . '/',
        'bin' => BASE_PATH . '/bin/',
        'boot' => BASE_PATH . '/boot/',
        'config' => BASE_PATH . '/config/',
        'res' => BASE_PATH . '/resources/',
        'tmp' => BASE_PATH . '/tmp/',
        'web' => BASE_PATH . '/web/',
        'vendor' => BASE_PATH . '/vendor/',
        'log' => BASE_PATH . '/tmp/log/',
        'cache' => BASE_PATH . '/tmp/caches/',
    ],
    'mail' => [
        'fromName' => 'Vokuro',
        'fromEmail' => 'phosphorum@phalconphp.com',
        'smtp' => [
            'server' => 'smtp.gmail.com',
            'port' => 587,
            'security' => 'tls',
            'username' => '',
            'password' => ''
        ]
    ],
    'amazon' => [
        'AWSAccessKeyId' => '',
        'AWSSecretKey' => ''
    ],
    'logger' => [
        'path' => BASE_PATH . '/tmp/logs/',
        'format' => '%date% [%type%] %message%',
        'date' => 'Ymd H:i:s',
        'logLevel' => Logger::DEBUG,
        'filename' => 'application.log',
    ],
    // Set to false to disable sending emails (for use in test environment)
    'useMail' => true
];