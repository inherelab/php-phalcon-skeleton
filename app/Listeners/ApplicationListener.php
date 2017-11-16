<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-16
 * Time: 15:18
 */

namespace App\Listeners;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

/**
 * Class RuntimeListener
 * @package App\Listeners
 */
class ApplicationListener extends Plugin
{
    public function boot()
    {
        echo "Here, application:boot\n";
    }

    public function beforeHandleRequest(Event $event, $app)
    {
        echo 'Here, beforeHandleRequest\n';

        $this->logger->debug(
            'beforeHandleRequest has been triggered'
        );
    }

    public function afterHandleRequest()
    {
        echo 'Here, afterHandleRequest\n';

        $this->logger->debug(
            'afterHandleRequest has been triggered'
        );
    }
}