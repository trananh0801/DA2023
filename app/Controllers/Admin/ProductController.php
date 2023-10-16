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
        $dataLayout['productsGroup'] = $this->service->getAllProductGroup();
        // dd($dataLayout['productsGroup']);
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'Admin/Pages/product', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addProductInfo($this->request);
        return redirect()->to('admin/product/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
