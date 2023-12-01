<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\StatisticalService;

class InventoryController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new StatisticalService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['productLists'] = $this->service->inventoryProduct();

        $data = $this->loadMasterLayout($data, 'Thống kê sản phẩm tồn kho', 'Admin/Pages/inventory', $dataLayout);
        return view('Admin/main', $data);
    }

    public function search()
    {
        $data = [];
        $result = $this->service->searchProduct($this->request);
        // dd($result);
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['productLists'] = $this->service->inventoryProductByCode($result);
        $data = $this->loadMasterLayout($data, 'Thống kê sản phẩm tồn kho', 'Admin/Pages/inventory', $dataLayout);
        return view('Admin/main', $data);
    }
}
