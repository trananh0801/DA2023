<?php
namespace App\Services;
use App\Models\SupplierModel;
use App\Common\ResultUtils;
use Exception;

class SupplierService extends BaseService
{
    private $supplier;
    function __construct()
    {
        parent::__construct();
        $this->supplier = new SupplierModel();
        $this->supplier->protect(false);
    }

    /**get all supplier */
    public function getAllSupplier(){
        $result = $this->supplier
        ->select('*')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addSupplierInfo($requestData){
        $validate = $this->validateAddSupplier($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        // dd($dataSave);
        try{
            $this->supplier->save($dataSave);
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

    public function validateAddSupplier($requestData){
        $rule = [
            'sTenNCC'=>'max_length[100]',
            'sSDT'=>'max_length[10]|min_length[8]'
        ];
        $message = [
            'sTenNCC'=> [
                'max_length' => 'Tên nhà cung cấp quá dài!'
            ],
            'sSDT'=>[
                'max_length' => 'Số điện thoại quá dài!',
                'min_length' => 'Số điện thoại lớn hơn hoặc bằng {param} ký tự!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
