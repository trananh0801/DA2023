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
    public function getAllProduct(){
        $result = $this->product
        ->select('*')
        ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom  = tbl_sanpham.FK_iMaNhom')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai   = tbl_sanpham.FK_iMaTrangThai ')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**get all product group */
    public function getAllProductGroup(){
        $result = $this->productGroup
        ->select('*')
        ->findAll();
        // dd($result);
        return $result;
    }

    /**add new user */
    public function addProductInfo($requestData){
        $validate = $this->validateAddProduct($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        if(empty($dataSave['FK_iMaTrangThai'])){
            $dataSave['FK_iMaTrangThai'] = '2';
        }
        // dd($dataSave);
        try{
            $this->product->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'massageCode'=> ResultUtils::MESSAGE_CODE_OK,
                'message' => ['success'=> 'Thêm dữ liệu thành công'],
            ];
        }
        catch(Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'massageCode'=> ResultUtils::MESSAGE_CODE_ERR,
                'message' => [''=> $e->getMessage()],
            ];
        }
    }

    public function validateAddProduct($requestData){
        $rule = [
            'sTenSP'=>'max_length[100]',
            'fSoLuong'=>'max_length[30]|min_length[6]'
        ];
        $message = [
            'sTenSP'=> [
                'max_length' => 'Tên tài khoản quá dài!'
            ],
            'fSoLuong'=>[
                'max_length' => 'Mật khẩu quá dài!',
                'min_length' => 'Mật khẩu lớn hơn hoặc bằng {param} ký tự!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
