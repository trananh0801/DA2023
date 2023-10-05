<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User\HomeController::index');
$routes->group('admin', function($routes){
    $routes->get('home', 'Admin\HomeController::index');
    $routes->group('user', function($routes){
        $routes->get('list', 'Admin\UserController::list');
        $routes->get('add', 'Admin\UserController::add');
        $routes->post('create', 'Admin\UserController::create');
    });
    $routes->group('product', function($routes){
        $routes->get('list', 'Admin\ProductController::list');
        $routes->get('add', 'Admin\ProductController::add');
        $routes->post('create', 'Admin\ProductController::create');
    });
    $routes->group('supplier', function($routes){
        $routes->get('list', 'Admin\SupplierController::list');
        $routes->post('create', 'Admin\SupplierController::create');
    });
});

