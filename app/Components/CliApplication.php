<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-09
 * Time: 10:52
 */

namespace App\Components;

use Phalcon\Cli\Console;
use Phalcon\DiInterface;

/**
 * Class CliApplication
 * @package App\Components
 */
class CliApplication extends Console
{
    private $delimiter = ':';
    private $script = '';
    private $command = '';
    private $commandInfo = [];

//    private $commands = [];
//    private $messages = [];

    /**
     * Phalcon\Application
     *
     * @param DiInterface $dependencyInjector
     */
    public function __construct(DiInterface $dependencyInjector = null)
    {
        parent::__construct($dependencyInjector);

        $this->parseCliArgv();
    }

    /**
     * @param array $argv
     * @return array
     */
    public function parseCliArgv(array $argv = [])
    {
        /** @var array $argv */
        $argv = $argv ?: $_SERVER['argv'];
        $this->script = array_shift($argv);

        foreach ($argv as $key => $value) {
            // _options
            if (strpos($value, '-') === 0) {
                $value = trim($value, '-');

                if (!$value) {
                    continue;
                }

                if (strpos($value, '=')) {
                    list($n, $v) = explode('=', $value);
                    $this->_options[$n] = $v;
                } else {
                    $this->_options[$value] = true;
                }
                // arguments
            } else {
                if (strpos($value, '=')) {
                    list($n, $v) = explode('=', $value);
                    $this->_arguments[$n] = $v;
                } else {
                    $this->_arguments[] = $value;
                }
            }
        }

        // special handle for Phalcon
        return $this->findCommand();
    }

    /**
     * special handle for Phalcon
     *
     * @return array
     * [
     *  'task' => '',
     *  'action' => '',
     *  // 'params' => [],
     * ]
     */
    public function findCommand()
    {
        $delimiter = $this->delimiter;
        $info = [];

        if (isset($this->_arguments[0])) {
            $this->command = trim($this->_arguments[0], $delimiter);
            unset($this->_arguments[0]);

            if (!$this->command) {
                return $info;
            }

            if (strpos($this->command, $delimiter)) {
                list($info['task'], $info['action']) = explode($delimiter, $this->command, 2);
            } else {
                $info['task'] = $this->command;
            }
        }

        return ($this->commandInfo = $info);
    }
    
    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getArgument($name, $default = null)
    {
        return isset($this->_arguments[$name]) ? $this->_arguments[$name] : $default;
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getOption($name, $default = null)
    {
        return isset($this->_options[$name]) ? $this->_options[$name] : $default;
    }

    /**
     * @return array
     */
    public function getCommandInfo()
    {
        return $this->commandInfo;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->_arguments;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }
}