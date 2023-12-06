<?php
namespace App\Services;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Common\ResultUtils;
use Exception;

class OrderstatusService extends BaseService
{
    private $orderDetail, $order;
    function __construct()
    {
        parent::__construct();
        $this->orderDetail = new OrderDetailModel();
        $this->order = new OrderModel();
    }

    /**Lấy danh sách các đơn đặt hàng theo sesion */
    public function getOrder($id){
        $result = $this->order
        ->select('*')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
        ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_dondathang.FK_iMaKH')
        ->where('tbl_dondathang.PK_iMaDon', $id)
        ->first();
        return $result;
    }

    /**Lấy danh sách chi tiết đơn hàng - CẬP NHẬT------------------------------------------------------------------------ */
    public function getAllOrderDetail($id)
    {
        $result = $this->orderDetail
            ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) * (1 - IFNULL(tbl_khuyenmai.fChietKhau/100, 0)) as total_price')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('FK_iMaDon', $id)
            ->findAll();
        return $result;
    }

    /**Update đơn hàng------------------------------------------------------------------------ */
    public function doitra($requestData, $id)
    {
        $dataSave = [
            'FK_iMaTrangThai' => '11',
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
}
