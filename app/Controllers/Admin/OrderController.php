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
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['orders'] = $this->service->getAllOrder();
        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['customers'] = $this->service->getAllCustomer();
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

    public function update()
    {
        $result = $this->service->updateOrderInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }


    public function delete($id)
    {
        $idPG = $this->service->getOrderById($id);
        if(!$idPG){
            return redirect('error/404');
        }
        $result = $this->service->deleteOrderInfo($id);
        return redirect('admin/order/list')->with($result['massageCode'], $result['message']);
    }
}
