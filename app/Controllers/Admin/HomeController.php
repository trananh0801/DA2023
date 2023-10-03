<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data = $this->loadMasterLayout($data);
        return view('Admin/Pages/main', $data);
        $test = '123';
    }
}
