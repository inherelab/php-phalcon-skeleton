<?php
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

// Define some useful constants
define('BASE_PATH',  dirname(__DIR__));
define('APP_PATH',  BASE_PATH . '/app');

try {
    // The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
    $di = new FactoryDefault();

    // Read services
    require dirname(__DIR__) . '/boot/services.php';

    // Get config service for use in inline setup below
    $config = $di['config'];

    // Include Autoloader
    include dirname(__DIR__) . '/boot/loader.php';

    // Handle the request
    $app = new Application($di);

    $response = $app->handle();
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>', nl2br(htmlentities($e->getTraceAsString()));
}
