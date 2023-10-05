<?php
namespace App\Services;
use App\Models\ImportBillModel;
use App\Common\ResultUtils;
use Exception;

class ImportBillService extends BaseService
{
    private $importBill;
    function __construct()
    {
        parent::__construct();
        $this->importBill = new ImportBillModel();
        $this->importBill->protect(false);
    }

    /**get all supplier */
    public function getAllImportBill(){
        $result = $this->importBill
        ->select('*')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addImportBillInfo($requestData){
        $validate = $this->validateAddImportBill($requestData);
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
            $this->importBill->save($dataSave);
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

    public function validateAddImportBill($requestData){
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
