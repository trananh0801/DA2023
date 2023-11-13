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
        $data = [];
        $dataLayout['allProducts'] = $this->service->getProductById($id);
        $dataLayout['getAllProducts'] = $this->service->getAllProduct();

        $data = $this->loadMasterLayoutUser($data, 'Chi tiết sản phẩm', 'User/Pages/productDetail', $dataLayout);
        return view('User/main', $data);
    }

    public function addCart()
    {
        $result = $this->service->addCartInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    
    }
   
}
