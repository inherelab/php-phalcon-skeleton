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
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * Class WebServiceProvider
 * @package App\Components
 */
class WebServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Config $config
     */
    protected function initWebConfig(Config $config)
    {
        $config->merge(new Config(include BASE_PATH . '/config/web.php'));

        if (is_readable(BASE_PATH . '/config/web.dev.php')) {
            $config->merge(new Config(include BASE_PATH . '/config/web.dev.php'));
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
         * Loading routes from the routes.php file
         */
        $di->set('router', function () {
            return require BASE_PATH . '/boot/web-routes.php';
        });

        /**
         * Dispatcher use a default namespace
         */
        $di->set('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\Controllers');

            return $dispatcher;
        });

        /**
         * Start the session the first time some component request the session service
         */
        $di->set('session', function () {
            $session = new SessionAdapter();
            $session->start();

            return $session;
        });

        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $config = $this->getConfig();
            $view = new View();
            $view->setViewsDir($config->paths->views);
            $view->registerEngines([
                '.volt' => function ($view) {
                    $config = $this->getConfig();
                    $volt = new VoltEngine($view, $this);
                    $volt->setOptions([
                        'compiledPath' => $config->paths->cache . 'volt/',
                        'compiledSeparator' => '_'
                    ]);

                    return $volt;
                }
            ]);

            return $view;
        }, true);

        /**
         * The URL component is used to generate all kind of urls in the application
         */
        $di->setShared('url', function () {
            $config = $this->getConfig();
            $url = new UrlResolver();
            $url->setBaseUri($config->application->baseUri);

            return $url;
        });

        /**
         * Flash service with custom CSS classes
         */
        $di->set('flash', function () {
            return new Flash([
                'error' => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
                'warning' => 'alert alert-warning'
            ]);
        });
    }
}