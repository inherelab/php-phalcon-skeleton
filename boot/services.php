<?php
/**
 * @var \Phalcon\Di $di
 */

use Phalcon\Config;
use Phalcon\Crypt;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Logger\Formatter\Line as FormatterLine;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;

/**
 * Register the global configuration as config
 */
$di->setShared('config', function () {
    $config = new Config(include BASE_PATH . '/config/_base.php');

    return $config;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () {
    $config = $this->getConfig();

    return new DbAdapter([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ]);
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    $config = $this->getConfig();

    return new MetaDataAdapter([
        'metaDataDir' => $config->application->cacheDir . 'metaData/'
    ]);
});

/**
 * Crypt service
 */
$di->set('crypt', function () {
    $config = $this->getConfig();
    $crypt = new Crypt();
    $crypt->setKey($config->application->cryptSalt);

    return $crypt;
});

// Logger service
$di->set('logger', function ($filename = '', $format = null) {
    /** @var Config $config */
    $config = $this->getConfig();

    $format = $format ?: $config->get('logger')->format;
    $filename = trim($filename ?: $config->get('logger')->filename, '\\/');
    $path = rtrim($config->get('logger')->path, '\\/') . DIRECTORY_SEPARATOR;

    $formatter = new FormatterLine($format, $config->get('logger')->date);
    $logger = new FileLogger($path . $filename);
    $logger->setFormatter($formatter);
    $logger->setLogLevel($config->get('logger')->logLevel);

    return $logger;
});
