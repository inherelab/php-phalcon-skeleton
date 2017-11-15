<?php
/**
 * @var \Phalcon\DI\FactoryDefault $di
 * @var \App\Components\WebApplication $app
 */

try {
    // boot
    require dirname(__DIR__) . '/boot/web.php';

    // Handle the request
    $response = $app->handle();
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage(), '<br>', nl2br(htmlentities($e->getTraceAsString()));
}
