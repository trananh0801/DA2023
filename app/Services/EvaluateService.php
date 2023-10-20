<?php
namespace App\Services;
use App\Models\EvaluateModel;
use App\Common\ResultUtils;
use Exception;

class EvaluateService extends BaseService
{
    private $evaluate;
    function __construct()
    {
        parent::__construct();
        $this->evaluate = new EvaluateModel();
        $this->evaluate->protect(false);
    }

    /**get all supplier */
    public function getAllEvaluate(){
        $result = $this->evaluate
        ->select('*')
        ->join('tbl_khachhang', 'tbl_khachhang.PK_iMaKH = tbl_danhgia.FK_iMaKH')
        ->join('tbl_sanpham', 'tbl_sanpham.PK_iMaSP = tbl_danhgia.FK_iMaSP')
        ->findAll();
        // dd($result);
        return $result;
    }
}
