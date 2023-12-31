<?php

namespace App\Services;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\CartModel;
use App\Models\CartDetailModel;
use App\Common\ResultUtils;
use Exception;

class CheckoutService extends BaseService
{
    private $order, $orderDetail, $product, $customer, $cart, $cartDetail;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->orderDetail = new OrderDetailModel();
        $this->product = new ProductModel();
        $this->customer = new CustomerModel();
        $this->order->protect(false);
        $this->orderDetail->protect(false);
        $this->product->protect(false);

        $this->cart = new CartModel();
        $this->cart->protect(false);

        $this->cartDetail = new CartDetailModel();
        $this->cartDetail->protect(false);
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

    /**Lấy sản phẩm được đặt từ chi tiết sản phẩm */
    public function get1Product($id)
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('tbl_sanpham.PK_iMaSP', $id)
            ->first();
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
            'FK_iMaTrangThai' => '14',
        ];
        $dataSave_CTDDH = [
            'iSoLuong' => $requestData->getPost('iSoLuong'),
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'FK_iMaDon' => 'HD_' . $uniqueCode
        ];

        $soluongSP = $this->product->where('PK_iMaSP', $dataSave_CTDDH['FK_iMaSP'])->get()->getRow()->fSoLuong;
        $quantityToDeduct = $dataSave_CTDDH['iSoLuong'];
        if ($quantityToDeduct == '0') {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi: ' => 'Vui lòng thêm số lượng lớn hơn 0!'],
            ];
        }
        if ($quantityToDeduct > $soluongSP) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi: ' => 'Không đủ số lượng sản phẩm trong kho!'],
            ];
        }

        //trừ số lượng trong kho
        $productID = $dataSave_CTDDH['FK_iMaSP'];
        $quantityToDeduct = $dataSave_CTDDH['iSoLuong'];
        // Truy vấn số lượng hiện có của sản phẩm
        $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
        // Tính toán số lượng mới
        $newQuantity = $currentQuantity - $quantityToDeduct;
        // Cập nhật số lượng mới vào cơ sở dữ liệu
        $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();

        try {
            //insert hóa đơn
            $this->order->save($dataSave_DDH);
            //insert sản chi tiết hóa đơn
            $this->orderDetail->save($dataSave_CTDDH);
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


    /**Thêm mới đơn hàng------------------------------------------------------------------------ */
    public function addOrderInfoOnePay($requestData)
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
            'FK_iMaTrangThai' => '13',
        ];
        $dataSave_CTDDH = [
            'iSoLuong' => $requestData->getPost('iSoLuong'),
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'FK_iMaDon' => 'HD_' . $uniqueCode
        ];
        // dd($dataSave_CTDDH);
        $soluongSP = $this->product->where('PK_iMaSP', $dataSave_CTDDH['FK_iMaSP'])->get()->getRow()->fSoLuong;
        $quantityToDeduct = $dataSave_CTDDH['iSoLuong'];
        if ($quantityToDeduct == '0') {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi: ' => 'Vui lòng thêm số lượng lớn hơn 0!'],
            ];
        }
        if ($quantityToDeduct > $soluongSP) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi: ' => 'Không đủ số lượng sản phẩm trong kho!'],
            ];
        }

        //trừ số lượng trong kho
        $productID = $dataSave_CTDDH['FK_iMaSP'];
        $quantityToDeduct = $dataSave_CTDDH['iSoLuong'];
        // Truy vấn số lượng hiện có của sản phẩm
        $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
        // Tính toán số lượng mới
        $newQuantity = $currentQuantity - $quantityToDeduct;
        // Cập nhật số lượng mới vào cơ sở dữ liệu
        $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();

        try {
            //insert hóa đơn
            $this->order->save($dataSave_DDH);
            //insert sản chi tiết hóa đơn
            $this->orderDetail->save($dataSave_CTDDH);
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


    /**Thêm mới đơn hàng------------------------------------------------------------------------ */
    public function addOrderInfoMuti($requestData)
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
            'FK_iMaTrangThai' => '14',
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
        for ($i = 0; $i < count($dataSave_CTDDH['FK_iMaSP']); $i++) {
            $productID = $dataSave_CTDDH['FK_iMaSP'][$i];
            $quantityToDeduct = $dataSave_CTDDH['iSoLuong'][$i];
            // Truy vấn số lượng hiện có của sản phẩm
            $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
            if ($quantityToDeduct == '0') {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['Lỗi: ' => 'Vui lòng thêm số lượng lớn hơn 0!'],
                ];
            }
            if ($quantityToDeduct > $currentQuantity) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['Lỗi: ' => 'Không đủ số lượng sản phẩm trong kho!'],
                ];
            }
            // Tính toán số lượng mới
            $newQuantity = $currentQuantity - $quantityToDeduct;
            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();
        }
        try {
            //insert hóa đơn
            $this->order->save($dataSave_DDH);

            //insert sản chi tiết hóa đơn
            $this->orderDetail->insertBatch($transformedData);

            //Xóa sản phẩm trong giỏ hàng
            $cartID = $this->cart->where('FK_iMaTK', $userID)->get()->getRow()->PK_iMaGH;
            $this->cartDetail->where('FK_iMaGH', $cartID)->delete();
            $builder = $this->cart->builder();
            $builder->where('FK_iMaTK', $userID);
            $builder->delete();

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


    /**Thêm mới đơn hàng------------------------------------------------------------------------ */
    public function addOrderInfoMutiOnepay($requestData)
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
            'FK_iMaTrangThai' => '13',
        ];
        $dataSave_CTDDH = [
            'iSoLuong' => $requestData->getPost('iSoLuong'),
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
        ];
        // dd($dataSave_DDH);
        $transformedData = array();
        foreach ($dataSave_CTDDH as $k => $v) {
            foreach ($v as $k1 => $v1) {
                $transformedData[$k1][$k] = $v1;
                $transformedData[$k1]['FK_iMaDon'] = 'HD_' . $uniqueCode;
            }
        }
        // dd($transformedData);
        for ($i = 0; $i < count($dataSave_CTDDH['FK_iMaSP']); $i++) {
            $productID = $dataSave_CTDDH['FK_iMaSP'][$i];
            $quantityToDeduct = $dataSave_CTDDH['iSoLuong'][$i];
            // Truy vấn số lượng hiện có của sản phẩm
            $currentQuantity = $this->product->where('PK_iMaSP', $productID)->get()->getRow()->fSoLuong;
            if ($quantityToDeduct == '0') {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['Lỗi: ' => 'Vui lòng thêm số lượng lớn hơn 0!'],
                ];
            }
            if ($quantityToDeduct > $currentQuantity) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['Lỗi: ' => 'Không đủ số lượng sản phẩm trong kho!'],
                ];
            }
            // Tính toán số lượng mới
            $newQuantity = $currentQuantity - $quantityToDeduct;
            // Cập nhật số lượng mới vào cơ sở dữ liệu
            $this->product->where('PK_iMaSP', $productID)->set('fSoLuong', $newQuantity)->update();
        }
        try {
            //insert hóa đơn
            $this->order->save($dataSave_DDH);

            //insert sản chi tiết hóa đơn
            $this->orderDetail->insertBatch($transformedData);

            //Xóa sản phẩm trong giỏ hàng
            $cartID = $this->cart->where('FK_iMaTK', $userID)->get()->getRow()->PK_iMaGH;
            $this->cartDetail->where('FK_iMaGH', $cartID)->delete();
            $builder = $this->cart->builder();
            $builder->where('FK_iMaTK', $userID);
            $builder->delete();

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
