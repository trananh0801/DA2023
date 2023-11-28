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
        $this->product->protect(false);
        $this->orderDetail->protect(false);
    }

    /**Lấy danh sách toàn bộ đơn hàng ra màn list - DANH SÁCH------------------------------------------------------------------------ */
    public function getAllOrder()
    {
        $result = $this->order
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
            ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách toàn bộ đơn hàng ra màn list - CẬP NHẬT------------------------------------------------------------------------ */
    public function getAllOrderById($id)
    {
        $result = $this->order
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
            ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
            ->where('PK_iMaDon', $id)->first();
        return $result;
    }

    /**Lấy danh sách chi tiết đơn hàng - CẬP NHẬT------------------------------------------------------------------------ */
    public function getAllOrderDetailById($id)
    {
        $result = $this->orderDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP', 'left')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('FK_iMaDon', $id)
            ->findAll();
        return $result;
    }

    /**Lấy danh sách nhân viên------------------------------------------------------------------------ */
    public function getAllStaff()
    {
        $result = $this->staff
            ->select('*')
            ->where('sTenChucVu', '3')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách khách hàng------------------------------------------------------------------------ */
    public function getAllCustomer()
    {
        $result = $this->customer
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách trạng thái------------------------------------------------------------------------ */
    public function getAllStatus()
    {
        $result = $this->status
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**Lấy danh sách sản phẩm------------------------------------------------------------------------ */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }
    /**Lấy 1 sản phẩm------------------------------------------------------------------------ */
    public function checkProductDetail($product_id = '')
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('PK_iMaSP', $product_id)
            ->first();
        return $result;
    }


    /**Thêm mới đơn hàng------------------------------------------------------------------------ */
    public function addOrderInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        //check validate khi thêm mới
        $validate = $this->validateAddOrder($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }

        //Lấy thông tin hóa đơn đã nhập
        $dataSave_HD = $requestData->getPost();
        $dataSave_HD['PK_iMaDon'] = 'HD_' . $uniqueCode;
        unset($dataSave_HD['FK_iMaSP']);
        unset($dataSave_HD['iSoLuong']);
        // dd($dataSave_HD);

        //lấy thông tin sản phẩm của đơn hàng
        $dataSave_CT = [
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'iSoLuong' => $requestData->getPost('iSoLuong'),
        ];

        $dataSave_CT_update = [
            'PK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'fSoLuong' => $requestData->getPost('iSoLuong'),
        ];

        //lấy thông tin để update số lượng sản phẩm
        $maSP = $requestData->getPost('FK_iMaSP');
        $soluong = $requestData->getPost('iSoLuong');



        // dd($soluong);
        for ($i = 0; $i < count($maSP); $i++) {
            $productID = $maSP[$i];
            $quantityToDeduct = $soluong[$i];

            $soluongSP = $this->product->where('PK_iMaSP', $maSP[$i])->get()->getRow()->fSoLuong;
            if ($quantityToDeduct > $soluongSP) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['Lỗi: ' => 'Không đủ số lượng sản phẩm trong kho!'],
                ];
            }

            // Truy vấn số lượng hiện có của sản phẩm
            $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
            // Tính toán số lượng mới
            $newQuantity = $currentQuantity - $quantityToDeduct;
            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();
        }

        try {
            //insert hóa đơn
            $this->order->save($dataSave_HD);

            $transformedData = array();
            foreach ($dataSave_CT as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    $transformedData[$k1][$k] = $v1;
                    $transformedData[$k1]['FK_iMaDon'] = 'HD_' . $uniqueCode;
                }
            }

            $transformedData_update = array();
            foreach ($dataSave_CT_update as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    $transformedData_update[$k1][$k] = $v1;
                }
            }

            //insert sản chi tiết hóa đơn
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

    /**Lấy đơn hàng theo í------------------------------------------------------------------------ */
    public function getOrderById($id)
    {
        return $this->order->where('PK_iMaDon', $id)->first();
    }

    /**Lấy sản phẩm theo id------------------------------------------------------------------------ */
    public function getProductById($id)
    {
        return $this->orderDetail->where('FK_iMaDon', $id)->first();
    }

    /**Update đơn hàng------------------------------------------------------------------------ */
    public function updateOrderInfo($requestData, $id)
    {
        $validate = $this->validateAddOrder($requestData);
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
            $builder = $this->order->builder();
            $builder->where('PK_iMaDon', $id);
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


    /**Xóa đơn hàng----------------------------------------------------------------------- */
    public function deleteOrderInfo($id)
    {
        try {
            $builder = $this->order->builder();
            $builder->where('PK_iMaDon', $id);
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

    /**Validate đơn hàng khi thêm mới------------------------------------------------------------------------ */
    public function validateAddOrder($requestData)
    {
        $rule = [
            'iSoLuong' => 'required',
        ];
        $message = [
            'iSoLuong' => [
                'required' => 'Số lượng không được để trống!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    /**Validata đơn hàng khi cập nhật------------------------------------------------------------------------ */
    public function validateUpdateOrder($requestData)
    {
        $rule = [
            'iSoLuong' => 'required',
        ];
        $message = [
            'iSoLuong' => [
                'required' => 'Số lượng không được để trống!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
