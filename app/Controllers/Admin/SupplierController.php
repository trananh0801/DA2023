<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\SupplierService;

class SupplierController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new SupplierService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['suppliers'] = $this->service->getAllSupplier();
        // dd($dataLayout['suppliers']);
        $data = $this->loadMasterLayout($data, 'Danh sách nhà cung cấp', 'Admin/Pages/supplier', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addSupplierInfo($this->request);
        return redirect()->to('admin/supplier/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    public function update()
    {
        $result = $this->service->updateSupplierInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }

    public function delete($id)
    {
        $result = $this->service->deleteSupplierInfo($id);
        return redirect('admin/supplier/list')->with($result['massageCode'], $result['message']);
    }
}
