<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ReturnBillService;

class UpdateReturnBillController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ReturnBillService();
    }

    public function list($id)
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['returnBills'] = $this->service->getReturnBillById($id);
        $dataLayout['returnBillDetails'] = $this->service->getReturnBillDetailById($id);

        $dataLayout['staffs'] = $this->service->getAllStaff1();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['suppliers'] = $this->service->getAllSupplier();
        // dd($dataLayout['returnBillDetails']);

        $data = $this->loadMasterLayout($data, 'Danh sách phiếu hoàn trả', 'Admin/Pages/updateReturnBill', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update($id)
    {
        $result = $this->service->updateReturnBillInfo($this->request, $id);
        return redirect()->to('admin/returnBill/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
