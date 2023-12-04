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
        $session = session();
        $userID = $session->get('matk');
        // dd($userID);
        $data = [];
        $dataLayout['allProductInCarts'] = $this->service->getAllProduct($userID);
        // dd($dataLayout['allProductInCarts']['cart_detail']);
        $data = $this->loadMasterLayoutUser($data, 'Danh sách sản phẩm đã thêm vào giỏ hàng', 'User/Pages/cart', $dataLayout);
        return view('User/main', $data);
    }

    public function UpdateCart()
    {
        $result = $this->service->updateCartInfo($this->request);
        return redirect()->to('user/cart')->withInput()->with($result['massageCode'], $result['message']);
    
    }
    public function deleteProductInCart()
    {
        $result = $this->service->deleteProductInCart($this->request);
        return redirect()->to('user/cart')->withInput()->with($result['massageCode'], $result['message']);
    
    }
}
