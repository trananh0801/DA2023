<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\CategoryService;

class CategoryController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new CategoryService();
    }

    public function list($id)
    {
        $session = session();
        $sessions = [
            'tendn' => $session->get('user_id'),
            'quyen' => $session->get('quyen')
        ];
        $dataLayout['sessions'] = $sessions;
        $data = [];
        $dataLayout['productGroups'] = $this->service->getAllProductGroup();
        $dataLayout['nameProductGroups'] = $this->service->getNameProductGroup($id);
        $dataLayout['productInGroups'] = $this->service->getProductInGroup($id);
        $dataLayout['demsps'] = $this->service->demSP($id);
        // dd($dataLayout['demsps']);
        $data = $this->loadMasterLayoutUser($data, 'Danh sách sản phẩm đã thêm vào giỏ hàng', 'User/Pages/category', $dataLayout);
        return view('User/main', $data);
    }

   
}
