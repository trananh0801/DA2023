<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ImportBillService;

class ImportBillController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ImportBillService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['importBills'] = $this->service->getAllImportBill();
        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['suppliers'] = $this->service->getAllSupplier();
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách phiếu nhập hàng', 'Admin/Pages/importBill', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addImportBillInfo($this->request);
        return redirect()->to('admin/importBill/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
