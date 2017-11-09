<?php

// Define some useful constants
define('BASE_PATH',  dirname(__DIR__));
define('APP_PATH',  BASE_PATH . '/app');

$loader = new \Phalcon\Loader();
$loader
    ->registerNamespaces([
        'App' => dirname(__DIR__) . '/app/',
    ])
    ->register();

require dirname(__DIR__) . '/vendor/autoload.php';
