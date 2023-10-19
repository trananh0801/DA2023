<?php

namespace App\Services;

use App\Models\ImportBillModel;
use App\Models\ImportBillDetailModel;
use App\Models\StaffModel;
use App\Models\StatusModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Common\ResultUtils;
use Exception;

class ImportBillService extends BaseService
{
    private $importBill, $staff, $supplier, $status, $product, $importBillDetail;
    function __construct()
    {
        parent::__construct();
        $this->importBill = new ImportBillModel();
        $this->staff = new StaffModel();
        $this->status = new StatusModel();
        $this->product = new ProductModel();
        $this->supplier = new SupplierModel();
        $this->importBillDetail = new ImportBillDetailModel();
        $this->importBill->protect(false);
        $this->importBillDetail->protect(false);
    }

    /**get all importBill */
    public function getAllImportBill()
    {
        $result = $this->importBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieunhap.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieunhap.FK_iMaNCC')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_phieunhap.FK_iMaTrangThai')
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
    public function addImportBillInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddImportBill($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave1 = $requestData->getPost();
        $dataSave1['PK_iPN'] = 'PN_'. $uniqueCode;
        unset($dataSave1['FK_iMaSP']);
        unset($dataSave1['iSoluong']);

        $dataSave = $requestData->getPost();
        unset($dataSave['FK_iMaNV']);
        unset($dataSave['FK_iMaNCC']);
        unset($dataSave['dNgayNhap']);
        unset($dataSave['fTienDaTra']);
        unset($dataSave['sNguoiGiao']);
        unset($dataSave['FK_iMaTrangThai']);
        unset($dataSave['sGhiChu']);

        $duplicateProduct = $this->importBill->where('PK_iPN', $dataSave1['PK_iPN'])->first();
        if ($duplicateProduct) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => 'Trùng mã'],
            ];
        }
        // dd($dataSave1);
        try {
            $this->importBill->save($dataSave1);

            $transformedData = array();
            foreach ($dataSave as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    $transformedData[$k1][$k] = $v1;
                    $transformedData[$k1]['FK_iMaPN'] = 'PN_'. $uniqueCode;
                }
            }

            // dd($transformedData);
            $this->importBillDetail->insertBatch($transformedData);

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

    public function getImportBillById($id)
    {
        return $this->importBill->where('PK_iPN', $id)->first();
    }

    public function getProductById($id)
    {
        return $this->importBillDetail->where('FK_iMaDon', $id)->first();
    }

    public function updateImportBillInfo($requestData)
    {
        
        $validate = $this->validateUpdateImportBill($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }

        $id = $requestData->getPost('PK_iPN');
        $dataSave = [
            'FK_iMaTrangThai' => $requestData->getPost('FK_iMaTrangThai'),
        ];
        // dd($dataSave);
        try {
            $builder = $this->importBill->builder();
            $builder->where('PK_iPN', $id);
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

    

    public function deleteImportBillInfo($id)
    {
        try {
            $builder = $this->importBill->builder();
            $builder->where('PK_iPN', $id);
            $builder->delete();
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Xóa dữ liệu thành công'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
            ];
        }
    }

    public function validateAddImportBill($requestData)
    {
        $rule = [
            'sNguoiGiao' => 'max_length[100]',
        ];
        $message = [
            'sNguoiGiao' => [
                'max_length' => 'Tên người giao quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function validateUpdateImportBill($requestData)
    {
        $rule = [
            'sTenNhom' => 'max_length[100]',
        ];
        $message = [
            'ssTenNhom' => [
                'max_length' => 'Tên nhóm sản phẩm quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
