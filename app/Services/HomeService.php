<?php
namespace App\Services;
use App\Models\ProductModel;
use App\Models\ProductGroupModel;
use App\Common\ResultUtils;
use Exception;

class HomeService extends BaseService
{
    private $product, $productGroup;
    function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->productGroup = new ProductGroupModel();
        $this->product->protect(false);
    }

    /**get sản phẩm mới nhất */
    public function getAllProduct(){
        $result = $this->product
        ->select('*')
        ->orderBy('dNgayTao', 'desc')
        ->findAll();
        return $result;
    }

    public function getAllProductGroup(){
        $result = $this->productGroup
        ->select('*')
        ->findAll();
        return $result;
    }

    /**get all sản phẩm */
    public function getProduct(){
        $result = $this->product
        ->select('*')
        ->findAll();
        return $result;
    }
}
