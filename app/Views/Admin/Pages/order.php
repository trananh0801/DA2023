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
                        <option>Hiển thị 20 bản ghi</option>
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
                            <th scope="col">Mã đơn hóa đơn</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Ngày nhận hàng dự kiến</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td>1</td>
                                <td><b><?= $order['PK_iMaDon'] ?></b></td>
                                <td><b><?= $order['sTenNV'] ?></b></td>
                                <td><?= $order['sTenKH'] ?></td>
                                <td><?= date('d/m/Y', strtotime($order['dThoiGianTao'])) ?></td>
                                <td><?= date('d/m/Y', strtotime($order['dNgayNhanHang'])) ?></td>
                                <?php if ($order['FK_iMaTrangThai'] == '4') : ?>
                                    <td><span class="badge rounded-pill alert-warning"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php else : ?>
                                    <td><span class="badge rounded-pill alert-success"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php endif; ?>
                                <td class="text-end">
                                    <a href="admin/order/edit/<?= $order['PK_iMaDon'] ?>" class="btn btn-sm btn-warning editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo" data-FK_iMaNV="<?= $order['FK_iMaNV'] ?>" data-FK_iMaKH="<?= $order['FK_iMaKH'] ?>" data-FK_iMaTrangThai="<?= $order['FK_iMaTrangThai'] ?>" data-dThoiGianTao="<?= $order['dThoiGianTao'] ?>" data-dNgayNhanHang="<?= $order['dNgayNhanHang'] ?>" data-sGhiChu="<?= $order['sGhiChu'] ?>" data-PK_iMaDon="<?= $order['PK_iMaDon'] ?>">Sửa</a>
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
                            <div class="col-5">
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
                                        <select class="form-select" name="FK_iMaKH" id="selectOption">
                                            <?php foreach ($customers as $customer) : ?>
                                                <option value="<?= $customer['PK_iMaKH'] ?>"><?= $customer['sTenKH'] ?></option>
                                            <?php endforeach ?>
                                        </select>
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
                                        <textarea class="form-control" rows="4" name="sGhiChu"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col" class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select class="form-select selectProduct" name="FK_iMaSP[]" id="selectProduct" >
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td class="price" id="price"></td>
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
                                        <input type="text" placeholder="Tên khách hàng" class="form-control" id="makhachhang" name="FK_iMaKH" readonly />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dThoiGianTao" class="form-label">Thời gian tạo</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="thoigiantao" name="dThoiGianTao" readonly />
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayNhanHang" class="form-label">Ngày nhận hàng</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="ngaynhanhang" name="dNgayNhanHang" readonly />
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
                                        <textarea placeholder="Type here" class="form-control" rows="4" name="sGhiChu" id="ghichu" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select class="form-select" name="FK_iMaSP[]">
                                                    <option value="">123</option>
                                                </select>
                                            </td>
                                            <td><input type="number" placeholder="VD: 10" class="form-control" id="iSoLuong" name="iSoLuong[]" value="" /></td>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <button type="submit" class="btn btn-warning">Cập nhật</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script src="assets/admin/js/order.js"></script>
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
        var cell5 = newRow.insertCell(4);
        var cell6 = newRow.insertCell(5);

        // Cài đặt nội dung cho các ô
        cell1.innerHTML = rowCount;
        cell2.innerHTML = "<td><select class='form-select selectProduct' name='FK_iMaSP[]'><?php foreach ($products as $product) : ?><option value='<?= $product['PK_iMaSP'] ?>' data-price='<?= $product['fGiaBanLe'] ?>'><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>";
        cell3.innerHTML = "<td class='price' id='price'></td>";
        cell4.innerHTML = "<td><input type='number' placeholder='VD: 10' class='form-control' id='iSoLuong' name='iSoLuong[]' /></td>";
        cell5.innerHTML = "<td></td>";
        cell6.innerHTML = "<td class='text-end'><button type='button' class='btn btn-sm btn-danger deleteRowButton'>Xóa</button></td>";

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
        // Sử dụng jQuery để xử lý sự kiện khi nhấn vào nút "Sửa"
        $('.editGroup').on('click', function() {
            var orderId = $(this).attr("data-PK_iMaDon");
            console.log(orderId)
            // Gửi giá trị ID đến controller bằng AJAX
            $.ajax({
                url: '<?= site_url('order/list') ?>', // Thay đổi đường dẫn dẫn đến controller theo tên bạn đã đặt
                type: 'POST',
                data: {
                    order_id: orderId
                },
                success: function(response) {
                    // Xử lý phản hồi từ controller (nếu cần)
                },
                error: function() {
                    console.log('Lỗi trong quá trình gửi yêu cầu AJAX.');
                }
            });
        });


        // Sử dụng jQuery để xử lý sự kiện khi thay đổi giá trị trong thẻ select
        $('.selectProduct').on('change', function() {
            var selectedPrice = $('option:selected', this).data('price');
            console.log(selectedPrice);
            $(this).closest('tr').find('.price').text(selectedPrice);
            console.log('1');
        });
    });
</script>