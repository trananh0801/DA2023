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
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th scope="col">Mã phiếu</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Nhà cung cấp</th>
                            <th scope="col">Ngày nhập</th>
                            <th scope="col" class="text-end"> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>

                        <?php foreach ($importBills as $importBill) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td><b><?= $importBill['PK_iPN'] ?></b></td>
                                <td><?= $importBill['sTenNV'] ?></td>
                                <td><span class="badge rounded-pill alert-success"><?= $importBill['sTenNCC'] ?></span></td>
                                <td><?= date('d/m/Y', strtotime($importBill['dNgayNhap'])) ?></td>
                                <td class="text-end">
                                    <a href="admin/importBill/update/<?= $importBill['PK_iPN'] ?>" class="btn btn-sm btn-warning editGroup">Xem chi tiết</a>
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
                                        <label for="dNgayNhap" class="form-label">Ngày nhập</label>
                                        <input type="date" class="form-control" id="dNgayNhap" name="dNgayNhap" />
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
                                            <th scope="col">Giá nhập</th>
                                            <th scope="col">Số lượng</th>
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
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control fGiaNhap" id="fGiaNhap" name="fGiaNhap[]" value="0" /></td>
                                            <td><input data-index="1" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoluong[]" min="1" value="1" /></td>
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
                                        <dd> <b class="h5" id="tongtien"></b> VNĐ</dd>
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
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().substr(0, 10);
        $("#dNgayNhap").val(formattedDate);

        //hàm format giá tiền
        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }
        $('#addRowButton').click(function() {
            var html = '<tr class="order-' + ($('#myTable tbody tr').length + 1) + '">';
            html += '<td>' + ($('#myTable tbody tr').length + 1) + '</td>';
            html += '<td><select data-index="' + ($('#myTable tbody tr').length + 1) + '" class="form-select selectProduct" name="FK_iMaSP[]"><option value="0">Chọn sản phẩm</option><?php foreach ($products as $product) : ?><option value="<?= $product['PK_iMaSP'] ?>" data-price="<?= $product['fGiaBanLe'] ?>"><?= $product['sTenSP'] ?></option><?php endforeach ?></select></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control" id="fGiaNhap" name="fGiaNhap[]" value="0"/></td>';
            html += '<td><input data-index="' + ($('#myTable tbody tr').length + 1) + '" type="number" placeholder="VD: 10" class="form-control iSoLuong inputSoLuong" id="iSoLuong" name="iSoluong[]" min="1" value="1"/></td>';
            html += '<td class="thanhtien" id="thanhtien"></td>';
            html += '<td class="text-end"><button type="button" class="btn btn-sm btn-danger deleteRowButton">Xóa</button></td>';
            html += '</tr>';
            $('#myTable tbody').append(html);
        })

        //xóa dòng
        $("#myTable").on("click", ".deleteRowButton", function() {
            $(this).closest("tr").remove();
        });

        function tinh_thanhtien() {
            var tong = 0;
            $('.thanhtien').each(function() {
                var thanhtien = $(this).text();
                var tongtien = thanhtien.replace(/\./g, "");
                tong += parseFloat(tongtien);
            });
            return tong;
        }


        $(document).on('input', '#iSoLuong', function() {
            var tong = 0;
            var index = $(this).attr('data-index');
            var price = $('tr.order-' + index + ' input[name="fGiaNhap[]"]').val();
            // alert(price);
            var amount = $(this).val();
            $('tr.order-' + index).children('td.thanhtien').html(formatNumber(parseInt(price) * amount));
            $('#tongtien').html(formatNumber(tinh_thanhtien()));
        });

        $(document).on('input', '#fGiaNhap', function() {
            var index = $(this).attr('data-index');
            var amount = $('tr.order-' + index + ' input[name="iSoluong[]"]').val();
            // alert(price);
            var price = $(this).val();
            $('tr.order-' + index).children('td.thanhtien').html(formatNumber(parseInt(price) * amount));
            $('#tongtien').html(formatNumber(tinh_thanhtien()));
        });

    });
</script>