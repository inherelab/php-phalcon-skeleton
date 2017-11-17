<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-14
 * Time: 17:41
 */

namespace App;

use App\Components\CliApplication;
use App\Components\PhpDotEnv;
use App\Components\WebApplication;
use App\Listeners\ApplicationListener;
use App\Providers\CliServiceProvider;
use App\Providers\CommonServiceProvider;
use App\Providers\WebServiceProvider;
use Phalcon\Config;
use Phalcon\Di;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{
    /**
     * @param Di $di
     * @return \Phalcon\Application
     */
    public static function boot(Di $di)
    {
        $self = new self;
        return $self->run($di);
    }

    /**
     * @param Di $di
     * @return \Phalcon\Application
     */
    protected function run(Di $di)
    {
        // init .env
        PhpDotEnv::load(BASE_PATH);

        /**
         * @const APP_ENV Current application environment
         */
        defined('APP_ENV') || define('APP_ENV', env('APP_ENV') ?: APP_PDT);

        // Read common services
        $di->register(new CommonServiceProvider());

        if (RUN_MODE === 'web') {
            $app = $this->loadWebServices($di);
        } else {
            $app = $this->loadCliServices($di);
        }

        $this->initEnv($di);

        return $app;
    }

    protected function initEnv(Di $di)
    {
        /** @var Config $config */
        $config = $di->get('config');

        // error report level
        error_reporting($config->get('phpErrorReport', E_ERROR));

        // date timezone
        date_default_timezone_set($config->get('timezone', 'UTC'));

        // Set the MB extension encoding to the same character set
        if (function_exists('mb_internal_encoding')) {
            mb_internal_encoding('utf-8');
        }
    }

    /**
     * @param Di $di
     * @return WebApplication
     */
    private function loadWebServices(Di $di)
    {
        // Some services for WEB
        $di->register(new WebServiceProvider());

        $app = new WebApplication($di);

        $em = $di->getShared('eventsManager');
        $em->attach('application', new ApplicationListener());

        $app->setEventsManager($em);

        return $app;
    }

    /**
     * @param Di $di
     * @return CliApplication
     */
    private function loadCliServices(Di $di)
    {
        // some services for CLI
        $di->register(new CliServiceProvider());

        $app = new CliApplication($di);

        // save to DI
        $di->setShared('app', $app);

        $em = $di->getShared('eventsManager');
        $em->attach('application', new ApplicationListener());

        $app->setEventsManager($em);

        return $app;
    }
}