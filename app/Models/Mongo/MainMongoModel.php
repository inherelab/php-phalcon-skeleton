<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-16
 * Time: 14:35
 */

namespace App\Models\Mongo;

use Phalcon\Mvc\Model;

/**
 * Class MainMysqlModel
 * @package App\Models\Mongo
 */
class MainMongoModel extends Model
{
    public function onConstruct()
    {
        // ...
    }

    public function initialize()
    {
        // set table
        $this->setSource('demo');
        $this->setConnectionService('dbPostgres');
    }
}