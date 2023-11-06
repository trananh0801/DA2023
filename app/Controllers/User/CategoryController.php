<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\ProductGroupService;

class CategoryController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ProductGroupService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['productGroups'] = $this->service->getAllProductGroup();
        // dd($dataLayout['productGroups']);
        $data = $this->loadMasterLayoutUser($data, 'Danh sách sản phẩm đã thêm vào giỏ hàng', 'User/Pages/category', $dataLayout);
        return view('User/main', $data);
    }

   
}
