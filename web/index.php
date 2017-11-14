<?php
/**
 * @var \Phalcon\DI\FactoryDefault $di
 */

use App\Components\WebApplication;

try {
    // boot
    require dirname(__DIR__) . '/boot/web.php';

    // Handle the request
    $app = new WebApplication($di);

    $response = $app->handle();
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>', nl2br(htmlentities($e->getTraceAsString()));
}
