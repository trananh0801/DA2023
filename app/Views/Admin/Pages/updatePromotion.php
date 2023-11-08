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
        <h2 class="content-title">Cập nhật phiếu nhập kho </h2>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="admin/promotion/updateSave/<?= $promotions['PK_iMaKM'] ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Tên khuyến mãi</label>
                        <input type="text" value="<?= $promotions['sTenKM'] ?>" placeholder="Nhập tên khuyến mãi" class="form-control" id="sTenKM" name="sTenKM">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" name="FK_iMaTrangThai">
                            <option value="7" <?php if ($promotions['FK_iMaTrangThai'] == '7'):?> selected <?php endif; ?>>Đang áp dụng</option>
                            <option value="9" <?php if ($promotions['FK_iMaTrangThai'] == '9'):?> selected <?php endif; ?>>Chưa đến hạn</option>
                            <option value="8" <?php if ($promotions['FK_iMaTrangThai'] == '8'):?> selected <?php endif; ?>>Hết hiệu lực</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Ngày hiệu lực</label>
                        <div>
                            <input type="date" class="form-control" name="dNgayHieuLuc" value="<?= $promotions['dNgayHieuLuc'] ?>">
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                    <div class="mb-4 col-6">
                        <label for="sDVT" class="form-label">Ngày hết hiệu lực</label>
                        <input type="date" class="form-control" id="dNgayHetHieuLuc" name="dNgayHetHieuLuc" value="<?= $promotions['dNgayHetHieuLuc'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-6">
                        <label for="fChietKhau" class="form-label">Chiết khấu (%)</label>
                        <input type="text" class="form-control" id="fChietKhau" name="fChietKhau" value="<?= $promotions['fChietKhau'] ?>" placeholder="VD: 10">
                    </div>
                    <div class="mb-4 col-6">
                        <label for="iSoLuongAD" class="form-label">Số lượng áp dụng</label>
                        <input type="number" class="form-control" id="iSoLuongAD" name="iSoLuongAD" value="<?= $promotions['iSoLuongAD'] ?>" placeholder="VD: 100">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="sGhiChu">Ghi chú</label>
                        <textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"><?= $promotions['sGhiChu'] ?></textarea>
                    </div>

                    <div class="mb-4 col-6">
                        <label for="fChietKhau" class="form-label">Áp dụng</label>
                        <div class="list-group row scrollspy-example" data-bs-spy="scroll" data-bs-offset="0" tabindex="0">
                            <label class="list-group-item" style="background-color: #EEEEEE;">
                                <input class="form-check-input me-1" type="checkbox" value="" id="selectAll" name="iApDungTatCa">
                                Áp dụng tất cả
                            </label>
                            <?php foreach ($products as $product) : ?>
                                <label class="list-group-item">
                                    <input class="form-check-input me-1 products" type="checkbox" value="<?= $product['PK_iMaSP'] ?>" <?php foreach ($promotionDetails as $promotionDetail) : ?> <?php if ($product['PK_iMaSP'] == $promotionDetail['FK_iMaSP']):?> checked <?php endif; ?> <?php endforeach ?> name="FK_iMaSP[]">
                                        <?= $product['sTenSP'] ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div> <!-- card end// -->
</section> <!-- content-main end// -->