<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\CustomerService;

class CustomerController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new CustomerService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['customers'] = $this->service->getAllCustomer();
        // dd($dataLayout['customers']);
        $data = $this->loadMasterLayout($data, 'Danh sách khách hàng', 'Admin/Pages/customer', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addCustomerInfo($this->request);
        return redirect()->to('admin/customer/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    public function update()
    {
        $result = $this->service->updateCustomerInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }

    public function delete($id)
    {
        $result = $this->service->deleteCustomerInfo($id);
        return redirect('admin/customer/list')->with($result['massageCode'], $result['message']);
    }
}
