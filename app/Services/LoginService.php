<?php

namespace App\Services;

use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class LoginService extends BaseService
{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = new UserModel();
        $this->user->protect(false);
    }

    public function doLogin($requestData)
    {
        // Xử lý đăng nhập ở đây
        $username = $requestData->getPost('sTenTK');
        $password = $requestData->getPost('sMatKhau');

        // Kiểm tra thông tin đăng nhập với cơ sở dữ liệu
        $user = $this->user->where('sTenTK', $username)->first();
        // dd($user);
        if ($user && password_verify($password, $user['sMatKhau'])) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session

            $session = session();
            $session->set('user_id', $user['sTenTK']);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Đăng nhập thành công'],
            ];
        } else {
            // Đăng nhập thất bại, hiển thị thông báo lỗi
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi: ' => 'Đăng nhập thất bại!'],
            ];
        }
        // dd($requestData);
    }

   
}
