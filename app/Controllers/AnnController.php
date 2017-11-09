<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 14:59
 */

namespace App\Controllers;

use App\Components\BaseController;

/**
 * Class AnnController
 * @package App\Controllers
 *
 * @RoutePrefix("/ann")
 */
class AnnController extends BaseController
{
    /**
     * @Route('/')
     */
    public function indexAction()
    {
        echo __METHOD__;
    }

    /**
     * @Route('/get', methods="GET")
     */
    public function getAction()
    {
        echo __METHOD__;
    }

    /**
     * @Route('/post', methods={'POST', 'PUT'})
     */
    public function postAction()
    {
        echo __METHOD__;
    }
}