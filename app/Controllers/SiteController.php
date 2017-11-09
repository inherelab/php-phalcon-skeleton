<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 14:51
 */

namespace App\Controllers;


use App\Components\BaseController;

/**
 * Class SiteController
 * @package App\Controllers
 */
class SiteController extends BaseController
{

    public function notFoundAction()
    {
        echo 'Page Not Found';
    }
}