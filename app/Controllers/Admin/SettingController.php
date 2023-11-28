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
        $sessionUser = [
            'id' => $session->get('user_id'),
            'quyen' => $session->get('quyen'),
            'matk' => $session->get('matk'),
        ];

        $data = [];
        $dataLayout['settings'] = $this->service->getAllStaff($sessionUser['matk']);
        // dd($sessionUser['matk']);
        // dd($dataLayout['settings']);
        $data = $this->loadMasterLayout($data, 'Thông tin cá nhân', 'Admin/Pages/setting', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update()
    {
        $result = $this->service->updateInfo($this->request);
        return redirect()->to('admin/setting/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
