<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\OrderStatusService;

class OrderStatusController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new OrderStatusService();
    }

    public function list($id)
    {
        $data = [];
        $dataLayout['orders'] = $this->service->getOrder($id);
        $dataLayout['orderDetails'] = $this->service->getAllOrderDetail($id);
        // dd($dataLayout['orderDetails']);
        $data = $this->loadMasterLayoutUser($data, 'Chi tiết đơn đặt hàng', 'User/Pages/orderStatus', $dataLayout);
        return view('User/main', $data);
    }
    public function doitra($id)
    {
        $result = $this->service->doitra($this->request, $id);
        return redirect()->back();
    
    }
   
}
