<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\ProductService;

class ProductDetailController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function list($id)
    {
        // dd($id);
        $data = [];
        $dataLayout['allProducts'] = $this->service->getAllProductById($id);
        $dataLayout['getAllProducts'] = $this->service->getAllProduct();
        // dd($data['users']);
        $data = $this->loadMasterLayoutUser($data, 'Chi tiết sản phẩm', 'User/Pages/productDetail', $dataLayout);
        return view('User/main', $data);
    }

   
}
