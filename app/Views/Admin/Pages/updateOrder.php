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
        <h2 class="content-title">Cập nhật đơn đặt hàng </h2>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="admin/order/updateSave/<?= $orders['PK_iMaDon'] ?>" method="POST">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Nhân viên</label>
                                <select class="form-select" name="FK_iMaNV" disabled>
                                    <?php foreach ($staffs as $staff) : ?>
                                        <option value="<?= $staff['PK_iMaNV'] ?>" <?php if ($staff['PK_iMaNV'] == $orders['FK_iMaNV']) : ?> selected <?php endif; ?>><?= $staff['sTenNV'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Khách hàng</label>
                                <select class="form-select" name="FK_iMaKH" id="selectOption" disabled>
                                    <?php foreach ($customers as $customer) : ?>
                                        <option value="<?= $customer['PK_iMaKH'] ?>" <?php if ($customer['PK_iMaKH'] == $orders['FK_iMaKH']) : ?> selected <?php endif; ?>><?= $customer['sTenKH'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="dThoiGianTao" class="form-label">Thời gian tạo</label>
                                <input type="date" placeholder="Type here" class="form-control" id="dThoiGianTao" name="dThoiGianTao" value="<?= $orders['dThoiGianTao'] ?>" readonly />
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <select class="form-select" name="FK_iMaTrangThai">
                                    <option value="3" <?php if ($orders['FK_iMaTrangThai'] == '3') : ?> selected <?php endif; ?>>Đã thanh toán</option>
                                    <option value="4" <?php if ($orders['FK_iMaTrangThai'] == '4') : ?> selected <?php endif; ?>>Chờ thanh toán</option>
                                    <option value="5" <?php if ($orders['FK_iMaTrangThai'] == '5') : ?> selected <?php endif; ?>>Đã hoàn trả</option>
                                </select>
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" rows="4" name="sGhiChu" disabled><?= $orders['sGhiChu'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Chiết khấu</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                <?php foreach ($orderDetails as $orderDetail) : ?>
                                    <tr>
                                        <td><?= $k++ ?></td>
                                        <td>
                                            <select class="form-select selectProduct" name="FK_iMaSP[]" id="selectProduct" disabled>
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?= $product['PK_iMaSP'] ?>" <?php if ($product['PK_iMaSP'] == $orderDetail['FK_iMaSP']) : ?> selected <?php endif; ?>><?= $orderDetail['sTenSP'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td><?= $orderDetail['fGiaBanLe'] ?></td>
                                        <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" value="<?= $orderDetail['iSoLuong'] ?>" readonly /></td>
                                        <td><?= $orderDetail['fChietKhau'] ?>%</td>
                                        <td>10</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <article class="float-end">
                            <dl class="dlist">
                                <dt>Tổng tiền:</dt>
                                <dd> <b class="h5 tongtien"></b> </dd>
                            </dl>
                            <dl class="dlist">
                                <dt class="text-muted">Trạng thái:</dt>
                                <dd>
                                    <span class="badge rounded-pill alert-success text-success">Mua tại cửa hàng</span>
                                </dd>
                            </dl>
                        </article>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật hóa đơn</button>
                </div>
            </form>
        </div>
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
<script>
    $(document).ready(function() {

    });
</script>