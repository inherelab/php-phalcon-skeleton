<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 13:37
 */

namespace App\Components;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

/**
 * Class BaseController
 * @package App\Components
 */
abstract class BaseController extends Controller
{
    public $commonInfo = [];

    public function initialize()
    {
//        $this->tag->setTitle($this->config->blog->title);
//        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
    }

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        // This is executed before every found action
//        if ($dispatcher->getActionName() === 'save') {
//            $this->flash->error(
//                "You don't have permission to save posts"
//            );
//
//            $this->dispatcher->forward([
//                    'controller' => 'site',
//                    'action'     => 'noPermission',
//            ]);
//
//            return false;
//        }

        return true;
    }

    public function afterExecuteRoute($dispatcher)
    {
        // Executed after every found action
    }
}