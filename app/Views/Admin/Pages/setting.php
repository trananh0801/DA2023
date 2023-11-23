<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Thông tin cá nhân</h2>
    </div>

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
                        <form>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row gx-3">
                                        <div class="col-6  mb-3">
                                            <label class="form-label">Mã nhân viên</label>
                                            <input class="form-control" type="text" placeholder="Nhập mã nhân viên" disabled>
                                        </div> <!-- col .// -->
                                        <div class="col-6  mb-3">
                                            <label class="form-label">Tên nhân viên</label>
                                            <input class="form-control" type="text" placeholder="Nhập tên nhân viên">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input class="form-control" type="email" placeholder="example@mail.com">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">CMND</label>
                                            <input class="form-control" type="tel" placeholder="+1234567890">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3">
                                            <label for="sTenChucVu" class="form-label">Chức vụ</label>
                                            <select class="form-select" name="sTenChucVu" id="chucvu" disabled>
                                                <option value="1">Quản lý cửa hàng</option>
                                                <option value="2">Nhân viên quản lý kho</option>
                                                <option value="3">Nhân viên bán hàng</option>
                                            </select>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Ngày sinh</label>
                                            <input class="form-control" type="date">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Giới tính</label>
                                            <select class="form-select" name="sGioiTinh" id="gioitinh">
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3 form-group">
                                            <label for="exampleFormControlTextarea1">Mô tả</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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

                        <div class="row" style="max-width:920px">
                            <div class="col-md">
                                <article class="box mb-3 bg-light">
                                    <a class="btn float-end btn-light btn-sm" href="#">Thay đổi</a>
                                    <h6>Mật khẩu</h6>
                                    <small class="text-muted d-block" style="width:70%">Click vào đây để reset mật khẩu của bạn</small>
                                </article>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                    </section> <!-- content-body .// -->

                </div> <!-- col.// -->
            </div> <!-- row.// -->

        </div> <!-- card body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->