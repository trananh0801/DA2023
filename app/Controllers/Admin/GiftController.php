<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\ProductService;

class GiftController extends BaseController
{

    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['productsGroup'] = $this->service->getAllProductGroup();
        $data = $this->loadMasterLayout($data, 'Danh mục quà tặng', 'Admin/Pages/gift', $dataLayout);
        return view('Admin/main', $data);
    }
}
