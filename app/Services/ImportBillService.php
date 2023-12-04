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
        $this->product->protect(false);
        $this->importBillDetail->protect(false);
    }

    /**Lấy danh sách phiếu ra màn list - DANH SÁCH---------------------------------------------------------------*/
    public function getAllImportBill()
    {
        $result = $this->importBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieunhap.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieunhap.FK_iMaNCC')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách phiếu ra màn list - CẬP NHẬT---------------------------------------------------------------*/
    public function getImportBillById($id)
    {
        $result = $this->importBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieunhap.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieunhap.FK_iMaNCC')
            ->where('PK_iPN', $id)->first();
        return $result;
    }

    /**Lấy danh sách phiếu ra màn list - CẬP NHẬT---------------------------------------------------------------*/
    public function getAllImportBillDetail($id)
    {
        $result = $this->importBillDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctphieunhap.FK_iMaSP')
            ->where('FK_iMaPN', $id)
            ->findAll();
        return $result;
    }

    /**Lấy danh sách nhân viên---------------------------------------------------------------*/
    public function getAllStaff()
    {
        $result = $this->staff
            ->select('*')
            ->where('sTenChucVu', '2')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**lấy danh sách nhà cung cấp---------------------------------------------------------------*/
    public function getAllSupplier()
    {
        $result = $this->supplier
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách trạng thái---------------------------------------------------------------*/
    public function getAllStatus()
    {
        $result = $this->status
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách sản phẩm---------------------------------------------------------------*/
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Thêm mới phiếu---------------------------------------------------------------*/
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
        $dataSave1 = [
            'FK_iMaNV' => $requestData->getPost('FK_iMaNV'),
            'FK_iMaNCC' => $requestData->getPost('FK_iMaNCC'),
            'dNgayNhap' => $requestData->getPost('dNgayNhap'),
            'sGhiChu' => $requestData->getPost('sGhiChu'),
            'PK_iPN' => 'PN_'. $uniqueCode
        ];
        
        $dataSave = [
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'fGiaNhap' => $requestData->getPost('fGiaNhap'),
            'iSoluong' => $requestData->getPost('iSoluong'),
        ];
        // dd($dataSave);

        //lấy thông tin để update số lượng sản phẩm
        $maSP = $requestData->getPost('FK_iMaSP');
        $soluong = $requestData->getPost('iSoluong');
        // $gianhap = $requestData->getPost('fGiaNhap');
        // dd($soluong);
        for ($i = 0; $i < count($maSP); $i++) {
            $productID = $maSP[$i];
            $quantityToDeduct = $soluong[$i];
            // $importPrice = $gianhap[$i];

            // Truy vấn số lượng hiện có của sản phẩm
            $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;

            // Tính toán số lượng mới
            $newQuantity = $currentQuantity + $quantityToDeduct;
            // dd($newQuantity);
            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();
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

    /**Cập nhật phiếu---------------------------------------------------------------*/
    public function updateImportBillInfo($requestData, $id)
    {
        $validate = $this->validateUpdateImportBill($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }

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

    
/**Xóa phiếu---------------------------------------------------------------*/
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

    /**validate phiếu khi thêm mới---------------------------------------------------------------*/
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

    /**validate phiếu khi cập nhật---------------------------------------------------------------*/
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
