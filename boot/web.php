<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 *
 * @var Phalcon\DI\FactoryDefault $di
 */

define('RUN_MODE',  'web');

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
$di = new \Phalcon\Di\FactoryDefault();

App\Bootstrap::boot($di);
