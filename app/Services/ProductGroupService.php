<?php
namespace App\Services;
use App\Models\ProductGroupModel;
use App\Common\ResultUtils;
use Exception;

class ProductGroupService extends BaseService
{
    private $productGroup;
    function __construct()
    {
        parent::__construct();
        $this->productGroup = new ProductGroupModel();
        $this->productGroup->protect(false);
    }

    /**get all supplier */
    public function getAllProductGroup(){
        $result = $this->productGroup
        ->select('*')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addProductGroupInfo($requestData){
        $validate = $this->validateAddProductGroup($requestData);
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
            
            $this->productGroup->save($dataSave);
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

    public function updateProductGroupInfo($requestData){
        $validate = $this->validateAddProductGroup($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost('PK_iMaNhom');
        dd($dataSave);
        try{
            
            // $this->productGroup->save($dataSave);
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

    public function validateAddProductGroup($requestData){
        $rule = [
            'sTenNhom'=>'max_length[100]',
        ];
        $message = [
            'sTenNhom'=> [
                'max_length' => 'Tên nhóm sản phẩm quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
