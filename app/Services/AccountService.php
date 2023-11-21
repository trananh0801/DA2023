<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Common\ResultUtils;
use CodeIgniter\I18n\Time;
use Exception;

class AccountService extends BaseService
{
    private $order, $orderDetail, $product, $customer, $user;
    function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->orderDetail = new OrderDetailModel();
        $this->product = new ProductModel();
        $this->customer = new CustomerModel();
        $this->user = new UserModel();
        $this->user->protect(false);
        $this->customer->protect(false);
    }

    /**Lấy mã khách hàng theo session------------------------------------------------------------------------ */
    public function getCustomerById($id)
    {
        return $this->customer->where('FK_iMaTK', $id)->get()->getRow()->PK_iMaKH;
    }

    /**Lấy danh sách các đơn đặt hàng theo sesion */
    public function gethistory($id)
    {
        $result = $this->order
            ->select('tbl_dondathang.*, count(tbl_ctdondathang.FK_iMaSP) as soluongsp, tbl_trangthai.sTenTrangThai')
            ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaDon = tbl_dondathang.PK_iMaDon', 'left')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_dondathang.FK_iMaTrangThai')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_ctdondathang.FK_iMaSP', 'left')
            ->where('tbl_dondathang.FK_iMaKH', $id)
            ->groupBy('tbl_dondathang.PK_iMaDon')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách các đơn đặt hàng theo sesion */
    public function getMyprofile($id)
    {
        $result = $this->user
            ->select('*')
            ->join('tbl_khachhang', 'tbl_khachhang.FK_iMaTK = tbl_taikhoan.PK_iMaTK')
            ->where('tbl_taikhoan.PK_iMaTK', $id)
            ->first();
        return $result;
    }

    public function UpdateMyprofile($requestData, $matk)
    {
        $day = $requestData->getPost('ngay');
        $month = $requestData->getPost('thang');
        $year = $requestData->getPost('nam');
        // Tạo đối tượng Time với ngày, tháng, năm
        $time = Time::createFromDate($year, $month, $day);
        // Định dạng ngày giờ theo định dạng MySQL datetime
        $formattedDatetime = $time->toDateTimeString();

        $dataSave_KH = [
            'sTenKH' => $requestData->getPost('tenKH'),
            'sDiaChi' => $requestData->getPost('sDiaChi'),
            'sSDT' => $requestData->getPost('sSDT'),
            'dNgaySinh' => $formattedDatetime,
            'sGioiTinh' => $requestData->getPost('sGioiTinh'),
        ];

        $dataSave_TK = [
            'sMatKhau' => password_hash((string) $requestData->getPost('sMatKhau'), PASSWORD_DEFAULT),
        ];
        try {
            $builder = $this->customer->builder();
            $builder->where('PK_iMaKH', $this->getCustomerById($matk));
            $builder->update($dataSave_KH);

            if($dataSave_TK['sMatKhau'] != ""){
                $builder = $this->user->builder();
                $builder->where('PK_iMaTK', $matk);
                $builder->update($dataSave_TK);
            }
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
