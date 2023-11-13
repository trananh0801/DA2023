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
        $dataLayout['productAlls'] = $this->service->getProduct();
        $dataLayout['productGroups'] = $this->service->getAllProductGroup();
        $data = $this->loadMasterLayoutUser($data, 'Trang chủ', 'User/Pages/home', $dataLayout);
        return view('User/main', $data);
    
    }

    public function addCart()
    {
        $result = $this->service->addCartInfo($this->request);
        return redirect()->to('user/home')->withInput()->with($result['massageCode'], $result['message']);
    
    }
}