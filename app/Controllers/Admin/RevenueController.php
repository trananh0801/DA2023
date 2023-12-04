<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\StatisticalService;


class RevenueController extends BaseController
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
        $dataLayout['orders'] = $this->service->getOrder();
        $dataLayout['totals'] = $this->service->getTotalAll();
        $dataLayout['totalReturnBills'] = $this->service->getReturnBillCount();

        // dd($dataLayout['totalReturnBills']);
        $data = $this->loadMasterLayout($data, 'Thống kê doanh thu', 'Admin/Pages/revenue', $dataLayout);
        return view('Admin/main', $data);
    }

    public function search()
    {
        $data = [];
        $result = $this->service->searchOrder($this->request);
        // dd($result);
        $dataLayout['orders'] = $this->service->getOrderByDate($result['dBatDau'], $result['dKetThuc']);
        $dataLayout['totals'] = $this->service->getTotalByDate($result['dBatDau'], $result['dKetThuc']);
        $data = $this->loadMasterLayout($data, 'Thống kê doanh thu', 'Admin/Pages/revenue', $dataLayout);
        return view('Admin/main', $data);
    }
}
