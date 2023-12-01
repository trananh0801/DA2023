<?php
namespace App\Services;
use App\Models\OrderModel;
use App\Common\ResultUtils;
use Exception;

class StatisticalService extends BaseService
{
    private $order;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
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
        // ->groupBy('tbl_ctdondathang.FK_iMaDon')  
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
        ->first();
        return $result;
    }

    /**add new user */
    public function searchOrder($requestData){

        $dataSearch = [
            'dBatDau' => $requestData->getPost('dBatDau'),
            'dKetThuc' => $requestData->getPost('dKetThuc'),
        ];
        return $dataSearch;
    }
}
