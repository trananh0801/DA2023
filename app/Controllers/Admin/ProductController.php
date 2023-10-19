<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\ProductService;

class ProductController extends BaseController
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
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'Admin/Pages/product', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addProductInfo($this->request);
        return redirect()->to('admin/product/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    // public function edit($id)
    // {
    //     $idsp = $this->service->getProductById($id);
    //     dd($idsp);
    //     if(!$idsp){
    //         return redirect('error/404');
    //     }
    //     // $result = $this->service->updateProductInfo($this->request);
    //     // return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    // }

    public function update()
    {
        $result = $this->service->updateProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }

    public function delete($id)
    {
        $idPG = $this->service->getProductById($id);
        if(!$idPG){
            return redirect('error/404');
        }
        $result = $this->service->deleteProductInfo($id);
        return redirect('admin/product/list')->with($result['massageCode'], $result['message']);
    }
}
