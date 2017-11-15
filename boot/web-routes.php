<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-08
 * Time: 17:47
 *
 * @var Phalcon\Mvc\Router\Annotations $router
 */

//use Phalcon\Mvc\Router;



$router->addResource('App\\Controllers\\Ann', '/ann');

$router->addGet('/', [
    'controller' => 'test',
    'action' => 'index'
]);

$route = $router->addGet('/apidocs', 'ApiDoc::index');
$route->setName('domain.route');
//$route->setHostname('localhost');

$router->addGet('/apidocs/gen', 'ApiDoc::gen');

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


//$router->add('/:controller', [
//    'controller' => 1,
//    'action'     => 'index'
//])->setName('front.controller');
//
//$router->add('/:controller/:action/:params', [
//    'controller' => 1,
//    'action'     => 2,
//    'params'     => 3,
//])->setName('front.full');


// Set 404 paths
$router->notFound([
    'controller' => 'site',
    'action'     => 'notFound',
]);

//

//var_dump($router);die;