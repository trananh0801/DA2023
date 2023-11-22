<?php
namespace App\Services;
use App\Models\ProductGroupModel;
use App\Models\ProductModel;
use App\Common\ResultUtils;
use Exception;

class CategoryService extends BaseService
{
    private $productGroup, $product;
    function __construct()
    {
        parent::__construct();
        $this->productGroup = new ProductGroupModel();
        $this->product = new ProductModel();
    }

    /**---Lấy all nhóm sản phẩm----------------------------------------------------------------------------------------- */
    public function getAllProductGroup()
    {
        $result = $this->productGroup
            ->select('*')
            ->findAll();
        return $result;
    }

    /**---Lấy tên nhóm----------------------------------------------------------------------------------------- */
    public function getNameProductGroup($id)
    {
        $result = $this->productGroup
            ->select('sTenNhom')
            ->where('PK_iMaNhom', $id)
            ->first();
        return $result;
    }

    /**---Lấy sản phẩm trong nhóm----------------------------------------------------------------------------------------- */
    public function getProductInGroup($id)
    {
        $result = $this->product
            ->select('*')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom = tbl_sanpham.FK_iMaNhom')
            ->where('tbl_sanpham.FK_iMaNhom', $id)
            ->findAll();
        return $result;
    }

    /**---Lấy sản phẩm trong nhóm----------------------------------------------------------------------------------------- */
    public function demSP($id)
    {
        $result = $this->product
            ->select('count(tbl_sanpham.PK_iMaSP) as tongsp')
            ->join('tbl_nhomsanpham', 'tbl_nhomsanpham.PK_iMaNhom = tbl_sanpham.FK_iMaNhom')
            ->groupBy('tbl_sanpham.FK_iMaNhom')
            ->where('tbl_sanpham.FK_iMaNhom', $id)
            ->findAll();
        return $result;
    }
}
