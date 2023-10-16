<?php

namespace App\Services;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\StaffModel;
use App\Models\StatusModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Common\ResultUtils;
use Exception;

class OrderService extends BaseService
{
    private $order, $staff, $status, $product, $orderDetail, $customer;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->staff = new StaffModel();
        $this->status = new StatusModel();
        $this->product = new ProductModel();
        $this->orderDetail = new OrderDetailModel();
        $this->customer = new CustomerModel();
        $this->order->protect(false);
        $this->orderDetail->protect(false);
    }

    /**get all importBill */
    public function getAllOrder()
    {
        $result = $this->order
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV')
            // ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
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
    public function getAllCustomer()
    {
        $result = $this->customer
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
    public function addOrderInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddOrder($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave_HD = $requestData->getPost();
        $dataSave_HD['PK_iMaDon'] = 'HD_'. $uniqueCode;
        unset($dataSave_HD['FK_iMaSP']);
        unset($dataSave_HD['iSoLuong']);
        // dd($dataSave_HD);

        $dataSave_CT = [
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'iSoLuong' => $requestData->getPost('iSoLuong'),
        ];
        // dd($dataSave_CT);
        
        $duplicateProduct = $this->order->where('PK_iMaDon', $dataSave_HD['PK_iMaDon'])->first();
        if ($duplicateProduct) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => 'Trùng mã'],
            ];
        }
        try {
            $this->order->save($dataSave_HD);

            $transformedData = array();
            foreach ($dataSave_CT as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    $transformedData[$k1][$k] = $v1;
                    $transformedData[$k1]['FK_iMaDon'] = 'HD_'. $uniqueCode;
                }
            }

            // dd($transformedData);
            $this->orderDetail->insertBatch($transformedData);

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

    public function validateAddOrder($requestData)
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
