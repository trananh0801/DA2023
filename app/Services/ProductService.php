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

    /**get all user */
    public function getAllProduct(){
        $result = $this->product
        ->select('*')
        ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom  = tbl_sanpham.FK_iMaNhom')
        ->join('tbl_trangthai', 'tbl_trangthai.PK_iMaTrangThai   = tbl_sanpham.FK_iMaTrangThai ')
        ->findAll();
        // dd($result);
        return $result;
    }
}
