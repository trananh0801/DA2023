<?php

namespace App\Services;

use App\Models\ReturnBillModel;
use App\Models\ReturnBillDetailModel;
use App\Models\StaffModel;
use App\Models\StatusModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Common\ResultUtils;
use Exception;

class ReturnBillService extends BaseService
{
    private $returnBill, $staff, $supplier, $status, $product, $returnBillDetail;
    function __construct()
    {
        parent::__construct();
        $this->returnBill = new ReturnBillModel();
        $this->staff = new StaffModel();
        $this->status = new StatusModel();
        $this->product = new ProductModel();
        $this->supplier = new SupplierModel();
        $this->returnBillDetail = new ReturnBillDetailModel();
        $this->returnBill->protect(false);
        $this->returnBillDetail->protect(false);
    }

    /**get all importBill */
    public function getAllReturnBill()
    {
        $result = $this->returnBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieuhoantra.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieuhoantra.FK_iMaNCC')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_phieuhoantra.FK_iMaTrangThai')
            ->findAll();
        // dd($result);
        return $result;
    }

    public function getAllStaff()
    {
        $result = $this->staff
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }
    public function getAllSupplier()
    {
        $result = $this->supplier
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }
    public function getAllStatus()
    {
        $result = $this->status
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addReturnBillInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddReturnBill($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave1 = $requestData->getPost();
        $dataSave1['PK_iMaPhieu'] = 'HT_'. $uniqueCode;
        unset($dataSave1['FK_iMaSP']);
        unset($dataSave1['iSoLuong']);
        // dd($dataSave1);

        $dataSave_CT = [
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'iSoLuong' => $requestData->getPost('iSoLuong'),
        ];

        $duplicateProduct = $this->returnBill->where('PK_iMaPhieu', $dataSave1['PK_iMaPhieu'])->first();
        if ($duplicateProduct) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => 'Trùng mã'],
            ];
        }
        // dd($dataSave1);
        try {
            $this->returnBill->save($dataSave1);

            $transformedData = array();
            foreach ($dataSave_CT as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    $transformedData[$k1][$k] = $v1;
                    $transformedData[$k1]['FK_iMaPhieu'] = 'HT_'. $uniqueCode;
                }
            }

            // dd($transformedData);
            $this->returnBillDetail->insertBatch($transformedData);

            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Thêm dữ liệu thành công'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
            ];
        }
    }

    public function updateReturnBillInfo($requestData)
    {
        
        $validate = $this->validateAddReturnBill($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }

        $id = $requestData->getPost('PK_iMaPhieu');
        // dd($id);
        $dataSave = [
            'FK_iMaTrangThai' => $requestData->getPost('FK_iMaTrangThai'),
        ];
        // dd($dataSave);
        try {
            $builder = $this->returnBill->builder();
            $builder->where('PK_iMaPhieu', $id);
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

    public function validateAddReturnBill($requestData)
    {
        $rule = [
            'sGhiChu' => 'max_length[100]',
        ];
        $message = [
            'sGhiChu' => [
                'max_length' => 'Tên người giao quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
