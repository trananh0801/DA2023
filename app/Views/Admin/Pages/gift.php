<style>
    .td_img {
        width: 100px;
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .td_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
    }
</style>
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
        <h2 class="content-title">Danh mục quà tặng</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới quà tặng</button>
        </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Tìm kiếm..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Trạng thái</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Hiển thị 20</option>
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
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Mã quà</th>
                            <th scope="col">Tên quà</th>
                            <th scope="col">Điểm quy đổi</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" class="text-end"> Tác vụ </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/1.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q001</b></td>
                            <td>Gấu nâu lông mềm</td>
                            <td><span class="badge rounded-pill alert-warning">8 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">200</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/2.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q002</b></td>
                            <td>Gấu hồng</td>
                            <td><span class="badge rounded-pill alert-warning">6 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">150</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/3.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q003</b></td>
                            <td>Xe đẩy</td>
                            <td><span class="badge rounded-pill alert-warning">8 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">50</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/4.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q004</b></td>
                            <td>Xe đẩy xanh lam</td>
                            <td><span class="badge rounded-pill alert-warning">8 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">50</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/5.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q005</b></td>
                            <td>Bình sữa 200ml</td>
                            <td><span class="badge rounded-pill alert-warning">5 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">300</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                <div class="td_img">
                                    <img src="assets/user/images/gift/6.jpg" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b>Q006</b></td>
                            <td>Bình sữa nhỏ</td>
                            <td><span class="badge rounded-pill alert-warning">4 điểm</span></td>
                            <td><span class="badge rounded-pill alert-success">400</span></td>
                            <td></td>
                            <td class="text-end">
                                <a href="admin/product/update/" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                <a href="admin/product/delete/" class="btn btn-sm btn-danger deleteGroup" value="" name="maNhom" onclick="return myFunction()">Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

    <!-- Modal thêm mới -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới quà tặng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/product/create" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label for="sTenSP" class="form-label">Tên quà</label>
                                <input type="text" value="<?= old('sTenSP') ?>" placeholder="Nhập tên sản phẩm" class="form-control" id="sTenSP" name="sTenSP">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Ảnh sản phẩm</label>
                                <input class="form-control" type="file" name="sHinhAnh">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Điểm quy đổi</label>
                                <div>
                                    <input type="number" class="form-control" placeholder="VD: 8" name="fSoLuong" value="0">
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                            <div class="mb-4 col-6">
                                <label for="sDVT" class="form-label">Số lượng</label>
                                <input type="number" placeholder="VD: 100" class="form-control" id="sDVT" name="sDVT" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="sGhiChu">Mô tả</label>
                                <textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm quà tặng</button>
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
</script>