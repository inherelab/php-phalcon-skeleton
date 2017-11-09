<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:33
 *
 * @var Phalcon\DI\FactoryDefault $di
 */

use App\Components\WebServiceProvider;

// Include Autoloader
include dirname(__DIR__) . '/boot/loader.php';

// Read common services
require dirname(__DIR__) . '/boot/services.php';

// Some services for WEB
$di->register(new WebServiceProvider());

