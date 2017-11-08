<?php
/**
 * Created by Script.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:37
 */
namespace App\Console;

use Phalcon\Cli\Task;

/**
 * @package App\Controllers
 */
class TestController extends Task
{
    public function mainAction(){ echo 'hello'; }
    public function twoAction(){}
}
