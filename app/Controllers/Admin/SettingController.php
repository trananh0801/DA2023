<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\SettingService;

class SettingController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new SettingService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['settings'] = $this->service->getAllStaff();
        // dd($dataLayout['staffs']);
        $data = $this->loadMasterLayout($data, 'Thông tin cá nhân', 'Admin/Pages/setting', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update()
    {
        $result = $this->service->updateInfo($this->request);
        return redirect()->to('admin/setting/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
