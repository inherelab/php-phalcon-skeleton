<?php

use App\Components\WebApplication;
use Phalcon\DI\FactoryDefault;

try {
    // The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
    $di = new FactoryDefault();

    // boot
    require dirname(__DIR__) . '/boot/web.php';

    // Handle the request
    $app = new WebApplication($di);

    $response = $app->handle();
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>', nl2br(htmlentities($e->getTraceAsString()));
}
