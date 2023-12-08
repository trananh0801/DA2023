<?php

namespace App\Services;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\PromotionProductModel;
use App\Models\ProductModel;
use App\Models\PromotionModel;
use App\Common\ResultUtils;
use Exception;

class StatisticalService extends BaseService
{
    private $order, $product, $orderDetail, $promotionDetail, $promo;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->orderDetail = new OrderDetailModel();
        $this->product = new ProductModel();
        $this->promotionDetail = new PromotionProductModel();
        $this->promo = new PromotionModel();
    }

    /**Tổng đơn hàng đổi trả */
    public function getReturnBillCount()
    {
        $count = $this->order
            ->where('FK_iMaTrangThai', '5')
            ->countAllResults();
        return $count;
    }

    public function getReturnBillCountByDate($startDate, $endDate)
    {
        $count = $this->order
            ->where('dThoiGianTao >=', $startDate)
            ->where('dThoiGianTao <=', $endDate)
            ->where('FK_iMaTrangThai', '5')
            ->countAllResults();
        return $count;
    }

    /**thống kê all */
    // public function getOrder()
    // {
    //     $result = $this->order
    //         ->select('*')
    //         ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
    //         ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
    //         ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
    //         ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon')
    //         ->findAll();
    //     return $result;
    // }

    public function getOrder()
    {
        $result['order'] = [];
        $order = $this->order
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
            ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
            ->findAll();
        $orderDetail = $this->orderDetail
            ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) as thanhtien')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
            ->findAll();
        foreach ($order as $orderItem) {
            // Lấy mã đơn hàng
            $orderID = $orderItem['PK_iMaDon'];
            // Tạo một mảng tạm để lưu thông tin đơn hàng và chi tiết đơn hàng
            $combinedOrder = $orderItem;
            // Tìm các mục chi tiết đơn hàng tương ứng với mã đơn hàng
            $orderDetails = array_filter($orderDetail, function ($item) use ($orderID) {
                return $item['FK_iMaDon'] == $orderID;
            });
            // Thêm mảng chi tiết đơn hàng vào mảng tạm
            $combinedOrder['orderDetails'] = array_values($orderDetails);
            // Thêm mảng tạm vào mảng kết quả tổng cộng
            $result['order'][] = $combinedOrder;
        }
        $promotion = $this->promotionDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_sp_km.FK_iMaSP', 'right')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM')
            ->findAll();
        
        $data = [];
        foreach ($promotion as $key => $item) {
            $data[$item['PK_iMaSP']] = $item['fChietKhau'];
        }
        $result['km'] = $data;
        // dd($result['km']);

        return $result;
    }

    /**tính tổng all */
    public function getTotalAll()
    {
        $result = $this->order
            ->select('SUM(tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) as tong')
            ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
            ->where('tbl_dondathang.FK_iMaTrangThai', '3')
            ->first();
        return $result;
    }

    /**Thống kê theo thời gian */
    public function getOrderByDate($startDate, $endDate)
    {
        // $result = $this->order
        //     ->select('*')
        //     ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
        //     ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
        //     ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
        //     ->where('tbl_dondathang.dThoiGianTao >=', $startDate)
        //     ->where('tbl_dondathang.dThoiGianTao <=', $endDate)
        //     // ->where('tbl_dondathang.FK_iMaTrangThai', '3')
        //     ->findAll();
        // return $result;
        $result['order'] = [];
        $order = $this->order
            ->select('*')
            ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
            ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
            ->where('tbl_dondathang.dThoiGianTao >=', $startDate)
            ->where('tbl_dondathang.dThoiGianTao <=', $endDate)
            ->findAll();
        $orderDetail = $this->orderDetail
            ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) as thanhtien')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
            ->findAll();
        foreach ($order as $orderItem) {
            // Lấy mã đơn hàng
            $orderID = $orderItem['PK_iMaDon'];
            // Tạo một mảng tạm để lưu thông tin đơn hàng và chi tiết đơn hàng
            $combinedOrder = $orderItem;
            // Tìm các mục chi tiết đơn hàng tương ứng với mã đơn hàng
            $orderDetails = array_filter($orderDetail, function ($item) use ($orderID) {
                return $item['FK_iMaDon'] == $orderID;
            });
            // Thêm mảng chi tiết đơn hàng vào mảng tạm
            $combinedOrder['orderDetails'] = array_values($orderDetails);
            // Thêm mảng tạm vào mảng kết quả tổng cộng
            $result['order'][] = $combinedOrder;
        }
        $promotion = $this->promotionDetail
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_sp_km.FK_iMaSP', 'right')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM')
            ->findAll();
        
        $data = [];
        foreach ($promotion as $key => $item) {
            $data[$item['PK_iMaSP']] = $item['fChietKhau'];
        }
        $result['km'] = $data;
        // dd($result['km']);

        return $result;
    }

    /**tính tổng all */
    public function getTotalByDate($startDate, $endDate)
    {
        $result = $this->order
            ->select('SUM(tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) as tong')
            ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
            ->where('tbl_dondathang.dThoiGianTao >=', $startDate)
            ->where('tbl_dondathang.dThoiGianTao <=', $endDate)
            ->where('tbl_dondathang.FK_iMaTrangThai', '3')
            ->first();
        return $result;
    }

    /**add new user */
    public function searchOrder($requestData)
    {

        $dataSearch = [
            'dBatDau' => $requestData->getGet('dBatDau'),
            'dKetThuc' => $requestData->getGet('dKetThuc'),
        ];
        return $dataSearch;
    }


    /**Lấy danh sách sản phẩm------------------------------------------------------------------------ */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách sản phẩm------------------------------------------------------------------------ */
    public function inventoryProduct()
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom = tbl_sanpham.FK_iMaNhom')
            ->findAll();
        return $result;
    }


    /**Lấy danh sách sản phẩm------------------------------------------------------------------------ */
    public function inventoryProductByCode($id)
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom = tbl_sanpham.FK_iMaNhom')
            ->where('tbl_sanpham.PK_iMaSP', $id)
            ->findAll();
        return $result;
    }


    /**add new user */
    public function searchProduct($requestData)
    {
        $dataSearch = $requestData->getGet('PK_iMaSP');
        return $dataSearch;
    }
}
