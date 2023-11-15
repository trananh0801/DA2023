<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    //set data cho masterlayout
    public function loadMasterLayout($data, $title, $content, $dataLayout = [])
    {
        $data['title'] = $title;
        $data['leftMenu'] = view('Admin/Layout/left.menu.php');
        $data['header'] = view('Admin/Layout/header');
        $data['content'] = view($content, $dataLayout);
        return $data;
    }

    public function loadMasterLayoutUser($data, $title, $content, $dataLayout = [])
    {
        $db      = \Config\Database::connect(); // Khởi tạo kết nối đến cơ sở dữ liệu

        //Lấy danh sách nhóm sản phẩm
        $tbl_nhomsanpham = $db->table('tbl_nhomsanpham');
        $query = $tbl_nhomsanpham->get();
        $dataHeader['groups'] = $query->getResultArray();

        //Lấy danh sách khuyến mãi
        $tbl_khuyenmai = $db->table('tbl_khuyenmai');
        $query = $tbl_khuyenmai->get();
        $dataHeader['promotions'] = $query->getResultArray();

        //Lấy danh sách khuyến mãi trong tháng hiện tại
        $tbl_khuyenmai = $db->table('tbl_khuyenmai');
        $month = date('m'); // Lấy tháng hiện tại
        $year = date('Y');  // Lấy năm hiện tại
        $query = $tbl_khuyenmai->where('MONTH(dNgayHieuLuc)', $month)
            ->where('YEAR(dNgayHieuLuc)', $year)
            ->get();
        $dataHeader['promotionMonths'] = $query->getResultArray();


        //Lấy danh sách sản phẩm trong giỏ hàng theo id tài khoản
        $tbl_sanpham = $db->table('tbl_sanpham');
        $tbl_chitietgiohang = $db->table('tbl_ctgiohang');
        $tbl_giohang = $db->table('tbl_giohang');
        $idTaiKhoan = 4; // Thay thế bằng id tài khoản thực tế
        $query = $tbl_sanpham->select('tbl_sanpham.*, tbl_ctgiohang.*, tbl_giohang.*')
            ->join('tbl_ctgiohang', 'tbl_ctgiohang.FK_iMaSP = tbl_sanpham.PK_iMaSP')
            ->join('tbl_giohang', 'tbl_giohang.PK_iMaGH = tbl_ctgiohang.FK_iMaGH')
            ->where('tbl_giohang.FK_iMaTK', $idTaiKhoan)
            ->limit(5)
            ->get();
        $dataHeader['productCarts'] = $query->getResultArray();

        //Load layout
        $data['title'] = $title;
        $data['footer'] = view('User/Layout/footer.php');
        $data['header'] = view('User/Layout/header.php', $dataHeader);
        $data['content'] = view($content, $dataLayout);
        return $data;
    }
    protected function getPostDataRow($key)
    {
        return $this->request->getPost($key);
    }
    protected function getPostDataArr()
    {
        return $this->request->getPost();
    }
    
}
