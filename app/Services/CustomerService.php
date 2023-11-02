<?php
namespace App\Services;
use App\Models\CustomerModel;
use App\Common\ResultUtils;
use Exception;

class CustomerService extends BaseService
{
    private $customer;
    function __construct()
    {
        parent::__construct();
        $this->customer = new CustomerModel();
        $this->customer->protect(false);
    }

    /**get all supplier */
    public function getAllCustomer(){
        $result = $this->customer
        ->select('*')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addCustomerInfo($requestData){
        $validate = $this->validateAddCustomer($requestData);
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
            $this->customer->save($dataSave);
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

    public function updateCustomerInfo($requestData)
    {
        $validate = $this->validateAddCustomer($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave_KH = $requestData->getPost();

        $id_KH = $requestData->getPost('PK_iMaKH');

        // dd($id_TK);
        try {
            $builder = $this->customer->builder();
            $builder->where('PK_iMaKH', $id_KH);
            $builder->update($dataSave_KH);

            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Cập nhật dữ liệu thành công'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
            ];
        }
    }

    public function validateAddCustomer($requestData){
        $rule = [
            'sTenKH'=>'max_length[100]',
        ];
        $message = [
            'sTenKH'=> [
                'max_length' => 'Tên khách hàng quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
