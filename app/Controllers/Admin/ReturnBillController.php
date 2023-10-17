<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ReturnBillService;

class ReturnBillController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ReturnBillService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['returnBills'] = $this->service->getAllReturnBill();
        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['suppliers'] = $this->service->getAllSupplier();
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách phiếu hoàn trả', 'Admin/Pages/returnBill', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addReturnBillInfo($this->request);
        return redirect()->to('admin/returnBill/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
