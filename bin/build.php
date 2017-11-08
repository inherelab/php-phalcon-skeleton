<?php

$emptyFile = '.gitkeep';
list($date, $time) = explode(' ', date('Y-m-d H:i'));

$cmdTpl = <<<EOF
<?php
/**
 * Created by Script.
 * User: inhere
 * Date: $date
 * Time: $time
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

EOF;

$ctrlTpl = <<<EOF
<?php
/**
 * Created by Script.
 * User: inhere
 * Date: $date
 * Time: $time
 */

namespace App\Controllers;

use Phalcon\Mvc\Controller;

/**
 * @package App\Controllers
 */
class TestController extends Controller
{
    public function indexAction(){ echo 'hello'; }
    public function twoAction(){}
}

EOF;

$dirs = [
    'app' => [
        'Console',
        'Components',
        'Controllers',
        'Dao',
        'Helpers',
        'Models',
    ],
    'bin',
    'boot',
    'resources' => [
        'config',
        'data',
        'languages',
        'views',
        'schemas',
    ],
    'web' => [
        'assets',
        'index.php',
    ]
];
$files = [
    'app/Console/TestController.php' => $cmdTpl,
    'app/Controllers/TestController.php' => $ctrlTpl,
    'web/index.php'
];

createProject(dirname(__DIR__), $dirs);
createFiles(dirname(__DIR__), $files);

/**
 * @param string $basePath
 * @param array $dirs
 * @param null|string $parentPath
 */
function createProject($basePath, array $dirs, $parentPath = null)
{
    if (!$parentPath) {
        $parentPath = $basePath . '/';
    }

    foreach ($dirs as $key => $value) {
        $isInt = is_int($key);

        if (is_array($value)) {

            createProject($basePath, $value);
        } elseif ($value && is_string($value)) {
            $path = $parentPath . $value;

            if (!is_dir($path)) {
                mkdir($path, 0755, true);
                touch($path . '/.gitkeep');
            }
        }
    }
}

function createFiles ($basePath, array $files) {
    foreach ($files as $key => $value) {
        if (is_int($key)) {
            $file = $basePath . '/' . $value;

            !is_file($file) && touch($file);
        } else {
            $file = $basePath . '/' . $key;

            !is_file($file) && file_put_contents($file, $value);
        }
    }
}
