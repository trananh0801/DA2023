<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\InvoiceService;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceController extends BaseController
{
    /**
     * @var service;
     */
    private $service;
    public function __construct()
    {
        $this->service = new InvoiceService();
    }

    public function pdf_invoice($id)
    {
        // Create an instance of Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);


        $dompdf = new Dompdf($options);

        // Your PDF content
        $data = [];
        $data['orders'] = $this->service->getAllOrderById($id);
        $data['orderDetails'] = $this->service->getAllOrderDetailById($id);
        $data['tongtien'] = $this->service->tongtien($id);
        // dd($data['tongtien']);
        $data['staffs'] = $this->service->getAllStaff();
        $data['statuss'] = $this->service->getAllStatus();
        $data['products'] = $this->service->getAllProduct();
        $data['customers'] = $this->service->getAllCustomer();

        $pdfContent = view('Admin/Pages/invoice', $data);

        // Load HTML content to Dompdf
        $dompdf->loadHtml($pdfContent, 'UTF-8');

        // Set paper size (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first step)
        $dompdf->render();

        // Output PDF (second step)
        $dompdf->stream('example.pdf', array('Attachment' => 0));
    }
}
