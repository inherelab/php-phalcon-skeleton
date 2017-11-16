<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 * @var Phalcon\Di\FactoryDefault\Cli $di
 */

use App\Components\CliApplication;

define('RUN_MODE',  'cli');

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// create DI container
$di = new \Phalcon\Di\FactoryDefault\Cli();

App\Bootstrap::boot($di);

$app = new CliApplication($this);

// in the unit testing.
if (APP_ENV === 'unit-testing') {
    return $app;
}