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
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php if (empty($orders)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">Không có dữ liệu</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= $k++ ?></td>
                                    <td><b><?= $order['PK_iMaDon'] ?></b></td>
                                    <td><?= $order['sTenNV'] ?></td>
                                    <td><b><?= $order['sTenKH'] ?></b></td>
                                    <td><?= date('d/m/Y', strtotime($order['dThoiGianTao'])) ?></td>
                                    <?php if ($order['FK_iMaTrangThai'] == '4') : ?>
                                        <td><span class="badge rounded-pill alert-warning"><?= $order['sTenTrangThai'] ?></span></td>
                                    <?php elseif ($order['FK_iMaTrangThai'] == '10') : ?>
                                        <td><span class="badge rounded-pill alert-primary"><?= $order['sTenTrangThai'] ?></span></td>
                                    <?php elseif ($order['FK_iMaTrangThai'] == '5') : ?>
                                        <td><span class="badge rounded-pill alert-danger"><?= $order['sTenTrangThai'] ?></span></td>
                                    <?php elseif ($order['FK_iMaTrangThai'] == '11') : ?>
                                        <td><span class="badge rounded-pill alert-warning"><?= $order['sTenTrangThai'] ?></span></td>
                                    <?php else : ?>
                                        <td><span class="badge rounded-pill alert-success"><?= $order['sTenTrangThai'] ?></span></td>
                                    <?php endif; ?>
                                    <td class="text-end">
                                        <a href="admin/order/update/<?= $order['PK_iMaDon'] ?>" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
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
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Nhân viên</label>
                                        <select class="form-select" name="FK_iMaNV" disabled>
                                            <option value="<?= $staffs['PK_iMaNV'] ?>"><?= $staffs['sTenNV'] ?></option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Khách hàng</label>
                                            </div>
                                            <div class="col-12">
                                                <select id="lang" name="FK_iMaKH" data-width="100%" data-live-search="true" class="form-control selectpicker" data-none-selected-text="Chọn khách hàng">
                                                    <?php foreach ($customers as $customer) : ?>
                                                        <option value="<?= $customer['PK_iMaKH'] ?>"><?= $customer['sSDT'] ?> - <?= $customer['sTenKH'] ?></option>
                                                    <?php endforeach ?>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label"></label>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-warning mt-1" data-bs-toggle="modal" data-bs-target="#addKH" data-bs-whatever="@mdo">Thêm</button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dThoiGianTao" class="form-label">Thời gian tạo</label>
                                        <input type="date" placeholder="Type here" class="form-control" id="dThoiGianTao" name="dThoiGianTao" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-select" name="FK_iMaTrangThai">
                                            <option value="4">Chờ thanh toán</option>
                                            <option value="3">Đã thanh toán</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label class="form-label">Ghi chú</label>
                                    <textarea class="form-control" rows="4" name="sGhiChu"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">STT</th>
                                            <th style="width:30%">Sản phẩm</th>
                                            <th style="width:15%">Giá</th>
                                            <th style="width:10%">Số lượng</th>
                                            <th style="width:15%">Chiết khấu(%)</th>
                                            <th style="width:15%">Thành tiền</th>
                                            <th class="text-end" style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="order-1">
                                            <td>1</td>
                                            <td scope="col-7">
                                                <select data-index="1" class="selectProduct selectpicker" name="FK_iMaSP[]" id="selectProduct" data-width="100%">
                                                    <option value="0">Chọn sản phẩm</option>
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <input type="hidden" id="price_product" name="price_product" disabled />
                                            <td class="price" id="price">


                                            </td>
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1" /></td>
                                            <input type="hidden" id="chietkhau_product" name="chietkhau_product" disabled />
                                            <td class="chietkhau" id="chietkhau"></td>
                                            <input type="hidden" id="thanhtien_product" name="thanhtien_product" disabled />
                                            <td class="thanhtien" id="thanhtien"></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger deleteRowButton" data-index="1">Xóa</button>
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
                                        <dd> <b class="h5" id="tongtien"></b> VNĐ</dd>
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

    <div class="modal fade" id="addKH" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhanh khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="admin/order/themnhanh">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tên khách hàng</label>
                            <input type="text" class="form-control" id="recipient-name" name="sTenKH">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sSDT" name="sSDT">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>

<script>
    //set timeout cho thông báo
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);

    $(document).ready(function() {
        //hàm format giá tiền
        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }

        //thêm dòng
        $('#addRowButton').click(function() {
            var html = '<tr class="order-' + ($('#myTable tbody tr').length + 1) + '">';
            html += '<td>' + ($('#myTable tbody tr').length + 1) + '</td>';
            html += '<td><select data-index="' + ($('#myTable tbody tr').length + 1) + '" class="form-select selectProduct" name="FK_iMaSP[]"><option value="0">Chọn sản phẩm</option><?php foreach ($products as $product) : ?><option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>';
            html += '<input type="hidden" id="price_product" name="price_product" disabled /><td class="price" id="price"></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1"/></td>';
            html += ' <input type="hidden" id="chietkhau_product" name="chietkhau_product" disabled /><td class="chietkhau" id="chietkhau"></td>';
            html += '<input type="hidden" id="thanhtien_product" name="thanhtien_product" disabled /><td class="thanhtien" id="thanhtien"></td>';
            html += '<td ><button type="button" class="btn btn-sm btn-danger deleteRowButton" data-index="' + ($('#myTable tbody tr').length + 1) + '">Xóa</button></td>';
            html += '</tr>';
            $('#myTable tbody').append(html);
        })

        //xóa dòng
        $("#myTable").on("click", ".deleteRowButton", function(e) {
            $(this).closest("tr").remove();
            // var index = $(this).attr('data-index');
            // e.preventDefault();
            // if (confirm('Bạn có chắc muốn xóa không?')) {
            //     $('#myTable tbody tr.order-' + index).remove();
            //     alert_float('success', 'Xóa sản phẩm thành công');

            // }
        });

        // Sử dụng jQuery để xử lý sự kiện khi nhấn vào nút "Sửa"
        $('.editGroup').on('click', function() {
            var orderId = $(this).attr("data-PK_iMaDon");
            console.log(orderId)
            // Gửi giá trị ID đến controller bằng AJAX
            $.ajax({
                url: '<?php echo base_url("statistical/searchOrders"); ?>', // Thay đổi đường dẫn dẫn đến controller theo tên bạn đã đặt
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
            var now = new Date();

            $.ajax({
                type: "post",
                url: 'admin/order/check_product_detail',
                data: {
                    product_id: id,
                },
                success: function(data) {
                    response = JSON.parse(data);
                    NHL = Date.parse(response.product.dNgayHieuLuc)
                    NHHL = Date.parse(response.product.dNgayHetHieuLuc)
                    var ngayhieuluc = new Date(NHL);
                    var ngayhethieuluc = new Date(NHHL);
                    console.log(ngayhieuluc);
                    console.log(ngayhethieuluc);
                    console.log(now);
                    var tong = 0;
                    $('tr.order-' + index).children('td.price').html(formatNumber(parseFloat(response.product.fGiaBanLe)));
                    $('tr.order-' + index).children('input[name="price_product"]').val(response.product.fGiaBanLe);
                    if (response.product.fChietKhau == null || (now < ngayhieuluc || now > ngayhethieuluc)) {
                        $('tr.order-' + index).children('td.chietkhau').html('0');
                        $('tr.order-' + index).children('input[name="chietkhau_product"]').val(0);
                    } else {
                        $('tr.order-' + index).children('td.chietkhau').html(response.product.fChietKhau);
                        $('tr.order-' + index).children('input[name="chietkhau_product"]').val(response.product.fChietKhau);
                    }
                    soluong = $('.iSoLuong').val();

                    var giabanle = response.product.fGiaBanLe;
                    var changeGiabanLe = giabanle.replace(/\./g, "");
                    if (now < ngayhieuluc || now > ngayhethieuluc) {
                        var thanhtien = (changeGiabanLe * soluong);
                    } else {
                        var thanhtien = (changeGiabanLe * soluong) - (changeGiabanLe * response.product.fChietKhau / 100);
                    }
                    

                    $('tr.order-' + index).children('td.thanhtien').html(formatNumber(thanhtien));
                    $('tr.order-' + index).children('input[name="thanhtien_product"]').val(thanhtien);

                    $('#tongtien').html(formatNumber(tinh_thanhtien()));

                }
            });
        });

        function tinh_thanhtien() {
            var tong = 0;
            $('input[name="thanhtien_product"]').each(function() {
                var tongtien = $(this).val();
                // Chuyển đổi giá trị từ chuỗi sang số và cộng vào tổng
                tong += parseFloat(tongtien);
            });
            return tong;
        }
        $(document).on('input', '#iSoLuong', function() {
            var index = $(this).attr('data-index');
            var price = $('tr.order-' + index).children('input[name="price_product"]').val();
            var amount = $(this).val();
            // alert(price);
            $('tr.order-' + index).children('td.thanhtien').html(formatNumber(parseInt(price) * amount * (1 - $('tr.order-' + index).children('input[name="chietkhau_product"]').val() / 100)));
            $('tr.order-' + index).children('input[name="thanhtien_product"]').val(parseInt(price) * amount * (1 - $('tr.order-' + index).children('input[name="chietkhau_product"]').val() / 100));
            $('#tongtien').html(formatNumber(tinh_thanhtien()));

        });

        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().substr(0, 10);
        $("#dThoiGianTao").val(formattedDate);
    });
</script>