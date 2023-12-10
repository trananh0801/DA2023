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
        <h2 class="content-title">Danh sách phiếu hoàn trả hàng</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới phiếu</button>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Mã phiếu</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Nhà cung cấp</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php foreach ($returnBills as $returnBill) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td><b><?= $returnBill['PK_iMaPhieu'] ?></b></td>
                                <td><?= $returnBill['sTenNV'] ?></td>
                                <td><b><span class="badge rounded-pill alert-warning"><?= $returnBill['sTenNCC'] ?></span></b></td>
                                <td><?= date('d/m/Y', strtotime($returnBill['dNgayTao'])) ?></td>
                                <td class="text-end">
                                    <a href="admin/returnBill/update/<?= $returnBill['PK_iMaPhieu'] ?>" class="btn btn-sm btn-warning editGroup">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
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
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nhân viên</label>
                                        <select class="form-select" name="FK_iMaNV" disabled>
                                            <option value="<?= $staffs['PK_iMaNV'] ?>"><?= $staffs['sTenNV'] ?></option>
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
                                            <th width="10%">STT</th>
                                            <th width="50%">Sản phẩm</th>
                                            <th width="20%">Số lượng</th>
                                            <th width="20%" class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="order-1">
                                            <td>1</td>
                                            <td>
                                                <select data-index="1" class="form-select selectProduct selected2" name="FK_iMaSP[]" id="selectProduct">
                                                    <option value="0">Chọn sản phẩm</option>
                                                    <?php foreach ($products as $product) : ?>
                                                        <option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaNhap'] ?>" data-CTPN="<?= $product['PK_iMaCT_PN'] ?>"><?= $product['PK_iMaSP'] ?> - <?= $product['sTenSP'] ?> (<?= number_format($product['fGiaNhap'], 0, '.', '.') ?> VNĐ)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1" /></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" id="addRowButton">Thêm một dòng</button>
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
    $(document).ready(function() {
        //hàm format giá tiền
        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }

        $('#addRowButton').click(function() {
            var html = '<tr class="order-' + ($('#myTable tbody tr').length + 1) + '">';
            html += '<td>' + ($('#myTable tbody tr').length + 1) + '</td>';
            html += '<td><select data-index="' + ($('#myTable tbody tr').length + 1) + '" class="form-select selectProduct" name="FK_iMaSP[]"><option value="0">Chọn sản phẩm</option><?php foreach ($products as $product) : ?><option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaNhap'] ?>"><?= $product['PK_iMaSP'] ?> - <?= $product['sTenSP'] ?> (<?= number_format($product['fGiaNhap'], 0, '.', '.') ?> VNĐ)</option><?php endforeach ?></select></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoLuong[]" min="1" value="1"/></td>';
            html += '<td><button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button></td>';
            html += '</tr>';
            $('#myTable tbody').append(html);
        })

        //xóa dòng
        $("#myTable").on("click", ".deleteRowButton", function() {
            $(this).closest("tr").remove();
            var tong = 0;
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
            var CTPN = $(this).attr('data-CTPN');
            console.log(CTPN);
            var index = $(this).attr('data-index');
            $.ajax({
                type: "post",
                url: 'admin/returnBill/check_returnbill_detail',
                data: {
                    product_id: id,
                    ctpn: CTPN,
                },
                success: function(data) {
                    response = JSON.parse(data);
                    console.log(response);
                    var tong = 0;
                    $('tr.order-' + index).children('td.price').html(response.returnBills.fGiaNhap);
                    $('.iSoLuong').val('1');
                    soluong = $('.iSoLuong').val();

                    var GiaNhap = response.returnBills.fGiaNhap;
                    // console.log(GiaNhap);
                    var changeGiaNhap = GiaNhap.replace(/\./g, "");
                    var thanhtien = (changeGiaNhap * soluong);

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