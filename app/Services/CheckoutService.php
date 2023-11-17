<?php

namespace App\Services;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Common\ResultUtils;
use Exception;

class CheckoutService extends BaseService
{
    private $order, $orderDetail, $product, $customer;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->orderDetail = new OrderDetailModel();
        $this->product = new ProductModel();
        $this->customer = new CustomerModel();
        $this->order->protect(false);
        $this->orderDetail->protect(false);
    }

    /**Lấy danh sách sản phẩm trong giỏ hàng theo người dùng */
    public function getAllProduct($id)
    {
        $result = $this->product
            ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctgiohang.iSoLuong) * (1 - IFNULL(tbl_khuyenmai.fChietKhau/100, 0)) as total_price')
            ->join('tbl_ctgiohang', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
            ->join('tbl_giohang', 'tbl_giohang.PK_iMaGH = tbl_ctgiohang.FK_iMaGH')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('tbl_giohang.FK_iMaTK', $id)
            ->findAll();
        return $result;
    }

    /**Lấy mã khách hàng theo session------------------------------------------------------------------------ */
    public function getCustomerById($id)
    {
        return $this->customer->where('FK_iMaTK', $id)->get()->getRow()->PK_iMaKH;
    }

    /**Thêm mới đơn hàng------------------------------------------------------------------------ */
    public function addOrderInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        //session
        $session = session();
        $userID = $session->get('matk');

        //Lấy thông tin đơn hàng từ view
        $dataSave_DDH = [
            'PK_iMaDon' => 'HD_' . $uniqueCode,
            'FK_iMaNV' => '',
            'FK_iMaKH' => $this->getCustomerById($userID),
            'FK_iMaTrangThai' => '3',
        ];
        $dataSave_CTDDH = [
            'iSoLuong' => $requestData->getPost('iSoLuong'),
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
        ];
        $transformedData = array();
        foreach ($dataSave_CTDDH as $k => $v) {
            foreach ($v as $k1 => $v1) {
                $transformedData[$k1][$k] = $v1;
                $transformedData[$k1]['FK_iMaDon'] = 'HD_' . $uniqueCode;
            }
        }

        // dd($transformedData);
        try {
            //insert hóa đơn
            $this->order->save($dataSave_DDH);
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
}
