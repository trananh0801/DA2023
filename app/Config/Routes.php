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
        // $routes->get('add', 'Admin\ProductController::add');
        $routes->post('create', 'Admin\ProductController::create');
    });
    $routes->group('supplier', function($routes){
        $routes->get('list', 'Admin\SupplierController::list');
        $routes->post('create', 'Admin\SupplierController::create');
    });
    $routes->group('customer', function($routes){
        $routes->get('list', 'Admin\CustomerController::list');
        $routes->post('create', 'Admin\CustomerController::create');
    });
    $routes->group('productGroup', function($routes){
        $routes->get('list', 'Admin\ProductGroupController::list');
        $routes->post('create', 'Admin\ProductGroupController::create');
        $routes->post('edit', 'Admin\ProductGroupController::edit');
    });
    $routes->group('importBill', function($routes){
        $routes->get('list', 'Admin\ImportBillController::list');
        $routes->post('create', 'Admin\ImportBillController::create');
    });
    $routes->group('staff', function($routes){
        $routes->get('list', 'Admin\StaffController::list');
        $routes->post('create', 'Admin\StaffController::create');
    });
    $routes->group('order', function($routes){
        $routes->get('list', 'Admin\OrderController::list');
        $routes->post('create', 'Admin\OrderController::create');
    });
    $routes->group('returnBill', function($routes){
        $routes->get('list', 'Admin\ReturnBillController::list');
        $routes->post('create', 'Admin\ReturnBillController::create');
    });
});

