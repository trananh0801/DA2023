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
    public function getAllStaff(){
        $result = $this->staff
        ->select('*')
        ->findAll();
        // dd($result);
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
        $dataSave['FK_iMaTK'] = 'TK_'. $uniqueCode;
        $dataSave['PK_iMaNV'] = 'NV_'. $uniqueCode;
        
        unset($dataSave['sTenTK']);
        unset($dataSave['sMatKhau']);

        //Lấy tài khoản từ form

        $dataSave_TK = [
            'sTenTK' => $requestData->getPost('sTenTK'),
            'sMatKhau' => $requestData->getPost('sMatKhau'),
            'PK_iMaTK' => 'TK_'. $uniqueCode,
            'FK_iMaQuyen' => $requestData->getPost('sTenChucVu'),
            'FK_iMaTrangThai' => '1'
        ];

        // dd($dataSave);
        try{
            $this->user->save($dataSave_TK);
            $this->staff->insert($dataSave);
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
