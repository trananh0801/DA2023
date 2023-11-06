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
        <h2 class="content-title">Danh sách phiếu hoàn trả hàng</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới phiếu</button>
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
                            <th scope="col">Mã phiếu</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Nhà cung cấp</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($returnBills as $returnBill) : ?>
                            <tr>
                                <td>1</td>
                                <td><b><?= $returnBill['PK_iMaPhieu'] ?></b></td>
                                <td><b><?= $returnBill['sTenNV'] ?></b></td>
                                <td><?= $returnBill['sTenNCC'] ?></td>
                                <td><?= date('d/m/Y', strtotime($returnBill['dNgayTao']))?></td>
                                <?php if ($returnBill['FK_iMaTrangThai'] == '5') : ?>
                                    <td><span class="badge rounded-pill alert-warning"><?= $returnBill['sTenTrangThai'] ?></span></td>
                                <?php else : ?>
                                    <td><span class="badge rounded-pill alert-secondary"><?= $returnBill['sTenTrangThai'] ?></span></td>
                                <?php endif; ?>
                                <td class="text-end">
                                    <a href="admin/returntBill/update" class="btn btn-sm btn-warning editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo" data-FK_iMaNV="<?= $returnBill['FK_iMaNV'] ?>" data-FK_iMaNCC="<?= $returnBill['FK_iMaNCC'] ?>" data-dNgayTao="<?= $returnBill['dNgayTao'] ?>"  data-sGhiChu="<?= $returnBill['sGhiChu'] ?>" data-FK_iMaTrangThai="<?= $returnBill['FK_iMaTrangThai'] ?>" data-PK_iMaPhieu="<?= $returnBill['PK_iMaPhieu'] ?>">Sửa</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu hoàn trả</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/returnBill/create" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhân viên</label>
                                        <select class="form-select" name="FK_iMaNV">
                                            <?php foreach ($staffs as $staff) : ?>
                                                <option value="<?= $staff['PK_iMaNV'] ?>"><?= $staff['sTenNV'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhà cung cấp</label>
                                        <select class="form-select" name="FK_iMaNCC">
                                            <?php foreach ($suppliers as $supplier) : ?>
                                                <option value="<?= $supplier['PK_iMaNCC'] ?>"><?= $supplier['sTenNCC'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayTao" class="form-label">Ngày tạo</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="dNgayTao" name="dNgayTao" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="FK_iMaTrangThai">
                                            <option value="5">Đã hoàn trả</option>
                                            <option value="6">Chờ hoàn trả</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label">Ghi chú</label>
                                        <textarea class="form-control" rows="4" name="sGhiChu"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col" class="text-end"> Thao tác </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select class="form-select" name="FK_iMaSP[]">
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>"><?= $product['sTenSP'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" /></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowButton">Thêm một dòng</button>
                            </div>
                            <div class="col-12">
                                <article class="float-end">
                                    <dl class="dlist">
                                        <dt>Tổng:</dt>
                                        <dd>$973.35</dd>
                                    </dl>
                                    <dl class="dlist">
                                        <dt>Khuyến mãi:</dt>
                                        <dd>$10.00</dd>
                                    </dl>
                                    <dl class="dlist">
                                        <dt>Tổng tiền:</dt>
                                        <dd> <b class="h5">$983.00</b> </dd>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm phiếu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu hoàn trả</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/returnBill/update" method="POST">
                    <input type="text" name="PK_iMaPhieu" id="maphieu" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhân viên</label>
                                        <select class="form-select" name="FK_iMaNV" id="nhanvien" disabled>
                                            <?php foreach ($staffs as $staff) : ?>
                                                <option value="<?= $staff['PK_iMaNV'] ?>"><?= $staff['sTenNV'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhà cung cấp</label>
                                        <select class="form-select" name="FK_iMaNCC" id="ncc" disabled>
                                            <?php foreach ($suppliers as $supplier) : ?>
                                                <option value="<?= $supplier['PK_iMaNCC'] ?>"><?= $supplier['sTenNCC'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayTao" class="form-label">Ngày tạo</label>
                                        <input type="date" class="form-control" id="ngaytao" name="dNgayTao" disabled/>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="FK_iMaTrangThai" id="trangthai">
                                            <option value="5">Đã hoàn trả</option>
                                            <option value="6">Chờ hoàn trả</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label">Ghi chú</label>
                                        <textarea class="form-control" rows="4" name="sGhiChu" id="ghichu" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select class="form-select" name="FK_iMaSP[]" disabled>
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>"><?= $product['sTenSP'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" disabled/></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowButton">Thêm một dòng</button>
                            </div>
                            <div class="col-12">
                                <article class="float-end">
                                    <dl class="dlist">
                                        <dt>Tổng:</dt>
                                        <dd>$973.35</dd>
                                    </dl>
                                    <dl class="dlist">
                                        <dt>Khuyến mãi:</dt>
                                        <dd>$10.00</dd>
                                    </dl>
                                    <dl class="dlist">
                                        <dt>Tổng tiền:</dt>
                                        <dd> <b class="h5">$983.00</b> </dd>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Cập nhật phiếu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    // Tìm và lưu tham chiếu đến nút "Thêm Dòng" và bảng
    var addRowButton = document.getElementById("addRowButton");
    var table = document.getElementById("myTable");
    var rowCount = 1; // Biến để theo dõi số dòng đã thêm

    // Thêm sự kiện click cho nút "Thêm Dòng"
    addRowButton.addEventListener("click", function() {
        // Tạo một hàng mới (dòng)
        var newRow = table.insertRow();

        // Tạo các ô (cột) trong hàng mới
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);

        // Cài đặt nội dung cho các ô
        cell1.innerHTML = rowCount;
        cell2.innerHTML = "<td><select class='form-select' name='FK_iMaSP[]'><?php foreach ($products as $product) : ?><option value='<?= $product['PK_iMaSP'] ?>'><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>";
        cell3.innerHTML = "<td><input type='number' placeholder='VD: 10' class='form-control' id='iSoLuong' name='iSoLuong[]' /></td>";
        cell4.innerHTML = "<td class='text-end'><button type='button' class='btn btn-danger deleteRowButton'>X</button></td>";

        // Tăng biến rowCount để theo dõi số dòng đã thêm
        rowCount++;

        // Thêm sự kiện click cho nút xóa trong hàng mới
        var deleteButton = newRow.querySelector(".deleteRowButton");
        deleteButton.addEventListener("click", function() {
            // Lấy hàng (dòng) chứa nút xóa và xóa nó
            var row = this.closest("tr");
            row.parentNode.removeChild(row);
        }); 
    });
    $(document).ready(function() {
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().substr(0, 10);
        $("#dNgayTao").val(formattedDate);
    })


    $(document).ready(function() {
        $(".editGroup").click(function() {
            // Thực hiện lấy dữ liệu khi click button
            FK_iMaNV = $(this).attr("data-FK_iMaNV");
            FK_iMaNCC = $(this).attr("data-FK_iMaNCC");
            FK_iMaTrangThai = $(this).attr("data-FK_iMaTrangThai");
            dNgayTao = $(this).attr("data-dNgayTao");
            sGhiChu = $(this).attr("data-sGhiChu");
            PK_iMaPhieu = $(this).attr("data-PK_iMaPhieu");
            console.log(dNgayTao);

            // Hiển thị lên trên form
            $("#nhanvien").val(FK_iMaNV);
            $("#ncc").val(FK_iMaNCC);
            $("#trangthai").val(FK_iMaTrangThai);
            $("#ngaytao").val(dNgayTao);
            $("#ghichu").val(sGhiChu);
            $("#maphieu").val(PK_iMaPhieu);
        })
    })
</script>