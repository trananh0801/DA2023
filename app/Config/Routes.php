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
    // $routes->get('search/(:segment)', 'Admin\HeaderController::search/$1');
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
        $routes->get('delete/(:segment)', 'Admin\CustomerController::delete/$1');
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
        $routes->get('delete/(:segment)', 'Admin\StaffController::delete/$1');
    });
    $routes->group('order', function ($routes) {
        $routes->get('list', 'Admin\OrderController::list');
        $routes->post('create', 'Admin\OrderController::create');
        $routes->get('update/(:segment)', 'Admin\UpdateOrderController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdateOrderController::update/$1');
        $routes->get('delete/(:num)', 'Admin\OrderController::delete/$1');
        $routes->post('check_product_detail', 'Admin\OrderController::check_product_detail');
        $routes->post('themnhanh', 'Admin\OrderController::themnhanh');

        //in hóa đơn
        $routes->get('pdf_invoice/(:segment)', 'Admin\InvoiceController::pdf_invoice/$1');

    });
    $routes->group('returnBill', function ($routes) {
        $routes->get('list', 'Admin\ReturnBillController::list');
        $routes->post('create', 'Admin\ReturnBillController::create');
        $routes->get('update/(:segment)', 'Admin\UpdateReturnBillController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdateReturnBillController::update/$1');
        $routes->post('check_returnbill_detail', 'Admin\ReturnBillController::check_returnbill_detail');
    });
    $routes->group('promotion', function ($routes) {
        $routes->get('list', 'Admin\PromotionController::list');
        $routes->post('create', 'Admin\PromotionController::create');
        $routes->get('update/(:segment)', 'Admin\UpdatePromotionController::list/$1');
        $routes->post('updateSave/(:segment)', 'Admin\UpdatePromotionController::update/$1');
        $routes->get('delete/(:segment)', 'Admin\PromotionController::delete/$1');
    });

    $routes->group('gift', function ($routes) {
        $routes->get('list', 'Admin\GiftController::list');
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
    $routes->group('statistical', function ($routes) {
        $routes->get('revenue', 'Admin\RevenueController::list');
        $routes->get('search', 'Admin\RevenueController::search');

        $routes->get('inventory', 'Admin\InventoryController::list');
        $routes->get('searchProduct', 'Admin\InventoryController::search');
    });
});



$routes->group('user', function ($routes) {
    $routes->get('home', 'User\HomeController::list');
    $routes->post('addCart', 'User\HomeController::addCart');
    $routes->post('register', 'User\HeaderController::register');
    $routes->post('login', 'User\HeaderController::login');
    $routes->get('logout', 'User\HeaderController::logout');

    $routes->get('account', 'User\AccountController::list');
    $routes->post('account/my-profile', 'User\AccountController::profile');

    $routes->get('cart', 'User\CartController::list');
    $routes->post('updateCart', 'User\CartController::UpdateCart');
    $routes->post('deleteProductInCart', 'User\CartController::deleteProductInCart');

    $routes->get('productDetail/(:num)', 'User\ProductDetailController::list/$1');
    $routes->get('product', 'User\ProductController::list');

    $routes->get('category/(:segment)', 'User\CategoryController::list/$1');

    $routes->get('about-us', 'User\AboutController::list');
    $routes->get('checkout', 'User\CheckoutController::list');
    $routes->post('addCheckout', 'User\CheckoutController::addOrderInfo');

    $routes->get('checkoutProd/(:segment)', 'User\Checkout1ProdController::list/$1');
    $routes->post('addcheckoutProd', 'User\Checkout1ProdController::addOrderProdInfo');

    $routes->get('order-status/(:segment)', 'User\OrderStatusController::list/$1');
    $routes->get('doitra/(:segment)', 'User\OrderStatusController::doitra/$1');

    $routes->get('thankyou', 'User\ThankyouController::list');


    //Thanh toán onepay
    $routes->post('onepay_payment', 'User\CheckoutController::onepay_payment');
    $routes->post('onepay_payment_1', 'User\Checkout1ProdController::onepay_payment');
});
