<?php
namespace App\Services;
use App\Models\ProductModel;
use App\Common\ResultUtils;
use Exception;

class HomeService extends BaseService
{
    private $product;
    function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
    }

    /**get all supplier */
    public function getAllProduct(){
        $result = $this->product
        ->select('*')
        ->orderBy('dNgayTao', 'desc')
        ->findAll();
        return $result;
    }
}
