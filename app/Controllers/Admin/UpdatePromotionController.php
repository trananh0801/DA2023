<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\PromotionService;

class UpdatePromotionController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new PromotionService();
    }

    public function list($id)
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['promotions'] = $this->service->getPromotionById($id);
        $dataLayout['promotionDetails'] = $this->service->getAllPromotionDetail($id);
        $dataLayout['products'] = $this->service->getAllProduct($id);

        
        // dd($dataLayout['promotionDetails']);
        $data = $this->loadMasterLayout($data, 'Cập nhật khuyến mãi', 'Admin/Pages/updatePromotion', $dataLayout);
        return view('Admin/main', $data);
    }

    public function update($id)
    {
        $result = $this->service->updatePromotionInfo($this->request, $id);
        return redirect()->to('admin/promotion/list')->withInput()->with($result['massageCode'], $result['message']);
    }
}
