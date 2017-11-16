<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-16
 * Time: 14:35
 */

namespace App\Models\Mysql;

use Phalcon\Mvc\Model;

/**
 * Class MainMysqlModel
 * @package App\Models\Mysql
 */
class MainMysqlModel extends Model
{
    public function onConstruct()
    {
        // ...
    }

    public function initialize()
    {
        // set table
        $this->setSource('demo');
        // set db connection
        $this->setConnectionService('mainMysql');

//        $this->setReadConnectionService('dbSlave');
//        $this->setWriteConnectionService('dbMaster');
    }
}