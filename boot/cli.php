<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 * @var Phalcon\Di\FactoryDefault\Cli $di
 */

define('RUN_MODE',  'cli');

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// create DI container
$di = new \Phalcon\Di\FactoryDefault\Cli();

App\Bootstrap::boot($di);