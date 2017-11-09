<?php
/**
 * Created by Script.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:36
 */

namespace App\Controllers;

use App\Components\BaseController;

/**
 * @package App\Controllers
 */
class TestController extends BaseController
{
    public function indexAction()
    {
        echo 'hello';
        var_dump($this->router->getRoutes(), $this->router->getMatchedRoute());
    }

    public function twoAction()
    {
        echo __METHOD__;
    }
}
