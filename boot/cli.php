<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 * @var Phalcon\Di\FactoryDefault\Cli $di
 * @var App\Components\CliApplication $app
 */

define('RUN_MODE',  'cli');

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// create DI container
$di = new \Phalcon\Di\FactoryDefault\Cli();

$app = App\Bootstrap::boot($di);

// in the unit testing.
if (APP_ENV === 'unit-testing') {
    return $app;
}