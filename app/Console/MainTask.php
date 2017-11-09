<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 10:35
 */

namespace App\Console;

use App\Components\BaseTask;

/**
 * Class MainTask
 * @package App\Console
 */
class MainTask extends BaseTask
{
    /**
     * php5 bin/cli main:main name=dfd --hd=dfdf -d -l=45
     * @param null $a
     */
    public function mainCommand($a = null)
    {
        echo 'hello, this is ' . __METHOD__ . PHP_EOL;
        var_dump($a, $this->app->getArguments(), $this->app->getOptions());
    }
}