<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces([
    'App' => dirname(__DIR__) . 'app/',
]);

// Register autoloader
$loader->register();

require dirname(__DIR__) . '/vendor/autoload.php';
