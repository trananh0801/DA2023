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
        <h2 class="content-title">Danh sách nhân viên</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form action="admin/staff/create" method="POST">
                        <div class="mb-4">
                            <label for="sTenNV" class="form-label">Tên nhân viên</label>
                            <input type="text" placeholder="Nhập tên khách hàng" class="form-control" id="sTenNV" name="sTenNV" />
                        </div>
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="sSDT" class="form-label">Số điện thoại</label>
                                <input type="text" placeholder="Số điện thoại" class="form-control" id="sSDT" name="sSDT" />
                            </div>
                            <div class="mb-4 col-6">
                                <label for="dNgaySinh" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="dNgaySinh" name="dNgaySinh" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Giới tính</label>
                                <select class="form-select" name="sGioiTinh">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Số CMND</label>
                                <div>
                                    <input type="number" class="form-control" name="sCMND">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="sTenChucVu" class="form-label">Chức vụ</label>
                            <select class="form-select" name="sTenChucVu">
                                <option value="1">Quản lý cửa hàng</option>
                                <option value="2">Nhân viên quản lý kho</option>
                                <option value="3">Nhân viên bán hàng</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Ghi chú</label>
                            <textarea class="form-control" rows="4" name="sGhiChu"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="sTenTK">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="sMatKhau">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Số điện thoại</th>
                                <th>Chức vụ</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th class="text-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $k = 1 ?>
                            <?php if (empty($staffs)) : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có dữ liệu</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($staffs as $staff) : ?>
                                    <tr>
                                        <td><?= $k++ ?></td>
                                        <td><?= $staff['sTenNV'] ?></td>
                                        <td><b><?= $staff['sSDT'] ?></b></td>
                                        <td><?= $staff['sTenChucVu'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($staff['dNgaySinh'])) ?></td>
                                        <td><?= $staff['sGioiTinh'] ?></td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-warning editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-sTenNV="<?= $staff['sTenNV'] ?>" data-sSDT="<?= $staff['sSDT'] ?>" data-sCMND="<?= $staff['sCMND'] ?>" data-sTenChucVu="<?= $staff['sTenChucVu'] ?>" data-dNgaySinh="<?= $staff['dNgaySinh'] ?>" data-sGioiTinh="<?= $staff['sGioiTinh'] ?>" data-sGhiChu="<?= $staff['sGhiChu'] ?>" data-sTenTK="<?= $staff['sTenTK'] ?>" data-sMatKhau="<?= $staff['sMatKhau'] ?>" data-FK_iMaTK="<?= $staff['FK_iMaTK'] ?>" value="<?= $staff['PK_iMaNV'] ?>">Sửa</button>
                                            <a href="admin/staff/delete/<?= $staff['PK_iMaNV'] ?>" class="btn btn-sm btn-danger deleteGroup" value="<?= $staff['PK_iMaNV'] ?>" name="maNhom" onclick="return myFunction()">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>

                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
</section> <!-- content-main end// -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="admin/staff/update" method="POST" id="formGroupId">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4 col-12">
                                <label for="sTenNV" class="form-label">Tên nhân viên</label>
                                <input type="text" placeholder="Nhập tên nhân viên" class="form-control" id="tennv" name="sTenNV" />
                                <input type="text" value="<?= old('PK_iMaNV') ?>" class="form-control" id="manv" name="PK_iMaNV" hidden>
                                <input type="text" value="<?= old('FK_iMaTK') ?>" class="form-control" id="matk" name="FK_iMaTK" hidden>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-6">
                                    <label for="sSDT" class="form-label">Số điện thoại</label>
                                    <input type="text" placeholder="Số điện thoại" class="form-control" id="sdt" name="sSDT" />
                                </div>
                                <div class="mb-4 col-6">
                                    <label for="dNgaySinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="ngaysinh" name="dNgaySinh" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Giới tính</label>
                                    <select class="form-select" name="sGioiTinh" id="gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Số CMND</label>
                                    <div>
                                        <input type="number" class="form-control" name="sCMND" id="cccd">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="sTenChucVu" class="form-label">Chức vụ</label>
                                <select class="form-select" name="sTenChucVu" id="chucvu">
                                    <option value="1">Quản lý cửa hàng</option>
                                    <option value="2">Nhân viên quản lý kho</option>
                                    <option value="3">Nhân viên bán hàng</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" rows="4" name="sGhiChu" id="ghichu"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-4 col-12">
                                <label class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="sTenTK" id="tendangnhap">
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="sMatKhau" id="matkhau">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);
    $(document).ready(function() {
        $(".editGroup").click(function() {
            // Thực hiện lấy dữ liệu khi click button
            sTenNV = $(this).attr("data-sTenNV");
            sSDT = $(this).attr("data-sSDT");
            sCMND = $(this).attr("data-sCMND");
            sTenChucVu = $(this).attr("data-sTenChucVu");
            dNgaySinh = $(this).attr("data-dNgaySinh");
            sGioiTinh = $(this).attr("data-sGioiTinh");
            sGhiChu = $(this).attr("data-sGhiChu");
            sTenTK = $(this).attr("data-sTenTK");
            sMatKhau = $(this).attr("data-sMatKhau");
            FK_iMaTK = $(this).attr("data-FK_iMaTK");
            PK_iMaNV = $(this).val();

            // Hiển thị lên trên form
            $("#tennv").val(sTenNV);
            $("#sdt").val(sSDT);
            $("#cccd").val(sCMND);
            $("#chucvu").val(sTenChucVu);
            $("#ngaysinh").val(dNgaySinh);
            $("#gioitinh").val(sGioiTinh);
            $("#ghichu").val(sGhiChu);
            $("#tendangnhap").val(sTenTK);
            $("#matkhau").val(sMatKhau);
            $("#matk").val(FK_iMaTK);
            $("#manv").val(PK_iMaNV);
            // console.log(FK_iMaTK);
        })
    })

    function myFunction() {
        return confirm("Bạn có chắc chắn muốn xóa nhân viên này!");
    }
</script>