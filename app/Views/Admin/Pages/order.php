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
        <h2 class="content-title">Danh sách đơn đặt hàng</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới đơn</button>
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
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Khách hàng</th>
                            <!-- <th scope="col">Địa chỉ</th> -->
                            <th scope="col">Ngày nhận hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td>1</td>
                                <td><b><?= $order['PK_iMaDon'] ?></b></td>
                                <td><b><?= $order['sTenNV'] ?></b></td>
                                <td><?= $order['FK_iMaKH'] ?></td>
                                <td><?= $order['dThoiGianTao'] ?></td>
                                <td><?= $order['dNgayNhanHang'] ?></td>
                                <?php if ($order['FK_iMaTrangThai'] == '4') : ?>
                                    <td><span class="badge rounded-pill alert-warning"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php else : ?>
                                    <td><span class="badge rounded-pill alert-success"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php endif; ?>
                                <td class="text-end">
									<a href="#" class="btn btn-light">Chi tiết</a>
									<div class="dropdown">
										<a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
										<div class="dropdown-menu">
											<a href="admin/order/edit/<?= $order['PK_iMaDon'] ?>" class="btn btn-primary dropdown-item editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo" data-FK_iMaNV="<?= $order['FK_iMaNV'] ?>" data-FK_iMaKH="<?= $order['FK_iMaKH'] ?>" data-FK_iMaTrangThai="<?= $order['FK_iMaTrangThai'] ?>" data-dThoiGianTao="<?= $order['dThoiGianTao'] ?>" data-dNgayNhanHang="<?= $order['dNgayNhanHang'] ?>" data-sGhiChu="<?= $order['sGhiChu'] ?>" data-PK_iMaDon="<?= $order['PK_iMaDon'] ?>">Sửa</a>
											<a href="admin/order/delete/<?= $order['PK_iMaDon'] ?>" class="btn btn-danger dropdown-item deleteGroup text-danger" value="<?= $order['PK_iMaDon'] ?>" name="madon" onclick="myFunction()">Xóa</a>
										</div>
									</div> <!-- dropdown //end -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới đơn đặt hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/order/create" method="POST">
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
                                        <label class="form-label">Khách hàng</label>
                                        <input type="text" placeholder="Tên khách hàng" class="form-control" id="FK_iMaKH" name="FK_iMaKH" />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dThoiGianTao" class="form-label">Thời gian tạo</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="dThoiGianTao" name="dThoiGianTao" />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayNhanHang" class="form-label">Ngày nhận hàng</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="dNgayNhanHang" name="dNgayNhanHang" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="FK_iMaTrangThai">
                                            <option value="3">Đã thanh toán</option>
                                            <option value="4">Chờ thanh toán</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label">Ghi chú</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" name="sGhiChu"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Số lượng</th>
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
                                            <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" /></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-danger deleteRowButton">X</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowButton">Thêm một dòng</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm đơn</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật đơn đặt hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/order/update" method="POST">
                        <input type="text" name="PK_iMaDon" id="madon" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhân viên</label>
                                        <select class="form-select" name="FK_iMaNV" id="manhanvien">
                                            <?php foreach ($staffs as $staff) : ?>
                                                <option value="<?= $staff['PK_iMaNV'] ?>"><?= $staff['sTenNV'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Khách hàng</label>
                                        <input type="text" placeholder="Tên khách hàng" class="form-control" id="makhachhang" name="FK_iMaKH" />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dThoiGianTao" class="form-label">Thời gian tạo</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="thoigiantao" name="dThoiGianTao" />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayNhanHang" class="form-label">Ngày nhận hàng</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="ngaynhanhang" name="dNgayNhanHang" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="FK_iMaTrangThai" id="trangthai">
                                            <option value="3">Đã thanh toán</option>
                                            <option value="4">Chờ thanh toán</option>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <label class="form-label">Ghi chú</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" name="sGhiChu" id="ghichu"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Số lượng</th>
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
                                            <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm đơn</button>
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