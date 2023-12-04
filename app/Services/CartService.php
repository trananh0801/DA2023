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
        $cart=$this->cart->select('*')->where('FK_iMaTK', $id)->first();
        if ($cart) {
            $cartID = $cart['PK_iMaGH'];
        
            // Kiểm tra nếu $cartID không phải là null
            if ($cartID !== null) {
                $result['cart_detail'] = $this->cartDetail
                    ->select('*')
                    ->join('tbl_sanpham', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
                    ->where('FK_iMaGH', $cartID)
                    ->findAll();
        
            } else {
                return;
            }
        } else {
            return;
        }
        
        // $result['cart_detail']=$this->cartDetail->select('*')->join('tbl_sanpham', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP') 
        // ->where('FK_iMaGH', $cart['PK_iMaGH'])->findAll();
        //         dd($result['cart_detail']); die();

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
