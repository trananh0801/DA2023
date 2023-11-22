<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Common\ResultUtils;
use Exception;

class HeaderController extends BaseController
{
    private $user, $customer;
    function __construct()
    {
        $this->user = new UserModel();
        $this->customer = new CustomerModel();
        $this->user->protect(false);
        $this->customer->protect(false);
    }
    public function register()
    {
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $data_KH = [
            'PK_iMaKH' => 'KH_' . $uniqueCode,
            'FK_iMaTK' => 'TK_' . $uniqueCode,
            'sTenKH' => $this->getPostDataRow('sTenKH'),
            'sDiaChi' => $this->getPostDataRow('sDiaChi'),
            'sSDT' => $this->getPostDataRow('sSDT'),
            'dNgaySinh' => $this->getPostDataRow('dNgaySinh'),
            'sGioiTinh' => $this->getPostDataRow('sGioiTinh'),
        ];

        $data_TK = [
            'PK_iMaTK' => 'TK_' . $uniqueCode,
            'FK_iMaQuyen' => '4',
            'FK_iMaTrangThai' => '1',
            'sTenTK' => $this->getPostDataRow('sTenTK'),
            'sMatKhau' => password_hash((string) $this->getPostDataRow('sMatKhau'), PASSWORD_DEFAULT),
        ];
        // dd($data_KH);
        // dd($data_TK);
        $duplicateUser = $this->user->where('sTenTK', $data_TK['sTenTK'])->first();
        if ($duplicateUser) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => 'Tên đăng nhập đã tồn tại!'],
            ];
        }

        $this->customer->save($data_KH);
        // $lastQuery = $this->customer->getLastQuery();
        // dd($lastQuery);
        $this->user->save($data_TK);
        return redirect()->to('user/home');
    }

    public function login()
    {
        $username = $this->getPostDataRow('sTenTK');
        $password = $this->getPostDataRow('sMatKhau');

        // Kiểm tra thông tin đăng nhập với cơ sở dữ liệu
        $user = $this->user->where('sTenTK', $username)->first();
        if ($user && password_verify((string) $password, $user['sMatKhau'])) {
            // dd($password);
            $session = session();
            $session->set('user_id', $user['sTenTK']);
            $session->set('quyen', $user['FK_iMaQuyen']);
            $session->set('matk', $user['PK_iMaTK']);
        }
        return redirect()->to('user/home');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
