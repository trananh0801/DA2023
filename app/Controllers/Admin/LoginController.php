<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\LoginService;


class LoginController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new LoginService();
    }
    public function index(): string
    {
        $data = [];
        return view('Admin/Pages/login', $data);
    }
    public function login()
    {
        $result = $this->service->doLogin($this->request);
        if ($result['status'] == 'ERR') {
            return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
        }else{
            return redirect()->to('admin/home')->withInput()->with($result['massageCode'], $result['message']);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
