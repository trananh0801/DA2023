<?php
namespace App\Services;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\CustomerModel;
use App\Common\ResultUtils;
use Exception;

class AccountService extends BaseService
{
    private $order, $orderDetail, $product, $customer;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->orderDetail = new OrderDetailModel();
        $this->product = new ProductModel();
        $this->customer = new CustomerModel();
    }

    /**Lấy mã khách hàng theo session------------------------------------------------------------------------ */
    public function getCustomerById($id)
    {
        return $this->customer->where('FK_iMaTK', $id)->get()->getRow()->PK_iMaKH;
    }

    /**Lấy danh sách các đơn đặt hàng theo sesion */
    public function gethistory($id){
        $result = $this->order
        ->select('tbl_dondathang.*, count(tbl_ctdondathang.FK_iMaSP) as soluongsp, tbl_trangthai.sTenTrangThai')
        ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon', 'left')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
        ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP', 'left')
        // ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
        // ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
        ->where('tbl_dondathang.FK_iMaKH', $id)
        ->groupBy('tbl_dondathang.PK_iMaDon')
        ->findAll();
        return $result;
    }
}
