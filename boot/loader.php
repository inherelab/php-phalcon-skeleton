<?php
/**
 * common
 */

// Define some useful constants
define('BASE_PATH',  dirname(__DIR__));
define('APP_PATH',  BASE_PATH . '/app');

/** Env list */
define('APP_PDT', 'pdt');
define('APP_PRE', 'pre');
define('APP_TEST', 'test');
define('APP_DEV', 'dev');
define('APP_UNIT_TESTING', 'unit-testing');

/**
 * @const APP_START_TIME The start time of the application, used for profiling
 */
define('APP_START_TIME', microtime(true));

/**
 * @const APP_START_MEMORY The memory usage at the start of the application, used for profiling
 */
define('APP_START_MEMORY', memory_get_usage());

/**
 * @const HOSTNAME Current hostname
 */
define('HOSTNAME', explode('.', gethostname())[0]);

$loader = new \Phalcon\Loader();
$loader
    ->registerNamespaces([
        'App' => dirname(__DIR__) . '/app/',
    ])
    ->registerFiles([
        BASE_PATH . '/app/Helper/functions.php'
    ])
    ->register();

require dirname(__DIR__) . '/vendor/autoload.php';
