<?php

namespace App\Services;

use App\Models\PromotionModel;
use App\Models\PromotionProductModel;
use App\Models\ProductModel;
use App\Models\StatusModel;
use App\Common\ResultUtils;
use Exception;

class PromotionService extends BaseService
{
    private $promotion, $promotionProduct, $status, $product;
    function __construct()
    {
        parent::__construct();
        $this->promotion = new PromotionModel();
        $this->promotionProduct = new PromotionProductModel();
        $this->status = new StatusModel();
        $this->product = new ProductModel();
        $this->promotion->protect(false);
        $this->promotionProduct->protect(false);
    }

    /**Lấy danh sách khuyến mãi - DANH SÁCH ---------------------------------------------------------------------------*/
    public function getAllPromotion()
    {
        $result = $this->promotion
            ->select('*')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_khuyenmai.FK_iMaTrangThai')
            ->findAll();
        return $result;
    }

    /**Lấy danh sách khuyến mãi - CẬP NHẬT ---------------------------------------------------------------------------*/
    public function getPromotionById($id)
    {
        $result = $this->promotion
            ->select('*')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_khuyenmai.FK_iMaTrangThai')
            ->where('PK_iMaKM', $id)->first();
        return $result;
    }

    /**Lấy danh sách chi tiết khuyến mãi - CẬP NHẬT ---------------------------------------------------------------------------*/
    public function getAllPromotionDetail($id)
    {
        $result = $this->promotionProduct
            ->select('*')
            ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_sp_km.FK_iMaSP')
            ->where('FK_iMaKM', $id)
            ->findAll();
        return $result;
    }

    /**Lấy danh sách sản phẩm---------------------------------------------------------------------------*/
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        return $result;
    }


    /**Thêm mới khuyến mãi---------------------------------------------------------------------------*/
    public function addPromotionInfo($requestData)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddPromotion($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        
        $dataSave_KM = $requestData->getPost();
        unset($dataSave_KM['FK_iMaSP']);
        $dataSave_KM['PK_iMaKM'] = 'KM_' . $uniqueCode;

        $dataSave_KMSP = $requestData->getPost('FK_iMaSP');
        // dd($dataSave_KMSP);
        try {
            $this->promotion->save($dataSave_KM);

            $transformedData = array();
            foreach ($dataSave_KMSP as $k => $v) {
                    $transformedData[$k]['FK_iMaSP'] = $v;
                    $transformedData[$k]['FK_iMaKM'] = 'KM_'. $uniqueCode;
            }
            // dd($transformedData);

            $this->promotionProduct->insertBatch($transformedData);
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


    /**Update khuyến mãi ---------------------------------------------------------------------------*/
    public function updatePromotionInfo($requestData, $id)
    {
        //Tạo mã tự động
        $timestamp = time();
        $randomPart = mt_rand(1000, 9999);
        $uniqueCode = $timestamp . $randomPart;

        $validate = $this->validateAddPromotion($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave_KM = [
            'sTenKM' => $requestData->getPost('sTenKM'),
            'FK_iMaTrangThai' => $requestData->getPost('FK_iMaTrangThai'),
            'dNgayHieuLuc' => $requestData->getPost('dNgayHieuLuc'),
            'dNgayHetHieuLuc' => $requestData->getPost('dNgayHetHieuLuc'),
            'fChietKhau' => $requestData->getPost('fChietKhau'),
            'iSoLuongAD ' => $requestData->getPost('iSoLuongAD'),
            'sGhiChu ' => $requestData->getPost('sGhiChu'),
        ];

        $dataSave_KMSP = $requestData->getPost('FK_iMaSP');
        
        // dd($currentid);
        try {
            $builder = $this->promotion->builder();
            $builder->where('PK_iMaKM', $id);
            $builder->update($dataSave_KM);

            $builder1 = $this->promotionProduct->builder();
            $builder1->where('FK_iMaKM', $id);
            $builder1->delete();

            $transformedData = array();
            foreach ($dataSave_KMSP as $k => $v) {
                    $transformedData[$k]['FK_iMaSP'] = $v;
                    $transformedData[$k]['FK_iMaKM'] = $id;
            }
            // dd($transformedData);
            $this->promotionProduct->insertBatch($transformedData);

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

    /**---Xóa sản phẩm----------------------------------------------------------------------------------------- */
    public function deletePromotionInfo($id)
    {
        try {
            $current = $this->promotionProduct->select('FK_iMaKM')->where('FK_iMaKM', $id)->findAll();
            if (!empty($current)) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['' => 'Khuyến mãi đang được sử dụng, không thể xóa!'],
                ];
            } else {
                $builder = $this->promotion->builder();
                $builder->where('PK_iMaKM', $id);
                $builder->delete();
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'massageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'message' => ['success' => 'Xóa dữ liệu thành công'],
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['' => $e->getMessage()],
            ];
        }
    }

    /**Validate khuyến mãi ---------------------------------------------------------------------------*/
    public function validateAddPromotion($requestData)
    {
        $rule = [
            'sTenSP' => 'max_length[100]',
        ];
        $message = [
            'sTenSP' => [
                'max_length' => 'Tên sản phẩm quá dài!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
