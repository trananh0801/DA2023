<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\ProductService;

class UpdateProductController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function list($id)
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['products'] = $this->service->getProductById($id);
        $dataLayout['productsGroup'] = $this->service->getAllProductGroup();
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Cập nhật sản phẩm', 'Admin/Pages/updateProduct', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update($id)
    {
        $result = $this->service->updateProductInfo($this->request, $id);
        return redirect()->to('admin/product/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
