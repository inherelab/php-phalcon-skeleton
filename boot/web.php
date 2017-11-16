<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 *
 * @var Phalcon\DI\FactoryDefault $di
 * @var App\Components\WebApplication $app
 */

define('RUN_MODE',  'web');

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
$di = new \Phalcon\Di\FactoryDefault();

$app = App\Bootstrap::boot($di);

// in the unit testing.
if (APP_ENV === 'unit-testing') {
    return $app;
}