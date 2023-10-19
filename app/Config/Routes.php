<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\LoginController::index');


$routes->get('error/404', function () {
    return view('errors/html/error_404');
});

$routes->group('admin', function ($routes) {
    $routes->get('home', 'Admin\HomeController::index');
    $routes->group('user', function ($routes) {
        $routes->get('list', 'Admin\UserController::list');
        $routes->get('add', 'Admin\UserController::add');
        $routes->post('create', 'Admin\UserController::create');
    });
    $routes->group('product', function ($routes) {
        $routes->get('list', 'Admin\ProductController::list');
        $routes->post('create', 'Admin\ProductController::create');
        $routes->post('update', 'Admin\ProductController::update');
        $routes->get('delete/(:num)', 'Admin\ProductController::delete/$1');
    });
    $routes->group('supplier', function ($routes) {
        $routes->get('list', 'Admin\SupplierController::list');
        $routes->post('create', 'Admin\SupplierController::create');
    });
    $routes->group('customer', function ($routes) {
        $routes->get('list', 'Admin\CustomerController::list');
        $routes->post('create', 'Admin\CustomerController::create');
    });
    $routes->group('productGroup', function ($routes) {
        $routes->get('list', 'Admin\ProductGroupController::list');
        $routes->post('create', 'Admin\ProductGroupController::create');
        $routes->post('edit', 'Admin\ProductGroupController::edit');
        $routes->get('delete/(:num)', 'Admin\ProductGroupController::delete/$1');
    });
    $routes->group('importBill', function ($routes) {
        $routes->get('list', 'Admin\ImportBillController::list');
        $routes->post('create', 'Admin\ImportBillController::create');
        $routes->post('update', 'Admin\ImportBillController::update');
        $routes->get('delete/(:num)', 'Admin\ImportBillController::delete/$1');
    });
    $routes->group('staff', function ($routes) {
        $routes->get('list', 'Admin\StaffController::list');
        $routes->post('create', 'Admin\StaffController::create');
    });
    $routes->group('order', function ($routes) {
        $routes->get('list', 'Admin\OrderController::list');
        $routes->post('create', 'Admin\OrderController::create');
        $routes->post('update', 'Admin\OrderController::update');
        $routes->get('delete/(:num)', 'Admin\OrderController::delete/$1');
    });
    $routes->group('returnBill', function ($routes) {
        $routes->get('list', 'Admin\ReturnBillController::list');
        $routes->post('create', 'Admin\ReturnBillController::create');
    });
    $routes->group('promotion', function ($routes) {
        $routes->get('list', 'Admin\PromotionController::list');
        $routes->post('create', 'Admin\PromotionController::create');
    });

    $routes->post('login', 'Admin\LoginController::login');
    $routes->get('logout', 'Admin\LoginController::logout');

    $routes->group('setting', function ($routes) {
        $routes->get('list', 'Admin\SettingController::list');
        $routes->post('update', 'Admin\SettingController::update');
    });
});
