<?php
namespace App\Services;
use App\Models\StaffModel;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class SettingService extends BaseService
{
    private $staff, $user;
    function __construct()
    {
        parent::__construct();
        $this->staff = new StaffModel();
        $this->user = new UserModel();
        $this->staff->protect(false);
        $this->user->protect(false);
    }

    /**get all supplier */
    public function getAllStaff($id){
        $result = $this->staff
        ->select('*')
        ->where('FK_iMaTK', $id)
        ->first();
        return $result;
    }

    /**add new user */
    public function updateInfo($requestData){
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        //check validate
        $validate = $this->validateAddStaff($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        //lấy nhân viên từ form
        $dataSave = $requestData->getPost();
        $maNV = $requestData->getPost('PK_iMaNV');
        unset($dataSave['PK_iMaNV']);
        
        // dd($dataSave);
        try{
            $builder = $this->staff->builder();
            $builder->where('PK_iMaNV', $maNV);
            $builder->update($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode'=> ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success'=> 'Cập nhật tài khoản thành công'],
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

    public function validateAddStaff($requestData){
        $rule = [
            'sTenNV'=>'max_length[100]',
        ];
        $message = [
            'sTenNV'=> [
                'max_length' => 'Tên nhân viên quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
