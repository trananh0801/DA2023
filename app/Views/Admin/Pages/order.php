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
                        <?php $k = 1 ?>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
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
                                    <a href="admin/order/update/<?= $order['PK_iMaDon'] ?>" class="btn btn-sm btn-warning editGroup">Sửa</a>
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
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Khách hàng</label>
                                            </div>
                                            <div class="col-10">
                                                <select class="form-select" name="FK_iMaKH" id="selectOption">
                                                    <?php foreach ($customers as $customer) : ?>
                                                        <option value="<?= $customer['PK_iMaKH'] ?>"><?= $customer['sTenKH'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-sm btn-primary">+</button>
                                            </div>
                                        </div>
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
                                            <th scope="col">Chiết khấu</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col" class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="order-1">
                                            <td>1</td>
                                            <td>
                                                <select data-index="1" class="form-select selectProduct" name="FK_iMaSP[]" id="selectProduct">
                                                    <option value="0">Chọn sản phẩm</option>
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td class="price" id="price"></td>
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1"/></td>
                                            <td class="chietkhau" id="chietkhau"></td>
                                            <td class="thanhtien" id="thanhtien"></td>
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
                                        <dt>Tổng tiền:</dt>
                                        <dd> <b class="h5" id="tongtien"></b> </dd>
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
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2-bootstrap.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script> -->
<script>
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);
    $(document).ready(function() {
        $('#addRowButton').click(function() {
            var html = '<tr class="order-' + ($('#myTable tbody tr').length + 1) + '">';
            html += '<td>' + ($('#myTable tbody tr').length + 1) + '</td>';
            html += '<td><select data-index="' + ($('#myTable tbody tr').length + 1) + '" class="form-select selectProduct" name="FK_iMaSP[]"><option value="0">Chọn sản phẩm</option><?php foreach ($products as $product) : ?><option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>';
            html += '<td class="price" id="price"></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1"/></td>';
            html += '<td class="chietkhau" id="chietkhau"></td>';
            html += '<td class="thanhtien" id="thanhtien"></td>';
            html += '<td class="text-end"><button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button></td>';
            html += '</tr>';
            $('#myTable tbody').append(html);
        })

        $("#myTable").on("click", ".deleteRowButton", function() {
            $(this).closest("tr").remove();

            var tong = 0;
            tong += parseFloat($('.thanhtien').text()) || 0;
            $('#tongtien').html(tong);
        });

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
        $(document).on('change', '.selectProduct', function() {
            var id = $(this).val();
            var index = $(this).attr('data-index');
            $.ajax({
                type: "post",
                url: 'admin/order/check_product_detail',
                data: {
                    product_id: id,
                },
                success: function(data) {
                    response = JSON.parse(data);
                    var tong = 0;
                    $('tr.order-' + index).children('td.price').html(response.product.fGiaBanLe);
                    if (response.product.fChietKhau == null) {
                        $('tr.order-' + index).children('td.chietkhau').html('0');
                    } else {
                        $('tr.order-' + index).children('td.chietkhau').html(response.product.fChietKhau);
                    }
                    $('.iSoLuong').val('1');
                    soluong = $('.iSoLuong').val();
                    $('tr.order-' + index).children('td.thanhtien').html((response.product.fGiaBanLe * soluong) - (response.product.fGiaBanLe * response.product.fChietKhau / 100));

                    $(".thanhtien").each(function() {
                        // Chuyển đổi giá trị từ chuỗi sang số và cộng vào tổng
                        tong += parseFloat($(this).text()) || 0;
                    });
                    $('#tongtien').html(tong);
                }
            });
        });


        // Sử dụng jQuery để xử lý sự kiện khi thay đổi giá trị trong thẻ select
        $(document).on('change', '.inputSoLuong', function() {
            var id = $(this).val();
            var index = $(this).attr('data-index');
            $.ajax({
                type: "post",
                url: 'admin/order/check_product_detail',
                data: {
                    product_id: id,
                },
                success: function(data) {
                    response = JSON.parse(data);
                    var tong = 0;
                    soluong = $('tr.order-' + index).children('input.iSoLuong').text();
                    
                    console.log(soluong)
                    // $('tr.order-' + index).children('td.chietkhau').html(1- (Math.pow(1 - 0.1, soluong)));

                    $('tr.order-' + index).children('td.thanhtien').html(($('tr.order-' + index).children('td.price').text() * soluong) - ($('tr.order-' + index).children('td.price').text() * $('tr.order-' + index).children('td.chietkhau').text() / 100));

                    $(".thanhtien").each(function() {
                        tong += parseFloat($(this).text()) || 0;
                    });
                    $('#tongtien').html(tong);
                }
            });
        });
    });

</script>