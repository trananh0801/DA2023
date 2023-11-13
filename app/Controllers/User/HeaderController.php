<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\HomeService;

class HeaderController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new HomeService();
    }
    public function index()
    {
        $data = [
            'hihi' => 'haha'
        ];
        return view('User/Layout/header', $data);
    }
}