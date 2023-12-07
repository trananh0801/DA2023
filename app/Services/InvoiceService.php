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

class InvoiceService extends BaseService
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
    /**Lấy danh sách chi tiết đơn hàng - CẬP NHẬT------------------------------------------------------------------------ */
    public function tongtien($id)
    {
        $result = $this->orderDetail
            ->select('SUM((tbl_sanpham.fGiaBanLe * tbl_ctdondathang.iSoLuong) * (1 - IFNULL(tbl_khuyenmai.fChietKhau/100, 0))) as total_price')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP', 'left')
            ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
            ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
            ->where('FK_iMaDon', $id)
            ->groupBy('tbl_ctdondathang.FK_iMaDon')
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
}
