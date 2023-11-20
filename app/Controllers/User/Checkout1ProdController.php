<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CheckoutService;

class Checkout1ProdController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new CheckoutService();
    }

    public function list($id)
    {
        $session = session();
        $userID = $session->get('matk');

        $data = [];
        $dataLayout['products'] = $this->service->get1Product($id);
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayoutUser($data, 'Đặt hàng', 'User/Pages/checkout1Prod', $dataLayout);
        return view('User/main', $data);
    }

    public function addOrderInfo()
    {
        $result = $this->service->addOrderInfo($this->request);
        return redirect()->to('user/thankyou')->withInput()->with($result['massageCode'], $result['message']);
    
    }
   
}
