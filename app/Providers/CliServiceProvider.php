<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:44
 */

namespace App\Providers;

use Phalcon\Cli\Dispatcher;
use Phalcon\Config;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

/**
 * Class CliServiceProvider
 * @package App\Providers
 */
class CliServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Config $config
     */
    protected function initWebConfig(Config $config)
    {
        $config->merge(new Config(include BASE_PATH . '/config/cli.php'));

        if (is_readable(BASE_PATH . '/config/cli.dev.php')) {
            $config->merge(new Config(include BASE_PATH . '/config/cli.dev.php'));
        }
    }

    /**
     * Registers a service provider.
     * @param \Phalcon\DiInterface $di
     */
    public function register(DiInterface $di)
    {
        /** @var Config $config */
        $config = $di->get('config');
        $this->initWebConfig($config);

        /**
         * Dispatcher use a default namespace
         */
        $di->setShared('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\Console');
            $dispatcher->setActionSuffix('Command');

            return $dispatcher;
        });
    }
}