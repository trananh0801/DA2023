<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\UserService;

class AboutController extends BaseController
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
        $data = $this->loadMasterLayoutUser($data, 'Danh sách sản phẩm đã thêm vào giỏ hàng', 'User/Pages/about', $dataLayout);
        return view('User/main', $data);
    }

   
}
