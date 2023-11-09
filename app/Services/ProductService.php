<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Models\ProductGroupModel;
use App\Models\OrderDetailModel;
use App\Models\ImportBillDetailModel;
use App\Models\ReturnBillDetailModel;
use App\Models\StatusModel;
use App\Common\ResultUtils;
use Exception;

class ProductService extends BaseService
{
    private $product, $productGroup, $status, $orderDetail, $importBillDetail, $returnBillDetail;
    function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->productGroup = new ProductGroupModel();
        $this->status = new StatusModel();
        $this->orderDetail = new OrderDetailModel();
        $this->returnBillDetail = new ReturnBillDetailModel();
        $this->importBillDetail = new ImportBillDetailModel();
        $this->product->protect(false);
    }

    /**---Lấy danh sách all sản phẩm----------------------------------------------------------------------------------------- */
    public function getAllProduct()
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom  = tbl_sanpham.FK_iMaNhom')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**---Lấy all nhóm sản phẩm----------------------------------------------------------------------------------------- */
    public function getAllProductGroup()
    {
        $result = $this->productGroup
            ->select('*')
            ->findAll();
        // dd($result);
        return $result;
    }

    /**---Thêm mới sản phẩm----------------------------------------------------------------------------------------- */
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

    /**---Lấy sản phẩm theo id để xóa sản phẩm----------------------------------------------------------------------------------------- */
    public function getProductById($id)
    {
        return $this->product->where('PK_iMaSP', $id)->first();
    }

    /**---Cập nhật sản phẩm----------------------------------------------------------------------------------------- */
    public function updateProductInfo($requestData, $id)
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

        $dataSave = $requestData->getPost();
        unset($dataSave['PK_iMaSP']);
        unset($dataSave['fSoLuong']);
        unset($dataSave['fGiaNhap']);
        $dataSave['sHinhAnh'] = $newName;

        // dd($id);
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


    /**---Xóa sản phẩm----------------------------------------------------------------------------------------- */
    public function deleteProductInfo($id)
    {
        try {
            $current_HD = $this->orderDetail->select('FK_iMaSP')->where('FK_iMaSP', $id)->findAll();
            $current_PN = $this->importBillDetail->select('FK_iMaSP')->where('FK_iMaSP', $id)->findAll();
            $current_HT = $this->returnBillDetail->select('FK_iMaSP')->where('FK_iMaSP', $id)->findAll();
            if (!empty($current_HD) || !empty($current_PN) || !empty($current_HT)) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'massageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['' => 'Sản phẩm đã được sử dụng, không thể xóa!'],
                ];
            } else {
                $builder = $this->product->builder();
                $builder->where('PK_iMaSP', $id);
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

    /**---Validate sản phẩm khi thêm mới----------------------------------------------------------------------------------------- */
    public function validateAddProduct($requestData)
    {
        $rule = [
            'sTenSP' => 'required|max_length[100]',
            'sDVT' => 'required',
            'fGiaBanLe' => 'required',
            'fGiaBanSi' => 'required',
            // 'sHinhAnh' => 'required',
        ];
        $message = [
            'sTenSP' => [
                'max_length' => 'Tên sản phẩm quá dài!',
                'required' => 'Tên sản phẩm không được để trống!'
            ],
            'sDVT' => [
                'required' => 'Đơn vị tính không được để trống!'
            ],
            'fGiaBanLe' => [
                'required' => 'Giá bán lẻ không được để trống!',
                // 'numeric' => 'Giá bán lẻ phải là dạng số!',
            ],
            'fGiaBanSi' => [
                'required' => 'Giá bán sỉ không được để trống!',
                // 'numeric' => 'Giá bán sỉ phải là dạng số!',
            ],
            // 'sHinhAnh' => [
            //     'required' => 'Hình ảnh không được để trống!'
            // ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    /**---Validate sản phẩm khi cập nhật----------------------------------------------------------------------------------------- */
    public function validateUpdateProduct($requestData)
    {
        $rule = [
            'sTenSP' => 'required|max_length[100]',
            'sDVT' => 'required',
            'fGiaBanLe' => 'required',
            'fGiaBanSi' => 'required',
            // 'sHinhAnh' => 'required',
        ];
        $message = [
            'sTenSP' => [
                'max_length' => 'Tên sản phẩm quá dài!',
                'required' => 'Tên sản phẩm không được để trống!'
            ],
            'sDVT' => [
                'required' => 'Đơn vị tính không được để trống!'
            ],
            'fGiaBanLe' => [
                'required' => 'Giá bán lẻ không được để trống!',
                // 'numeric' => 'Giá bán lẻ phải là dạng số!',
            ],
            'fGiaBanSi' => [
                'required' => 'Giá bán sỉ không được để trống!',
                // 'numeric' => 'Giá bán sỉ phải là dạng số!',
            ],
            // 'sHinhAnh' => [
            //     'required' => 'Hình ảnh không được để trống!'
            // ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
