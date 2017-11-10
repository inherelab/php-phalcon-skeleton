<?php
/**
 * Created by Script.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:37
 */

namespace App\Console;

use App\Components\BaseTask;

/**
 * @package App\Controllers
 */
class DevTask extends BaseTask
{
    public function mainCommand()
    {
        echo 'hello';
    }

    public function serverCommand()
    {
        echo __METHOD__;
    }

    public function apiDocCommand()
    {
        echo __METHOD__;
    }
}
