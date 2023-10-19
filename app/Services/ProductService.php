<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\ProductGroupModel;
use App\Models\StatusModel;
use App\Common\ResultUtils;
use Exception;

class ProductService extends BaseService
{
    private $product, $productGroup, $status;
    function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->productGroup = new ProductGroupModel();
        $this->status = new StatusModel();
        $this->product->protect(false);
    }

    /**get all product */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom  = tbl_sanpham.FK_iMaNhom')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**get all product group */
    public function getAllProductGroup()
    {
        $result = $this->productGroup
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addProductInfo($requestData)
    {
        $validate = $this->validateAddProduct($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $image = $requestData->getFile('sHinhAnh'); // Lấy file ảnh từ biểu mẫu
        // Kiểm tra xem có lỗi trong quá trình tải lên hay không
        if ($image->isValid() && !$image->hasMoved()) {
            // Định đường dẫn đến thư mục lưu trữ ảnh sản phẩm
            $uploadPath = WRITEPATH . 'uploads/products/';
            // Đặt tên file mới cho ảnh (có thể dựa trên tên sản phẩm hoặc một thuộc tính khác)
            $newName = $image->getRandomName();
            // Di chuyển ảnh từ thư mục tạm thời đến thư mục lưu trữ
            $image->move($uploadPath, $newName);
            // Lưu đường dẫn của ảnh vào cơ sở dữ liệu hoặc làm gì bạn cần
        } else {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi' => 'Lỗi tải ảnh'],
            ];
        }
        $dataSave = $requestData->getPost();
        $dataSave['sHinhAnh'] = $newName;
        // dd($dataSave);
        // if (empty($dataSave['FK_iMaTrangThai'])) {
        //     $dataSave['FK_iMaTrangThai'] = '2';
        // }
        try {
            $this->product->save($dataSave);

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

    public function getProductById($id)
    {
        return $this->product->where('PK_iMaSP', $id)->first();
    }

    public function updateProductInfo($requestData)
    {
        
        // dd($id);
        $validate = $this->validateUpdateProduct($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $image = $requestData->getFile('sHinhAnh'); // Lấy file ảnh từ biểu mẫu
        // Kiểm tra xem có lỗi trong quá trình tải lên hay không
        if ($image->isValid() && !$image->hasMoved()) {
            // Định đường dẫn đến thư mục lưu trữ ảnh sản phẩm
            $uploadPath = WRITEPATH . 'uploads/products/';
            // Đặt tên file mới cho ảnh (có thể dựa trên tên sản phẩm hoặc một thuộc tính khác)
            $newName = $image->getRandomName();
            // Di chuyển ảnh từ thư mục tạm thời đến thư mục lưu trữ
            $image->move($uploadPath, $newName);
            // Lưu đường dẫn của ảnh vào cơ sở dữ liệu hoặc làm gì bạn cần
        } else {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['Lỗi' => 'Lỗi tải ảnh'],
            ];
        }

        $id = $requestData->getPost('PK_iMaSP');
        $dataSave = $requestData->getPost();
        unset($dataSave['PK_iMaSP']);
        unset($dataSave['fSoLuong']);
        unset($dataSave['fGiaNhap']);
        $dataSave['sHinhAnh'] = $newName;

        // dd($dataSave);
        try {
            $builder = $this->product->builder();
            $builder->where('PK_iMaSP', $id);
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

    

    public function deleteProductInfo($id)
    {
        try {
            $builder = $this->product->builder();
            $builder->where('PK_iMaSP', $id);
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

    public function validateAddProduct($requestData)
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

    public function validateUpdateProduct($requestData)
    {
        $rule = [
            'sTenNhom' => 'max_length[100]',
        ];
        $message = [
            'ssTenNhom' => [
                'max_length' => 'Tên nhóm sản phẩm quá dài!'
            ]
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
