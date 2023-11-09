<?php

namespace App\Services;

use App\Models\ProductGroupModel;
use App\Models\ProductModel;
use App\Common\ResultUtils;
use Exception;

class ProductGroupService extends BaseService
{
    private $productGroup, $product;
    function __construct()
    {
        parent::__construct();
        $this->productGroup = new ProductGroupModel();
        $this->product = new ProductModel();
        $this->productGroup->protect(false);
    }

    /**get all supplier */
    public function getAllProductGroup()
    {
        $result = $this->productGroup
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addProductGroupInfo($requestData)
    {
        $validate = $this->validateAddProductGroup($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        // dd($dataSave);
        try {

            $this->productGroup->save($dataSave);
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


    public function updateProductInfo($requestData)
    {
        $validate = $this->validateUpdateProductGroup($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = [
            'sTenNhom' => $requestData->getPost('sTenNhom'),
        ];
        $id = $requestData->getPost('PK_iMaNhom');

        // dd($dataSave);
        try {
            $builder = $this->productGroup->builder();
            $builder->where('PK_iMaNhom', $id);
            $builder->update($dataSave);
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

    public function getProductGroupById($id)
    {
        return $this->productGroup->where('PK_iMaNhom', $id)->first();
    }

    public function deleteProductInfo($id)
    {
        try {
            $currentid = $this->product->select('PK_iMaSP')->where('FK_iMaNhom', $id)->findAll();
            if (!empty($currentid)) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['' => 'Nhóm đã được sử dụng, không thể xóa!'],
                ];
            } else {
                $builder = $this->productGroup->builder();
                $builder->where('PK_iMaNhom', $id);
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

    public function validateAddProductGroup($requestData)
    {
        $rule = [
            'PK_iMaNhom' => 'required|max_length[100]|is_Unique[tbl_nhomsanpham.PK_iMaNhom]',
            'sTenNhom' => 'required|max_length[100]',
        ];
        $message = [
            'sTenNhom' => [
                'max_length' => 'Tên nhóm sản phẩm quá dài!',
                'required' => 'Tên nhóm không được để trống!',
            ],
            'PK_iMaNhom' => [
                'max_length' => 'Mã nhóm sản phẩm quá dài!',
                'required' => 'Mã nhóm không được để trống!',
                'is_Unique' => 'Mã đã tồn tại trong cơ sở dữ liệu!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function validateUpdateProductGroup($requestData)
    {
        $rule = [
            'sTenNhom' => 'required|max_length[100]',
        ];
        $message = [
            'sTenNhom' => [
                'max_length' => 'Tên nhóm sản phẩm quá dài!',
                'required' => 'Tên nhóm không được để trống!',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
