<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        // $session = session();
        // if (!$session->get('user_id')) {
        //     return redirect()->to('/');
        // }
        $data = [];
        $data = $this->loadMasterLayout($data, 'Trang chủ', 'Admin/Pages/home');
        return view('Admin/main', $data);
    }
}
