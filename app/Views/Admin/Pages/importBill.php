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
                            <!-- <th scope="col">Số tiền đã trả</th> -->
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php if (empty($importBills)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">Không có dữ liệu</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($importBills as $importBill) : ?>
                                <tr>
                                    <td><?= $k++ ?></td>
                                    <td><b><?= $importBill['PK_iPN'] ?></b></td>
                                    <td><b><?= $importBill['sTenNV'] ?></b></td>
                                    <td><?= $importBill['sTenNCC'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($importBill['dNgayNhap'])) ?></td>
                                    <!-- <td><?= number_format($importBill['fTienDaTra'], 0, ',', ',') ?> &#8363</td> -->
                                    <?php if ($importBill['FK_iMaTrangThai'] == '4') : ?>
                                        <td><span class="badge rounded-pill alert-warning"><?= $importBill['sTenTrangThai'] ?></span></td>
                                    <?php else : ?>
                                        <td><span class="badge rounded-pill alert-success"><?= $importBill['sTenTrangThai'] ?></span></td>
                                    <?php endif; ?>
                                    <td class="text-end">
                                        <a href="admin/importBill/update/<?= $importBill['PK_iPN'] ?>" class="btn btn-sm btn-warning editGroup">Sửa</a>
                                        <!-- <a href="admin/importBill/delete/<?= $importBill['PK_iPN'] ?>" class="btn btn-danger deleteGroup text-danger" value="<?= $importBill['PK_iPN'] ?>" name="maphieunhap" onclick="myFunction()">Xóa</a> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu nhập kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/importBill/create" method="POST">
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
                                        <label class="form-label">Nhà cung cấp</label>
                                        <select class="form-select" name="FK_iMaNCC">
                                            <?php foreach ($suppliers as $supplier) : ?>
                                                <option value="<?= $supplier['PK_iMaNCC'] ?>"><?= $supplier['sTenNCC'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="dNgayNhap" class="form-label">Ngày nhập</label>
                                        <input type="date" class="form-control" id="dNgayNhap" name="dNgayNhap" />
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
                                            <!-- <th scope="col">Chiết khấu (%)</th> -->
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
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoluong[]" min="1" value="1" /></td>
                                            <!-- <td class="chietkhau" id="chietkhau"></td> -->
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
                            <button type="submit" class="btn btn-primary">Thêm phiếu</button>
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

    function myFunction() {
        confirm("Bạn có chắc chắn muốn đơn đăng hàng này?");
    }

    $(document).ready(function() {
        //hàm format giá tiền
        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }
        $('#addRowButton').click(function() {
            var html = '<tr class="order-' + ($('#myTable tbody tr').length + 1) + '">';
            html += '<td>' + ($('#myTable tbody tr').length + 1) + '</td>';
            html += '<td><select data-index="' + ($('#myTable tbody tr').length + 1) + '" class="form-select selectProduct" name="FK_iMaSP[]"><option value="0">Chọn sản phẩm</option><?php foreach ($products as $product) : ?><option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>';
            html += '<td class="price" id="price"></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoluong[]" min="1" value="1"/></td>';
            html += '<td class="thanhtien" id="thanhtien"></td>';
            html += '<td class="text-end"><button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button></td>';
            html += '</tr>';
            $('#myTable tbody').append(html);
        })

        //xóa dòng
        $("#myTable").on("click", ".deleteRowButton", function() {
            $(this).closest("tr").remove();
            var tong = 0;

            $(".thanhtien").each(function() {
                var tongtien = $(this).text();
                var changeTongtien = tongtien.replace(/\./g, "");
                tong += parseFloat(changeTongtien) || 0;
            });
            $('#tongtien').html(formatNumber(tong));

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
                    
                    var giabanle = response.product.fGiaBanLe;
                    var changeGiabanLe = giabanle.replace(/\./g, "");
                    var thanhtien = (changeGiabanLe * soluong) - (changeGiabanLe * response.product.fChietKhau / 100);

                    // console.log(formatNumber(thanhtien))
                    $('tr.order-' + index).children('td.thanhtien').html(formatNumber(thanhtien));

                    $(".thanhtien").each(function() {
                        var tongtien = $(this).text();
                        var changeTongtien = tongtien.replace(/\./g, "");
                        // Chuyển đổi giá trị từ chuỗi sang số và cộng vào tổng
                        tong += parseFloat(changeTongtien) || 0;
                    });
                    $('#tongtien').html(formatNumber(tong));
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

        $('.giatien').on('input', function() {
            // Lấy giá trị từ input
            let inputValue = $(this).val();

            // Loại bỏ dấu phẩy ngăn cách hàng nghìn nếu có
            let cleanedValue = inputValue.replace(/,/g, '');

            // Format lại giá trị với dấu phẩy ngăn cách hàng nghìn
            let formattedValue = cleanedValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // Cập nhật giá trị vào input
            $(this).val(formattedValue);
        });

        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().substr(0, 10);
        $("#dNgayTao").val(formattedDate);
    });
</script>