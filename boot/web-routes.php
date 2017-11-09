<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:47
 *
 * @var Phalcon\Mvc\Router\Annotations $router
 */

use Phalcon\Mvc\Router;

$router->addResource('Ann', '/ann');

$router->addGet('/test', [
//    'namespace'  => 'Backend\Controllers',
    'controller' => 'test',
    'action' => 'index'
]);

$router->addGet('/test/two', [
//    'namespace'  => 'Backend\Controllers',
    'controller' => 'test',
    'action' => 'two'
]);

$router->add('/confirm/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'confirmEmail'
]);

$router->add('/reset-password/{code}/{email}', [
    'controller' => 'user_control',
    'action' => 'resetPassword'
]);

// Set 404 paths
$router->notFound([
    'controller' => 'site',
    'action'     => 'notFound',
]);

//
//$router->addGet('/', [
//    'controller' => 'test',
//    'action' => 'index'
//]);

//var_dump($router);die;