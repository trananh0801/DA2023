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

        // foreach ($dataLayout['products'] as $item) {
        //     // Kiểm tra xem trường 'fGiaBanSi' có tồn tại trong mảng không
        //     if (array_key_exists('fGiaBanSi', $item)) {
        //         // Chuyển trường 'fGiaBanSi' thành số thập phân
        //         $item['fGiaBanSi'] = (float) str_replace('.', '', $item['fGiaBanSi']);
        
        //         // Format lại giá trị với hàm number_format()
        //         $item['fGiaBanSi'] = number_format((float)$item['fGiaBanSi'], 0, ',', ',');
        
        //         // Nếu bạn muốn giá trị là chuỗi, hãy chuyển đổi lại
        //         $item['fGiaBanSi'] = strval($item['fGiaBanSi']);
        //     }
        // }
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách sản phẩm', 'Admin/Pages/product', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addProductInfo($this->request);
        return redirect()->to('admin/product/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    public function update()
    {
        $result = $this->service->updateProductInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }

    public function delete($id)
    {
        $idPG = $this->service->getProductById($id);
        if (!$idPG) {
            return redirect('error/404');
        }
        $result = $this->service->deleteProductInfo($id);
        return redirect('admin/product/list')->with($result['massageCode'], $result['message']);
    }
}
