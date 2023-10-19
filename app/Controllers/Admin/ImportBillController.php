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
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
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

    public function update()
    {
        $result = $this->service->updateImportBillInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }


    public function delete($id)
    {
        $idPG = $this->service->getImportBillById($id);
        if(!$idPG){
            return redirect('error/404');
        }
        $result = $this->service->deleteImportBillInfo($id);
        return redirect('admin/importBill/list')->with($result['massageCode'], $result['message']);
    }
}
