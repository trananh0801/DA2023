<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CartService;

class CartController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new CartService();
    }

    public function list()
    {
        // $session = session();
        // dd($session->get('user_id'));
        $data = [];
        $dataLayout['allProductInCarts'] = $this->service->getAllProduct();
        // dd($dataLayout['allProductInCarts']);
        $data = $this->loadMasterLayoutUser($data, 'Danh sách sản phẩm đã thêm vào giỏ hàng', 'User/Pages/cart', $dataLayout);
        return view('User/main', $data);
    }

   
}
