<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ImportBillService;

class UpdateImportBillController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ImportBillService();
    }

    public function list($id)
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['importBills'] = $this->service->getImportBillById($id);
        $dataLayout['importBillDetails'] = $this->service->getAllImportBillDetail($id);

        $dataLayout['staffs'] = $this->service->getAllStaff1();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['suppliers'] = $this->service->getAllSupplier();

        // dd($dataLayout['importBillDetails']);
        $data = $this->loadMasterLayout($data, 'Cập nhật phiếu nhập hàng', 'Admin/Pages/updateImportBill', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update($id)
    {
        $result = $this->service->updateImportBillInfo($this->request, $id);
        return redirect()->to('admin/importBill/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
