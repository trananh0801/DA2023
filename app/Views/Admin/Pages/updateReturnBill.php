<section class="content-main">
    <?php if (session('errorsMsg')) : ?>
        <?php foreach (session('errorsMsg') as $error) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi: </strong> <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php break; ?>
        <?php endforeach ?>
    <?php endif ?>
    <?php if (session('successMsg')) : ?>
        <?php foreach (session('successMsg') as $success) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thành công: </strong> <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php break; ?>
        <?php endforeach ?>
    <?php endif ?>
    <div class="content-header">
        <h2 class="content-title">Cập nhật phiếu hoàn trả hàng </h2>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="admin/returnBill/updateSave/<?= $returnBills['PK_iMaPhieu'] ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Nhân viên</label>
                                <select class="form-select" name="FK_iMaNV" disabled>
                                    <?php foreach ($staffs as $staff) : ?>
                                        <option value="<?= $staff['PK_iMaNV'] ?>" <?php if ($staff['PK_iMaNV'] == $returnBills['FK_iMaNV']) : ?> selected <?php endif; ?>><?= $staff['sTenNV'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Nhà cung cấp</label>
                                <select class="form-select" name="FK_iMaNCC" disabled>
                                    <?php foreach ($suppliers as $supplier) : ?>
                                        <option value="<?= $supplier['PK_iMaNCC'] ?>" <?php if ($supplier['PK_iMaNCC'] == $returnBills['FK_iMaNCC']) : ?> selected <?php endif; ?>><?= $supplier['sTenNCC'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="dNgayTao" class="form-label">Ngày tạo</label>
                                <input type="date" placeholder="Type here" class="form-control" id="dNgayTao" name="dNgayTao" value="<?= $returnBills['dNgayTao'] ?>" readonly/>
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" rows="4" name="sGhiChu" disabled><?= $returnBills['sGhiChu'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                <?php foreach ($returnBillDetails as $returnBillDetail) : ?>
                                    <tr>
                                        <td><?= $k++ ?></td>
                                        <td>
                                            <select class="form-select" name="FK_iMaSP[]" disabled>
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?= $product['PK_iMaSP'] ?>" <?php if ($product['PK_iMaSP'] == $returnBillDetail['FK_iMaSP']) : ?> selected <?php endif; ?>><?= $product['sTenSP'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" value="<?= $returnBillDetail['iSoLuong'] ?>" readonly/></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        var tong = 0;

        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }

        $(".thanhtien").each(function() {
            var thanhtien = $(this).text();
            console.log(thanhtien);
            var changeThanhtien = thanhtien.replace(/\,/g, "");
            console.log(changeThanhtien);
            tong += parseFloat(changeThanhtien) || 0;
        });
        $('#total-price').html(formatNumber(tong));
    });
</script>