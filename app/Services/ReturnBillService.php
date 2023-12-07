<?php

namespace App\Services;

use App\Models\ReturnBillModel;
use App\Models\ReturnBillDetailModel;
use App\Models\StaffModel;
use App\Models\StatusModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Models\ImportBillDetailModel;
use App\Common\ResultUtils;
// use App\Models\ImportBillModel;
use Exception;

class ReturnBillService extends BaseService
{
    private $returnBill, $staff, $supplier, $status, $product, $returnBillDetail, $importDetail;
    function __construct()
    {
        parent::__construct();
        $this->returnBill = new ReturnBillModel();
        $this->staff = new StaffModel();
        $this->status = new StatusModel();
        $this->product = new ProductModel();
        $this->supplier = new SupplierModel();
        $this->returnBillDetail = new ReturnBillDetailModel();
        $this->importDetail = new ImportBillDetailModel();
        $this->returnBill->protect(false);
        $this->product->protect(false);
        $this->returnBillDetail->protect(false);
    }

    /**Lấy danh sách phiếu - DANH SÁCH----------------------------------------------------------------------------------*/
    public function getAllReturnBill()
    {
        $result = $this->returnBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieuhoantra.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieuhoantra.FK_iMaNCC')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách phiếu - CẬP NHẬT----------------------------------------------------------------------------------*/
    public function getReturnBillById($id)
    {
        $result = $this->returnBill
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_phieuhoantra.FK_iMaNV')
            ->join('tbl_ncc', 'tbl_ncc.PK_iMaNCC = tbl_phieuhoantra.FK_iMaNCC')
            ->where('PK_iMaPhieu', $id)->first();
        return $result;
    }

    /**Lấy danh sách chi tiết phiếu----------------------------------------------------------------------------------*/
    public function getReturnBillDetailById($id)
    {
        $result = $this->returnBillDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctphieuhoantra.FK_iMaSP', 'inner')
            ->where('tbl_ctphieuhoantra.FK_iMaPhieu', $id)
            ->findAll();
        return $result;
    }

    


    /**Lấy danh sách nhân viên------------------------------------------------------------------------ */
    public function getAllStaff($id)
    {
        $result = $this->staff
            ->select('*')
            ->where('FK_iMaTK', $id)
            ->first();
        return $result;
    }

    /**Lấy danh sách nhà cung cấp----------------------------------------------------------------------------------*/
    public function getAllSupplier()
    {
        $result = $this->supplier
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách trạng thái----------------------------------------------------------------------------------*/
    public function getAllStatus()
    {
        $result = $this->status
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách sản phẩm----------------------------------------------------------------------------------*/
    public function getAllProduct()
    {
        $result = $this->importDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctphieunhap.FK_iMaSP')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách sản phẩm----------------------------------------------------------------------------------*/
    public function getImportBillDetail($id, $ctpn)
    {
        $result = $this->importDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctphieunhap.FK_iMaSP')
            ->where('tbl_sanpham.PK_iMaSP', $id)
            ->where('tbl_ctphieunhap.PK_iMaCT_PN', $ctpn)
            ->first();
        return $result;
    }

    /**Thêm mới phiếu----------------------------------------------------------------------------------*/
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

        //lấy thông tin để update số lượng sản phẩm
        $maSP = $requestData->getPost('FK_iMaSP');
        $soluong = $requestData->getPost('iSoLuong');
        // dd($maSP);
        for ($i = 0; $i < count($maSP); $i++) {
            $productID = $maSP[$i];
            $quantityToDeduct = $soluong[$i];

            // Truy vấn số lượng hiện có của sản phẩm
            $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
            // Tính toán số lượng mới
            $newQuantity = $currentQuantity - $quantityToDeduct;
            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();
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

    /**Cập nhật phiếu----------------------------------------------------------------------------------*/
    public function updateReturnBillInfo($requestData, $id)
    {
        
        $validate = $this->validateAddReturnBill($requestData);
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

    /**Validate phiếu cho cả thêm mới và cập nhật----------------------------------------------------------------------------------*/
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
