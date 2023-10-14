<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\StaffService;

class StaffController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new StaffService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['staffs'] = $this->service->getAllStaff();
        // dd($dataLayout['staffs']);
        $data = $this->loadMasterLayout($data, 'Danh sách nhân viên', 'Admin/Pages/staff', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addStaffInfo($this->request);
        return redirect()->to('admin/staff/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
