<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'User\HomeController::list');
$routes->get('login', 'Admin\LoginController::index');

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
        $routes->get('update/(:num)', 'Admin\UpdateProductController::list/$1');
        $routes->post('updateSave/(:num)', 'Admin\UpdateProductController::update/$1');
        $routes->get('delete/(:num)', 'Admin\ProductController::delete/$1');
    });
    $routes->group('supplier', function ($routes) {
        $routes->get('list', 'Admin\SupplierController::list');
        $routes->post('create', 'Admin\SupplierController::create');
        $routes->post('update', 'Admin\SupplierController::update');
        $routes->get('delete/(:num)', 'Admin\SupplierController::delete/$1');
    });
    $routes->group('customer', function ($routes) {
        $routes->get('list', 'Admin\CustomerController::list');
        $routes->post('create', 'Admin\CustomerController::create');
        $routes->post('update', 'Admin\CustomerController::update');
        $routes->get('delete/(:num)', 'Admin\CustomerController::delete/$1');
    });
    $routes->group('productGroup', function ($routes) {
        $routes->get('list', 'Admin\ProductGroupController::list');
        $routes->post('create', 'Admin\ProductGroupController::create');
        $routes->post('edit', 'Admin\ProductGroupController::edit');
        $routes->get('delete/(:segment)', 'Admin\ProductGroupController::delete/$1');
    });
    $routes->group('importBill', function ($routes) {
        $routes->get('list', 'Admin\ImportBillController::list');
        $routes->post('create', 'Admin\ImportBillController::create');
        $routes->get('update/(:segment)', 'Admin\UpdateImportBillController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdateImportBillController::update/$1');
        $routes->get('delete/(:num)', 'Admin\ImportBillController::delete/$1');
    });
    $routes->group('staff', function ($routes) {
        $routes->get('list', 'Admin\StaffController::list');
        $routes->post('create', 'Admin\StaffController::create');
        $routes->post('update', 'Admin\StaffController::update');
    });
    $routes->group('order', function ($routes) {
        $routes->get('list', 'Admin\OrderController::list');
        $routes->post('create', 'Admin\OrderController::create');
        $routes->get('update/(:segment)', 'Admin\UpdateOrderController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdateOrderController::update/$1');
        $routes->get('delete/(:num)', 'Admin\OrderController::delete/$1');
    });
    $routes->group('returnBill', function ($routes) {
        $routes->get('list', 'Admin\ReturnBillController::list');
        $routes->post('create', 'Admin\ReturnBillController::create');
        $routes->get('update/(:segment)', 'Admin\UpdateReturnBillController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdateReturnBillController::update/$1');
    });
    $routes->group('promotion', function ($routes) {
        $routes->get('list', 'Admin\PromotionController::list');
        $routes->post('create', 'Admin\PromotionController::create');
        $routes->get('update/(:segment)', 'Admin\UpdatePromotionController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdatePromotionController::update/$1');
    });

    $routes->post('login', 'Admin\LoginController::login');
    $routes->get('logout', 'Admin\LoginController::logout');

    $routes->group('setting', function ($routes) {
        $routes->get('list', 'Admin\SettingController::list');
        $routes->post('update', 'Admin\SettingController::update');
    });

    $routes->group('evaluate', function ($routes) {
        $routes->get('list', 'Admin\EvaluateController::list');
    });
});



$routes->group('user', function ($routes) {
    $routes->get('home', 'User\HomeController::list');
    $routes->get('account', 'User\AccountController::list');
    $routes->get('cart', 'User\CartController::list');
    $routes->get('productDetail/(:num)', 'User\ProductDetailController::list/$1');
    $routes->get('product', 'User\ProductController::list');
    $routes->get('category', 'User\CategoryController::list');
    $routes->get('about-us', 'User\AboutController::list');
    $routes->get('order-list', 'User\OrderListController::list');
    $routes->get('checkout', 'User\CheckoutController::list');
    $routes->get('order-status', 'User\OrderStatusController::list');
    $routes->get('thankyou', 'User\ThankyouController::list');
});
