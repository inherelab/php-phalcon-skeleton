<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:47
 */

// Define custom routes. File gets included in the router service definition.
$router = new Phalcon\Mvc\Router();

$router->add('/test', [
    'controller' => 'test',
    'action' => 'index'
]);

$router->add('/confirm/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'confirmEmail'
]);

$router->add('/reset-password/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'resetPassword'
]);

return $router;