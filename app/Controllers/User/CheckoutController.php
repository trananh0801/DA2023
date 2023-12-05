<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CheckoutService;

class CheckoutController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new CheckoutService();
    }

    public function list()
    {
        $session = session();
        $userID = $session->get('matk');

        $data = [];
        $dataLayout['products'] = $this->service->getAllProduct($userID);
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayoutUser($data, 'Đặt hàng', 'User/Pages/checkout', $dataLayout);
        return view('User/main', $data);
    }

    public function addOrderInfo()
    {
        $result = $this->service->addOrderInfoMuti($this->request);
        if ($result['status'] = 'ERR') {
            return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
        } else {
            return redirect()->to('user/thankyou')->withInput()->with($result['massageCode'], $result['message']);
        }
    }
   
}
