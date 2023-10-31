<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\UserService;

class AccountController extends BaseController
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
        $data = [];
        $dataLayout['users'] = $this->service->getAllUser();
        // dd($data['users']);
        $data = $this->loadMasterLayoutUser($data, 'Thông tin cá nhân', 'User/Pages/account', $dataLayout);
        return view('User/main', $data);
    }

   
}
