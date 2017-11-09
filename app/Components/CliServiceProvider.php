<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 9:44
 */

namespace App\Components;

use Phalcon\Config;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

/**
 * Class CliServiceProvider
 * @package App\Components
 */
class CliServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Config $config
     */
    protected function initWebConfig(Config $config)
    {
        $config->merge(include BASE_PATH . '/config/cli.php');

        if (is_readable(BASE_PATH . '/config/cli.dev.php')) {
            $config->merge(include BASE_PATH . '/config/cli.dev.php');
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


    }
}