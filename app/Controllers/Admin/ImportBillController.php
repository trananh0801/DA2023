<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ImportBillService;

class ImportBillController extends BaseController
{
    /**
     * @var service;
     */
    private $service; 
    public function __construct()
    {
        $this->service = new ImportBillService();
    }

    public function list()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/');
        }
        $data = [];
        $dataLayout['staffs'] = $this->service->getAllStaff();
        $dataLayout['statuss'] = $this->service->getAllStatus();
        $dataLayout['products'] = $this->service->getAllProduct();
        $dataLayout['suppliers'] = $this->service->getAllSupplier();

        $s1 = $this->service->getAllImportBill();
        $s2 = $this->service->getAllImportBillDetail();

        $mergedData = [];

        foreach ($s1 as $pn) {
            $mergedData[] = [
                'PK_iPN' => $pn['PK_iPN'],
                'FK_iMaNV' => $pn['FK_iMaNV'],
                'FK_iMaNCC' => $pn['FK_iMaNCC'],
                'sTenNV' => $pn['sTenNV'],
                'sTenNCC' => $pn['sTenNCC'],
                'FK_iMaTrangThai' => $pn['FK_iMaTrangThai'],
                'sTenTrangThai' => $pn['sTenTrangThai'],
                'sNguoiGiao' => $pn['sNguoiGiao'],
                'fTienDaTra' => $pn['fTienDaTra'],
                'dNgayNhap' => $pn['dNgayNhap'],
                'sGhiChu' => $pn['sGhiChu'],
            ];
        }

        foreach ($s2 as $chiTiet) {
            foreach ($mergedData as &$km) {
                if ($chiTiet['FK_iMaPN'] == $km['PK_iPN']) {
                    $km['ChiTietPhieuNhap'][] = [
                        'sTenSP' => $chiTiet['sTenSP'],
                        'iSoluong' => $chiTiet['iSoluong'],
                    ];
                }
            }
        }

        $dataLayout['importBills'] = $mergedData;
        // dd($dataLayout['importBills']);
        // dd($dataLayout['products']);
        $data = $this->loadMasterLayout($data, 'Danh sách phiếu nhập hàng', 'Admin/Pages/importBill', $dataLayout);
        return view('Admin/main', $data);
    }

    public function create()
    {
        $result = $this->service->addImportBillInfo($this->request);
        return redirect()->to('admin/importBill/list')->withInput()->with($result['massageCode'], $result['message']);
    }

    public function update()
    {
        $result = $this->service->updateImportBillInfo($this->request);
        return redirect()->back()->withInput()->with($result['massageCode'], $result['message']);
    }


    public function delete($id)
    {
        $idPG = $this->service->getImportBillById($id);
        if(!$idPG){
            return redirect('error/404');
        }
        $result = $this->service->deleteImportBillInfo($id);
        return redirect('admin/importBill/list')->with($result['massageCode'], $result['message']);
    }
}
