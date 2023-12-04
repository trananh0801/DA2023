<?php
namespace App\Services;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Common\ResultUtils;
use Exception;

class StatisticalService extends BaseService
{
    private $order, $product;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->product = new ProductModel();
    }

    /**Tổng đơn hàng đổi trả */
    // public function getAllReturnBill(){
    //     $result = $this->order
    //     ->select('SUM(PK_iMaDon) as total')
    //     ->where('FK_iMaTrangThai', '5')
    //     ->groupBy('PK_iMaDon')
    //     ->findAll();
    //     return $result;
    // }
    public function getReturnBillCount(){
        $count = $this->order
            ->where('FK_iMaTrangThai', '5')
            ->countAllResults();
        return $count;
    }

     /**thống kê all */
     public function getOrder(){
        $result = $this->order
        ->select('*')
        ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
        ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
        ->findAll();
        return $result;
    }

    /**tính tổng all */
    public function getTotalAll(){
        $result = $this->order
        ->select('SUM(tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) as tong')
        ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon')
        ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
        ->where('tbl_dondathang.FK_iMaTrangThai', '3')
        ->first();
        return $result;
    }

    /**Thống kê theo thời gian */
    public function getOrderByDate($startDate, $endDate){
        $result = $this->order
        ->select('*')
        ->join('tbl_nhanvien', 'tbl_nhanvien.PK_iMaNV = tbl_dondathang.FK_iMaNV', 'left')
        ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
        ->where('tbl_dondathang.dThoiGianTao >=', $startDate)
        ->where('tbl_dondathang.dThoiGianTao <=', $endDate)
        ->where('tbl_dondathang.FK_iMaTrangThai', '3')
        ->findAll();
        return $result;
    }

    /**tính tổng all */
    public function getTotalByDate($startDate, $endDate){
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
    public function searchOrder($requestData){

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
    public function searchProduct($requestData){
        $dataSearch = $requestData->getGet('PK_iMaSP');
        return $dataSearch;
    }
}
