<?php
namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{
    private $users;
    function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }

    /**get all user */
    public function getAllUser(){
        return $this->users->findAll();
    }

    /**add new user */
    public function addUserInfo($requestData){
        $validate = $this->validateAddUser($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        if(empty($dataSave['FK_iMaTrangThai'])){
            $dataSave['FK_iMaTrangThai'] = '2';
        }
        unset($dataSave['PK_iMaTK']);
        $dataSave['sMatKhau'] = password_hash($dataSave['sMatKhau'], PASSWORD_BCRYPT);
        // dd($dataSave);
        try{
            $this->users->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode'=> ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success'=> 'Thêm dữ liệu thành công'],
            ];
        }
        catch(Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => [''=> $e->getMessage()],
            ];
        }
        
    }

    public function validateAddUser($requestData){
        $rule = [
            'sTenTK'=>'max_length[100]',
            'sMatKhau'=>'max_length[30]|min_length[6]'
        ];
        $message = [
            'sTenTK'=> [
                'max_length' => 'Tên tài khoản quá dài!'
            ],
            'sMatKhau'=>[
                'max_length' => 'Mật khẩu quá dài!',
                'min_length' => 'Mật khẩu lớn hơn hoặc bằng {param} ký tự!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
