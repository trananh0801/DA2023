<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User\HomeController::index');
$routes->group('admin', function($routes){
    $routes->get('home', 'Admin\HomeController::index');
});
