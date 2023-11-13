<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\ProductGroupModel;
use App\Common\ResultUtils;
use App\Models\CartModel;
use App\Models\CartDetailModel;
use Exception;

class HomeService extends BaseService
{
    private $product, $productGroup, $cart, $cartDetail;
    function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->productGroup = new ProductGroupModel();
        $this->cart = new CartModel();
        $this->cartDetail = new CartDetailModel();
        $this->product->protect(false);
        $this->cart->protect(false);
        $this->cartDetail->protect(false);
    }

    /**get sản phẩm mới nhất */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->orderBy('dNgayTao', 'desc')
            ->findAll();
        return $result;
    }

    /**get sản phẩm bán chạy nhất */
    public function getAllSellingProducts()
    {
        $result = $this->product
            ->select('tbl_sanpham.PK_iMaSP, tbl_sanpham.sTenSP, tbl_sanpham.sDVT, tbl_sanpham.fGiaBanLe, tbl_sanpham.sHinhAnh, tbl_sanpham.sGhiChu, count(tbl_ctdondathang.FK_iMaSP) as soluong')
            ->join('tbl_ctdondathang', 'tbl_ctdondathang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
            ->groupBy('FK_iMaSP')
            ->orderBy('soluong', 'desc')
            ->findAll();
        return $result;
    }

    public function getAllProductGroup()
    {
        $result = $this->productGroup
            ->select('*')
            ->findAll();
        return $result;
    }

    /**get all sản phẩm */
    public function getProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        return $result;
    }

    /**Thêm mới giỏ hàng---------------------------------------------------------------------------*/
    public function addCartInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddCart($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave_GH = [
            'PK_iMaGH' => 'GH_'. $uniqueCode,
            'FK_iMaTK' => '4'
        ];
        $dataSave_CTGH = [
            'FK_iMaSP' => $requestData->getPost('FK_iMaSP'),
            'FK_iMaGH' => 'GH_'. $uniqueCode,
            'iSoLuong' => $requestData->getPost('iSoLuong'),
        ];
        // dd($dataSave_CTGH);
        try {
            $this->cart->save($dataSave_GH);
            $this->cartDetail->save($dataSave_CTGH);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success' => 'Thêm dữ liệu thành công'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
            ];
        }
    }

    /**Validate giỏ hàng ---------------------------------------------------------------------------*/
    public function validateAddCart($requestData)
    {
        $rule = [
            'iSoLuong' => 'required',
        ];
        $message = [
            'iSoLuong' => [
                'required' => 'Vui lòng thêm số lượng!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
