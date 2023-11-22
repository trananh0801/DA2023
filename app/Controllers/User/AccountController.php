<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\AccountService;

class AccountController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new AccountService();
    }

    public function list()
    {
        $session = session();
        $userID = $session->get('matk');

        $maKH = $this->service->getCustomerById($userID);
        $data = [];
        $dataLayout['historys'] = $this->service->gethistory($maKH);
        $dataLayout['profiles'] = $this->service->getMyprofile($userID);
        // dd($dataLayout['profiles']);
        $data = $this->loadMasterLayoutUser($data, 'Thông tin cá nhân', 'User/Pages/account', $dataLayout);
        return view('User/main', $data);
    }

    public function profile()
    {
        $session = session();
        $userID = $session->get('matk');

        $result = $this->service->UpdateMyprofile($this->request, $userID);
        // dd($dataLayout['profiles']);
        return redirect()->to('user/account')->withInput()->with($result['massageCode'], $result['message']);
    }
}
