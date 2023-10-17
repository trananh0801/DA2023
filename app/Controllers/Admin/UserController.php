<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\UserService;

class UserController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new UserService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['users'] = $this->service->getAllUser();
        // dd($data['users']);
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'Admin/Pages/user/list', $dataLayout);
        return view('Admin/main', $data);
    }

    public function add()
    {
        $data = [];
        $data = $this->loadMasterLayout($data, 'Thêm mới tài khoản', 'Admin/Pages/user/add');
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addUserInfo($this->request);
        return redirect()->to('admin/user/add')->withInput()->with($result['massageCode'], $result['message']);
    }
}
