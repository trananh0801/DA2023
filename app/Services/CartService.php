<?php
namespace App\Services;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CartDetailModel;
use App\Common\ResultUtils;
use Exception;

class CartService extends BaseService
{
    private $cart, $cartDetail, $product;
    function __construct()
    {
        parent::__construct();
        $this->cart = new CartModel();
        $this->cart->protect(false);

        $this->cartDetail = new CartDetailModel();
        $this->cartDetail->protect(false);

        $this->product = new ProductModel();
    }

    /**Lấy danh sách sản phẩm trong giỏ hàng theo người dùng */
    public function getAllProduct($id){
        $result = $this->product
        ->select('*')
        ->join('tbl_ctgiohang', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
        ->join('tbl_giohang', 'tbl_giohang.PK_iMaGH = tbl_ctgiohang.FK_iMaGH')
        // ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
        // ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM')
        ->where('tbl_giohang.FK_iMaTK', $id)
        ->findAll();
        return $result;
    }


    public function updateCartInfo($requestData)
    {
        $magiohang = $requestData->getPost('PK_iMaGH');
        $masp = $requestData->getPost('FK_iMaSP');
        $soluong = $requestData->getPost('iSoLuong');
        try {
            for ($i = 0; $i < count($masp); $i++) {
                $productID = $masp[$i];
                $quantityToDeduct = $soluong[$i];
                $this->cartDetail->where('FK_iMaGH', $magiohang)->where('FK_iMaSP', $productID)->set('iSoLuong', $quantityToDeduct)->update();
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
