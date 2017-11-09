<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 * @var Phalcon\Di\FactoryDefault\Cli $di
 */

use App\Components\CliServiceProvider;

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// create DI container
$di = new \Phalcon\Di\FactoryDefault\Cli();

// Read common services
require dirname(__DIR__) . '/boot/services.php';

// some services for CLI
$di->register(new CliServiceProvider());

error_reporting(E_ALL);