<?php
namespace App\Services;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CartDetailModel;
use App\Models\PromotionProductModel;
use App\Common\ResultUtils;
use Exception;

class CartService extends BaseService
{
    private $cart, $cartDetail, $product, $promotionProd;
    function __construct()
    {
        parent::__construct();
        $this->cart = new CartModel();
        $this->cart->protect(false);

        $this->cartDetail = new CartDetailModel();
        $this->cartDetail->protect(false);

        $this->promotionProd = new PromotionProductModel();
        $this->promotionProd->protect(false);

        $this->product = new ProductModel();
    }

    /**Lấy danh sách sản phẩm trong giỏ hàng theo người dùng */
    public function getAllProduct($id){
        // $result = $this->product
        // ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctgiohang.iSoLuong)  * (1 - IFNULL(tbl_khuyenmai.fChietKhau/100, 0))  as total_price, tbl_ctgiohang.FK_iMaSP as MaSP')
        // // ->select('*, (tbl_sanpham.fGiaBanLe * tbl_ctgiohang.iSoLuong) * (1 - IFNULL(tbl_khuyenmai.fChietKhau/100, 0)) as total_price, tbl_ctgiohang.FK_iMaSP as MaSP')
        // ->join('tbl_ctgiohang', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP') 
 
        // ->join('tbl_giohang', 'tbl_giohang.PK_iMaGH = tbl_ctgiohang.FK_iMaGH')
        // ->join('tbl_sp_km', 'tbl_sp_km.FK_iMaSP = tbl_sanpham.PK_iMaSP', 'left')
        // ->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')
        // ->where('tbl_giohang.FK_iMaTK', $id)
        // ->findAll();
        //
       
       
        $cart=$this->cart->select('*')->where('FK_iMaTK', $id)->first();
        $result['cart_detail']=$this->cartDetail->select('*')->join('tbl_sanpham', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP') 
        ->where('FK_iMaGH', $cart['PK_iMaGH'])->findAll();
                // dd($result['cart_detail']); die();

        //KM
        $km=$this->promotionProd->select('*')->join('tbl_khuyenmai', 'tbl_khuyenmai.PK_iMaKM = tbl_sp_km.FK_iMaKM', 'left')->findAll();

        $data=[];
        foreach($km as $key => $item){
            $data[$item['FK_iMaSP']]=$item['fChietKhau'];
        }
        $result['km']=$data;

        // dd($result); die();

        return $result;
    }


    public function updateCartInfo($requestData)
    {
        $magiohang = $requestData->getPost('PK_iMaGH');
        $masp = $requestData->getPost('FK_iMaSP');
        $soluong = $requestData->getPost('iSoLuong');
        // dd($masp);
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

    /**Xóa đơn hàng----------------------------------------------------------------------- */
    public function deleteProductInCart($requestData)
    {
        $magiohang = $requestData->getPost('FK_iMaGH');
        $masp = $requestData->getPost('FK_iMaSP');
        try {
            $builder = $this->cartDetail->builder();
            $builder->where('FK_iMaGH', $magiohang);
            $builder->where('FK_iMaSP', $masp);
            $builder->delete();
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Xóa dữ liệu thành công'],
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
