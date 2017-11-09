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
class TestTask extends BaseTask
{
    public function mainCommand()
    {
        echo 'hello';
    }

    public function twoCommand()
    {
        echo __METHOD__;
    }
}
