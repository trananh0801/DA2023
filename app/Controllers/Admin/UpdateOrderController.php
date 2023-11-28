<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\OrderService;

class UpdateOrderController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new OrderService();
    }

    public function list($id)
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }

        $data = [];
        $dataLayout['orders'] = $this->service->getAllOrderById($id);
        $dataLayout['orderDetails'] = $this->service->getAllOrderDetailById($id);

        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['customers'] = $this->service->getAllCustomer();

        // dd($dataLayout['orders']);
        $data = $this->loadMasterLayout($data, 'Cập nhật đơn đặt hàng', 'Admin/Pages/updateOrder', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update($id)
    {
        $result = $this->service->updateOrderInfo($this->request, $id);
        return redirect()->to('admin/order/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
