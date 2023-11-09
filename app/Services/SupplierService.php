<?php
namespace App\Services;
use App\Models\SupplierModel;
use App\Models\ImportBillModel;
use App\Models\ReturnBillModel;
use App\Common\ResultUtils;
use Exception;

class SupplierService extends BaseService
{
    private $supplier, $importBill, $returnBill;
    function __construct()
    {
        parent::__construct();
        $this->supplier = new SupplierModel();
        $this->returnBill = new ReturnBillModel();
        $this->importBill = new ImportBillModel();
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

    public function updateSupplierInfo($requestData)
    {
        $validate = $this->validateAddSupplier($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = [
            'sTenNCC' => $requestData->getPost('sTenNCC'),
            'sDiaChi' => $requestData->getPost('sDiaChi'),
            'sSDT' => $requestData->getPost('sSDT'),
            'sGhiChu' => $requestData->getPost('sGhiChu'),
        ];
        $id = $requestData->getPost('PK_iMaNCC');

        // dd($id);
        try {
            $builder = $this->supplier->builder();
            $builder->where('PK_iMaNCC', $id);
            $builder->update($dataSave);
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

    /**---Xóa nhà cung cấp----------------------------------------------------------------------------------------- */
    public function deleteSupplierInfo($id)
    {
        try {
            $current_PN = $this->importBill->select('FK_iMaNCC')->where('FK_iMaNCC', $id)->findAll();
            $current_HT = $this->returnBill->select('FK_iMaNCC')->where('FK_iMaNCC', $id)->findAll();
            if (!empty($current_PN) || !empty($current_HT)) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['' => 'Nhà cung cấp đã được sử dụng, không thể xóa!'],
                ];
            } else {
                $builder = $this->supplier->builder();
                $builder->where('PK_iMaNCC', $id);
                $builder->delete();
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'message' => ['success' => 'Xóa dữ liệu thành công'],
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
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
