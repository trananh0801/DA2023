<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\UserService;

class ProductController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new UserService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['users'] = $this->service->getAllUser();
        // dd($data['users']);
        // $data = $this->loadMasterLayoutUser($data, 'Chi tiết sản phẩm', 'User/Pages/product');
        return view('User/Pages/product', $data);
    }

   
}
