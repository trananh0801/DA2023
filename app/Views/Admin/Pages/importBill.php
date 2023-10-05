<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Danh sách phiếu nhập kho</h2>
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
                            <th scope="col">Ngày nhập</th>
                            <th scope="col">Số tiền đã trả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><b>PN001</b></td>
                            <td><b>Trần Ánh</b></td>
                            <td>Nhà cung cấp 1</td>
                            <td>19/02/2023</td>
                            <td>100.000đ</td>
                            <td><span class="badge rounded-pill alert-warning">Pending</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light">Detail</a>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        <a class="dropdown-item" href="#">Edit info</a>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                </div> <!-- dropdown //end -->
                            </td>
                        </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu nhập kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhân viên</label>
                                <select class="form-select" name="sGioiTinh">
                                    <option value="1">Trần Ánh</option>
                                </select>
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhà cung cấp</label>
                                <select class="form-select" name="sGioiTinh">
                                    <option value="1">Trần Ánh</option>
                                </select>
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
                                                <select class="form-select" name="sGioiTinh">
                                                    <option value="1">Trần Ánh</option>
                                                </select>
                                            </td>
                                            <td><input type="text" placeholder="Type here" class="form-control" id="dNgaySinh" name="dNgaySinh" /></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-danger deleteRowButton">X</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-3">
                                <label for="dNgaySinh" class="form-label">Ngày nhập</label>
                                <input type="text" placeholder="Type here" class="form-control" id="dNgaySinh" name="dNgaySinh" />
                            </div>
                            <div class="mb-4 col-3">
                                <label for="dNgaySinh" class="form-label">Số tiền đã trả</label>
                                <input type="text" placeholder="Type here" class="form-control" id="dNgaySinh" name="dNgaySinh" />
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary" id="addRowButton">Thêm một dòng</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-3">
                                <label for="dNgaySinh" class="form-label">Người giao hàng</label>
                                <input type="text" placeholder="Type here" class="form-control" id="dNgaySinh" name="dNgaySinh" />
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <select class="form-select" name="sGioiTinh">
                                    <option value="1">Trần Ánh</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-6">
                                <label class="form-label">Ghi chú</label>
                                <textarea placeholder="Type here" class="form-control" rows="4" name="sGhiChu"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Thêm phiếu</button>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
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
    cell2.innerHTML = "<td><select class='form-select' name='sGioiTinh'><option value='1'>Trần Ánh</option></select></td>";
    cell3.innerHTML = "<td><input type='text' placeholder='' class='form-control' id='dNgaySinh' name='dNgaySinh' /></td>";
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
</script>