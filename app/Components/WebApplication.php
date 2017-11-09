<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 15:53
 */

namespace App\Components;

use Phalcon\Mvc\Application;

/**
 * Class WebApplication
 * @package App\Components
 */
class WebApplication extends Application
{
    /**
     * @param null|string $uri
     * @return bool|\Phalcon\Http\ResponseInterface
     */
    public function handle($uri = null)
    {
        // get request route path
        if (isset($_GET['_url'])) {
            $uri = $_GET['_url'];
        } else {
            $uri = $_SERVER['REQUEST_URI'] ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/';
        }

        // clear last '/'
        $uri = '/' . trim($uri, '/');

        return parent::handle($uri);
    }
}