<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\EvaluateService;

class EvaluateController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new EvaluateService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['evaluates'] = $this->service->getAllEvaluate();
        // dd($dataLayout['customers']);
        $data = $this->loadMasterLayout($data, 'Danh sách đánh giá, bình luận', 'Admin/Pages/evaluate', $dataLayout);
        return view('Admin/main', $data);
    }
}
