<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 13:37
 */

namespace App\Components;


use Phalcon\Mvc\Controller;

/**
 * Class BaseController
 * @package App\Components
 */
abstract class BaseController extends Controller
{
    public function initialize()
    {
//        $this->tag->setTitle($this->config->blog->title);
//        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
    }
}