<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 13:24
 */

namespace App\Components;

use Phalcon\Cli\Task;
use Phalcon\Config;

/**
 * Class BaseTask
 * @package App\Components
 *
 * @property CliApplication $app
 * @property Config $config
 */
abstract class BaseTask extends Task
{

}