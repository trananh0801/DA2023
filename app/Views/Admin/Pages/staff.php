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
                            <input type="text" class="form-control" name="sMatKhau">
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
                            <?php foreach ($staffs as $staff) : ?>
                                <tr>
                                    <td>1</td>
                                    <td><?= $staff['sTenNV'] ?></td>
                                    <td><b><?= $staff['sSDT'] ?></b></td>
                                    <td><?= $staff['sTenChucVu'] ?></td>
                                    <td><?= $staff['dNgaySinh'] ?></td>
                                    <td><?= $staff['sGioiTinh'] ?></td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-info">Sửa</button>
                                        <button type="button" class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
</section> <!-- content-main end// -->