<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\OrderService;

class OrderController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new OrderService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['orders'] = $this->service->getAllOrder();
        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        // $dataLayout['suppliers'] = $this->service->getAllSupplier();
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách đơn đặt hàng', 'Admin/Pages/order', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addOrderInfo($this->request);
        return redirect()->to('admin/order/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
