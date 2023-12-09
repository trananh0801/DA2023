<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Services\CheckoutService;

class Checkout1ProdController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new CheckoutService();
    }

    public function list($id)
    {
        $session = session();
        $userID = $session->get('matk');

        $data = [];
        $dataLayout['products'] = $this->service->get1Product($id);
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayoutUser($data, 'Đặt hàng', 'User/Pages/checkout1Prod', $dataLayout);
        return view('User/main', $data);
    }

    public function process_form()
    {
        $submitAction = $this->request->getPost('singlebutton');
        if ($submitAction === 'ttnhanhang') {
            $result = $this->service->addOrderInfo($this->request);
            if ($result['status'] == 'ERR') {
                return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
            } else {
                return redirect()->to('user/thankyou')->withInput()->with($result['massageCode'], $result['message']);
            }
        } else {
            $result = $this->service->addOrderInfoOnePay($this->request);
            $SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120DB";

            $vpcURL = 'https://mtf.onepay.vn/onecomm-pay/vpc.op' . "?";

            $Title = 'VPC 3-Party';
            $vpc_Merchant = 'TESTONEPAY';
            $vpc_AccessCode = '6BEB2546';
            $vpc_MerchTxnRef = time();
            $vpc_OrderInfo = 'JSECURETEST01';
            $vpc_Amount = $_POST['tongtien_onepay'] * 100;
            $vpc_ReturnURL = 'http://localhost:8080/user/thankyou';
            $vpc_Version = '2';
            $vpc_Command = 'pay';
            $vpc_Locale = 'vn';
            $vpc_TicketNo = $_SERVER['REMOTE_ADDR'];
            $data = array(
                'Title' => $Title,
                'vpc_Merchant' => $vpc_Merchant,
                'vpc_AccessCode' => $vpc_AccessCode,
                'vpc_MerchTxnRef' => $vpc_MerchTxnRef,
                'vpc_OrderInfo' => $vpc_OrderInfo,
                'vpc_Amount' => $vpc_Amount,
                'vpc_ReturnURL' => $vpc_ReturnURL,
                'vpc_Version' => $vpc_Version,
                'vpc_Command' => $vpc_Command,
                'vpc_Locale' => $vpc_Locale,
                'vpc_TicketNo' => $vpc_TicketNo,
            );
            $data['AgainLink'] = urlencode($_SERVER['HTTP_REFERER']);
            $md5HashData = "";

            //$stringHashData = $SECURE_SECRET; *****************************Khởi tạo chuỗi dữ liệu mã hóa trống*****************************
            $stringHashData = "";
            // sắp xếp dữ liệu theo thứ tự a-z trước khi nối lại
            // arrange array data a-z before make a hash
            ksort($data);

            // set a parameter to show the first pair in the URL
            // đặt tham số đếm = 0
            $appendAmp = 0;

            foreach ($data as $key => $value) {

                // create the md5 input and URL leaving out any fields that have no value
                // tạo chuỗi đầu dữ liệu những tham số có dữ liệu
                if (strlen($value) > 0) {
                    // this ensures the first paramter of the URL is preceded by the '?' char
                    if ($appendAmp == 0) {
                        $vpcURL .= urlencode($key) . '=' . urlencode($value);
                        $appendAmp = 1;
                    } else {
                        $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                    }
                    //$stringHashData .= $value; *****************************sử dụng cả tên và giá trị tham số để mã hóa*****************************
                    if ((strlen($value) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                        $stringHashData .= $key . "=" . $value . "&";
                    }
                }
            }
            //*****************************xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa*****************************
            $stringHashData = rtrim($stringHashData, "&");
            // Create the secure hash and append it to the Virtual Payment Client Data if
            // the merchant secret has been provided.
            // thêm giá trị chuỗi mã hóa dữ liệu được tạo ra ở trên vào cuối url
            if (strlen($SECURE_SECRET) > 0) {
                //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($stringHashData));
                // *****************************Thay hàm mã hóa dữ liệu*****************************
                $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*', $SECURE_SECRET)));
            }

            // FINISH TRANSACTION - Redirect the customers using the Digital Order
            // ===================================================================
            // chuyển trình duyệt sang cổng thanh toán theo URL được tạo ra
            // header("Location: " . $vpcURL);
            return redirect()->to($vpcURL);

            // *******************
            // END OF MAIN PROGRAM
            // *******************
        }
    }
}
