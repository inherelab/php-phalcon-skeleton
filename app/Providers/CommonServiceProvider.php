<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-16
 * Time: 14:43
 */

namespace App\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

use Phalcon\Config;
use Phalcon\Crypt;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlAdapter;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Logger\Formatter\Line as FormatterLine;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;
use Phalcon\Events\Manager as EventsManager;

/**
 * Class CommonServiceProvider
 * @package App\Providers
 */
class CommonServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers a service provider.
     * @param DiInterface $di
     */
    public function register(DiInterface $di)
    {
        /**
         * Register the global configuration as config
         */
        $di->setShared('config', function () {
            return new Config(include BASE_PATH . '/config/config.php');
        });

        // eventsManager
        $di->setShared(
            'eventsManager',
            function () {
                $em = new EventsManager;
                $em->enablePriorities(true);

                return $em;
            }
        );

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di->setShared('mainMysql', function () {
            /** @var DiInterface $this */
            $config = $this->get('config');

            return new MysqlAdapter($config->mainMysql);
        });

        // Set a models manager
        $di->set(
            'modelsManager',
            new ModelsManager()
        );

        /**
         * If the configuration specify the use of metadata adapter use it or use memory otherwise
         */
        $di->set('modelsMetadata', function () {
            /** @var DiInterface $this */
            $config = $this->get('config');

            return new MetaDataAdapter([
                'metaDataDir' => $config->application->cacheDir . 'metaData/'
            ]);
        });

        /**
         * Crypt service
         */
        $di->set('crypt', function () {
            /** @var DiInterface $this */
            $config = $this->get('config');
            $crypt = new Crypt();
            $crypt->setKey($config->application->cryptSalt);

            return $crypt;
        });

        // Logger service
        $di->set('logger', function () {
            /** @var DiInterface $this */
            $config = $this->get('config');

            $format = $config->get('logger')->format;
            $filename = trim($config->get('logger')->filename, '\\/');
            $path = rtrim($config->get('logger')->path, '\\/') . DIRECTORY_SEPARATOR;

            $formatter = new FormatterLine($format, $config->get('logger')->date);

            if (!is_dir($path)) {
                mkdir($path, 0755, 1);
            }

            $logger = new FileLogger($path . $filename);
            $logger->setFormatter($formatter);
            $logger->setLogLevel($config->get('logger')->logLevel);

            return $logger;
        });
    }
}