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

    /**get all product */
    public function getAllPromotion()
    {
        $result = $this->promotion
            ->select('*')
            ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai = tbl_khuyenmai.FK_iMaTrangThai')
            ->findAll();
        return $result;
    }
    public function getAllPromotionDetail()
    {
        $result = $this->promotionProduct
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**get all product */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }


    /**add new user */
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

    public function updatePromotionInfo($requestData)
    {
        $validate = $this->validateAddPromotion($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave_KM = $requestData->getPost();

        $id_KM = $requestData->getPost('PK_iMaKH');

        // dd($id_TK);
        try {
            $builder = $this->promotion->builder();
            $builder->where('PK_iMaKH', $id_KM);
            $builder->update($dataSave_KM);

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
