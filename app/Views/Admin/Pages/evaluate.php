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
        <h2 class="content-title">Danh sách đánh giá, bình luận</h2>
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
                            <th scope="col">Mã đánh giá</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Điểm</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php foreach ($evaluates as $evaluate) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td><b><?= $evaluate['PK_iDanhGia'] ?></b></td>
                                <td><b><?= $evaluate['sTenKH'] ?></b></td>
                                <td><?= $evaluate['sTenSP'] ?></td>
                                <td><?= $evaluate['fDiem'] ?></td>
                                <td><?= $evaluate['sNoiDung'] ?></td>
                                <td><span class="badge rounded-pill alert-warning"><?= $evaluate['dThoiGian'] ?></span></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".editGroup").click(function() {
            // Thực hiện lấy dữ liệu khi click button
            FK_iMaNV = $(this).attr("data-FK_iMaNV");
            FK_iMaKH = $(this).attr("data-FK_iMaKH");
            FK_iMaTrangThai = $(this).attr("data-FK_iMaTrangThai");
            dThoiGianTao = $(this).attr("data-dThoiGianTao");
            dNgayNhanHang = $(this).attr("data-dNgayNhanHang");
            sGhiChu = $(this).attr("data-sGhiChu");
            PK_iMaDon = $(this).attr("data-PK_iMaDon");
            //    console.log(PK_iMaSP);

            // Hiển thị lên trên form
            $("#manhanvien").val(FK_iMaNV);
            $("#makhachhang").val(FK_iMaKH);
            $("#trangthai").val(FK_iMaTrangThai);
            $("#thoigiantao").val(dThoiGianTao);
            $("#ngaynhanhang").val(dNgayNhanHang);
            $("#ghichu").val(sGhiChu);
            $("#madon").val(PK_iMaDon);
        })
    })

    function myFunction() {
        confirm("Bạn có chắc chắn muốn đơn đăng hàng này?");
    }
</script>