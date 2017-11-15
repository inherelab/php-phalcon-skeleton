<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-14
 * Time: 17:41
 */

namespace App;

use App\Components\PhpDotEnv;
use App\Providers\CliServiceProvider;
use App\Providers\WebServiceProvider;
use Phalcon\Di;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{
    /**
     * @param Di $di
     */
    public static function boot(Di $di)
    {
        $self = new self;
        $self->run($di);
    }

    /**
     * @param Di $di
     */
    protected function run(Di $di)
    {
        // init .env
        PhpDotEnv::load(BASE_PATH);

        // Read common services
        require dirname(__DIR__) . '/boot/services.php';

        if (RUN_MODE === 'web') {
            $this->loadWebServices($di);
        } else {
            $this->loadCliServices($di);
        }

        $this->initEnv();
    }

    protected function initEnv()
    {
        error_reporting(E_ALL);

        // date timezone
        date_default_timezone_set('Asia/Shanghai');

        /**
         * Set the MB extension encoding to the same character set
         */
        if (function_exists('mb_internal_encoding')) {
            mb_internal_encoding('utf-8');
        }
    }

    /**
     * @param Di $di
     */
    private function loadWebServices(Di $di)
    {

        // Some services for WEB
        $di->register(new WebServiceProvider());
    }

    /**
     * @param Di $di
     */
    private function loadCliServices(Di $di)
    {
        // some services for CLI
        $di->register(new CliServiceProvider());
    }
}