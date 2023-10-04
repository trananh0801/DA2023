<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProductService;

class ProductController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['products'] = $this->service->getAllProduct();
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'Admin/Pages/product/list', $dataLayout);
        return view('Admin/main', $data);
    }

    
}
