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
    public function getAllProduct(){
        $result = $this->product
        ->select('*')
        ->join('tbl_ctgiohang', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
        ->join('tbl_giohang', 'tbl_giohang.PK_iMaGH = tbl_ctgiohang.FK_iMaGH')
        ->findAll();
        // dd($result);
        return $result;
    }
}
