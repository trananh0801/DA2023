<section class="content-main">
    <?php if (session('errorsMsg')) : ?>
        <?php foreach (session('errorsMsg') as $error) : ?>
            <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                <strong>Lỗi: </strong> <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php break; ?>
        <?php endforeach ?>
    <?php endif ?>
    <?php if (session('successMsg')) : ?>
        <?php foreach (session('successMsg') as $success) : ?>
            <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                <strong>Thành công: </strong> <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php break; ?>
        <?php endforeach ?>
    <?php endif ?>
    <div class="content-header">
        <h2 class="content-title">Danh sách khuyến mãi</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới khuyến mãi</button>
        </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Mã khuyến mãi</th>
                            <th scope="col">Tên khuyến mãi</th>
                            <th scope="col">Ngày hiệu lực</th>
                            <th scope="col">Ngày hết hiệu lực</th>
                            <th scope="col">Chiết khấu</th>
                            <th scope="col">Số lượng áp dụng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Tác vụ </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php foreach ($promotions as $promotion) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td><b><?= $promotion['PK_iMaKM'] ?></b></td>
                                <td><b><?= $promotion['sTenKM'] ?></b></td>
                                <td><b><?= date('d/m/Y', strtotime($promotion['dNgayHieuLuc'])) ?></b></td>
                                <td><b><?= date('d/m/Y', strtotime($promotion['dNgayHetHieuLuc'])) ?></b></td>
                                <td><span class="badge rounded-pill alert-success"><?= $promotion['fChietKhau'] ?>%</span></td>
                                <td><span class="badge rounded-pill alert-success"><?= $promotion['iSoLuongAD'] ?></span></td>
                                <td><span class="badge rounded-pill alert-success"><?= $promotion['sTenTrangThai'] ?></span></td>
                                <td class="text-end">
                                    <a href="admin/promotion/update/<?= $promotion['PK_iMaKM'] ?>" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                    <a href="admin/promotion/delete/<?= $promotion['PK_iMaKM'] ?>" class="btn btn-sm btn-danger deleteGroup" value="<?= $promotion['PK_iMaKM'] ?>" name="maNhom" onclick="return myFunction()">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

    <!-- Modal add-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới khuyến mãi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/promotion/create" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Tên khuyến mãi</label>
                                <input type="text" value="" placeholder="Nhập tên khuyến mãi" class="form-control" id="sTenKM" name="sTenKM">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <select class="form-select" name="FK_iMaTrangThai">
                                    <option value="7">Đang áp dụng</option>
                                    <option value="9">Chưa đến hạn</option>
                                    <option value="8">Hết hiệu lực</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Ngày hiệu lực</label>
                                <div>
                                    <input type="date" class="form-control" name="dNgayHieuLuc" value="0">
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                            <div class="mb-4 col-6">
                                <label for="sDVT" class="form-label">Ngày hết hiệu lực</label>
                                <input type="date" class="form-control" id="dNgayHetHieuLuc" name="dNgayHetHieuLuc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="fChietKhau" class="form-label">Chiết khấu (%)</label>
                                <input type="text" class="form-control" id="fChietKhau" name="fChietKhau" value="0" placeholder="VD: 10">
                            </div>
                            <div class="mb-4 col-6">
                                <label for="iSoLuongAD" class="form-label">Số lượng áp dụng</label>
                                <input type="number" class="form-control" id="iSoLuongAD" name="iSoLuongAD" value="0" placeholder="VD: 100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="sGhiChu">Ghi chú</label>
                                <textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"></textarea>
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
                                            <input class="form-check-input me-1 products" type="checkbox" value="<?= $product['PK_iMaSP'] ?>" name="FK_iMaSP[]">
                                            <?= $product['sTenSP'] ?>
                                        </label>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm khuyễn mãi</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);
    function myFunction() {
		return confirm("Bạn có chắc chắn muốn xóa khuyến mãi này!");
	}
    $(document).ready(function() {
        // Gán sự kiện khi click vào checkbox "Chọn tất cả"
        $('#selectAll').click(function() {
            // Kiểm tra trạng thái của checkbox "Chọn tất cả"
            var isChecked = $(this).prop('checked');

            // Đặt trạng thái của tất cả checkbox khác giống với checkbox "Chọn tất cả"
            $('.products').prop('checked', isChecked);
        });
    });
</script>