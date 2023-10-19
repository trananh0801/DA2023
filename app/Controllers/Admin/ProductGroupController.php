<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ProductGroupService;

class ProductGroupController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ProductGroupService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['productGroups'] = $this->service->getAllProductGroup();
        // dd($dataLayout['productGroups']);
        $data = $this->loadMasterLayout($data, 'Danh sách nhóm sản phẩm', 'Admin/Pages/productGroup', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addProductGroupInfo($this->request);
        return redirect()->to('admin/productGroup/list')->withInput()->with($result['massageCode'], $result['message']);
    }
    public function edit()
    {
        $result = $this->service->updateProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }
}
