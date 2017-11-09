<?php
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

try {
    // The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
    $di = new FactoryDefault();

    // boot
    require dirname(__DIR__) . '/boot/web.php';

    // Handle the request
    $app = new Application($di);

    $response = $app->handle();
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>', nl2br(htmlentities($e->getTraceAsString()));
}
