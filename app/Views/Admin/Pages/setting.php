<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Thông tin cá nhân</h2>
    </div>
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
    <div class="card">
        <div class="card-body">
            <div class="row gx-5">
                <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link active" aria-current="page" href="#">Thông tin cơ bản</a>
                    </nav>
                </aside>
                <div class="col-lg-9">
                    <section class="content-body p-xl-4">
                        <form action="admin/setting/update" method="POST">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row gx-3">
                                        <div class="col-6  mb-3">
                                            <label class="form-label">Mã nhân viên</label>
                                            <input class="form-control" type="text" placeholder="Nhập mã nhân viên" disabled value="<?= $settings['PK_iMaNV'] ?>" >
                                            <input value="<?= $settings['PK_iMaNV'] ?>" name="PK_iMaNV" hidden>
                                        </div> <!-- col .// -->
                                        <div class="col-6  mb-3">
                                            <label class="form-label">Tên nhân viên</label>
                                            <input class="form-control" type="text" placeholder="Nhập tên nhân viên" value="<?= $settings['sTenNV'] ?>" name="sTenNV">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input class="form-control" type="text" placeholder="example@mail.com" value="<?= $settings['sSDT'] ?>" name="sSDT">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">CMND</label>
                                            <input class="form-control" type="tel" placeholder="+1234567890" value="<?= $settings['sCMND'] ?>" name="sCMND">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3">
                                            <label for="sTenChucVu" class="form-label">Chức vụ</label>
                                            <select class="form-select" name="sTenChucVu" id="chucvu" disabled>
                                                <?php if ($settings['sTenChucVu'] == '1') : ?><option value="1">Quản lý cửa hàng</option> <?php endif ?>
                                                <?php if ($settings['sTenChucVu'] == '2') : ?><option value="2">Nhân viên quản lý kho</option><?php endif ?>
                                                <?php if ($settings['sTenChucVu'] == '3') : ?><option value="3">Nhân viên bán hàng</option><?php endif ?>
                                            </select>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Ngày sinh</label>
                                            <input class="form-control" type="date" value="<?= $settings['dNgaySinh'] ?>" name="dNgaySinh">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Giới tính</label>
                                            <select class="form-select" name="sGioiTinh" id="gioitinh">
                                                <?php if ($settings['sGioiTinh'] == 'Nam') : ?><option value="Nam">Nam</option><?php endif ?>
                                                <?php if ($settings['sGioiTinh'] == 'Nữ') : ?><option value="Nữ">Nữ</option><?php endif ?>
                                            </select>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3 form-group">
                                            <label for="exampleFormControlTextarea1">Mô tả</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sGhiChu"><?= $settings['sGhiChu'] ?></textarea>
                                        </div>
                                    </div> <!-- row.// -->
                                </div> <!-- col.// -->
                                <aside class="col-lg-4">
                                    <figure class="text-lg-center">
                                        <img class="img-lg mb-3 img-avatar" src="assets/Admin/images/people/avatar1.jpg" alt="User Photo">
                                        <figcaption>
                                            <a class="btn btn-outline-primary" href="#">
                                                <i class="icons material-icons md-backup"></i> Tải ảnh
                                            </a>
                                        </figcaption>
                                    </figure>
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                            <br>
                            <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                        </form>
                        <hr class="my-5">
                        <!-- <div class="row" style="max-width:920px">
                            <div class="col-md">
                                <article class="box mb-3 bg-light">
                                    <a class="btn float-end btn-light btn-sm" href="#">Thay đổi</a>
                                    <h6>Mật khẩu</h6>
                                    <small class="text-muted d-block" style="width:70%">Click vào đây để reset mật khẩu của bạn</small>
                                </article>
                            </div> 
                        </div>  -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);
</script>