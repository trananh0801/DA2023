<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\HomeService;

class HomeController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new HomeService();
    }
    public function list()
    {
        $data = [];
        $dataLayout['newProducts'] = $this->service->getAllProduct();
        $data = $this->loadMasterLayoutUser($data, 'Trang chủ', 'User/Pages/home', $dataLayout);
        return view('User/main', $data);
    
    }
}