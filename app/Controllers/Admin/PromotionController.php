<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\PromotionService;

class PromotionController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new PromotionService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['promotions'] = $this->service->getAllPromotion();
        $dataLayout['products'] = $this->service->getAllProduct();

        
        // dd($dataLayout['promotions']);
        $data = $this->loadMasterLayout($data, 'Danh sách khuyến mãi', 'Admin/Pages/promotion', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addPromotionInfo($this->request);
        return redirect()->to('admin/promotion/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    public function delete($id)
    {
        $result = $this->service->deletePromotionInfo($id);
        return redirect('admin/promotion/list')->with($result['massageCode'], $result['message']);
    }
}
