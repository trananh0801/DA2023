<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Thống kê doanh thu tháng </h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="admin/statistical/search" method="GET">
                <div class="card card-body mb-4">
                    <div class="row">
                        <div class="mb-4 col-4">
                            <label for="dNgaySinh" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="dBatDau" name="dBatDau" />
                        </div>
                        <div class="mb-4 col-4">
                            <label for="dNgaySinh" class="form-label">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="dKetThuc" name="dKetThuc" />
                        </div>
                        <div class="col-2">
                            <hr>
                            <button onclick="searchOrders()" class="btn btn-primary btn-sm">Thống kê</button>
                            <hr>
                        </div>
                    </div>
                </div> <!-- card  end// -->
            </form>
        </div> <!-- col end// -->
    </div> <!-- row end// -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1">Tổng doanh thu</h6> <?= number_format($totals['tong'], 0, '.', ',') ?><span> VNĐ</span>
                    </div>
                </article>

            </div> <!-- card  end// -->
        </div> <!-- col end// -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-shopping_basket"></i></span>
                    <div class="text">
                        <h6 class="mb-1">Tổng đơn hàng hoàn trả</h6> <?= $totalReturnBills ?><span> hóa đơn</span>
                    </div>
                </article>

            </div> <!-- card  end// -->
        </div> <!-- col end// -->
    </div> <!-- row end// -->
    <!-- <div id="searchResult"></div> -->
    <!-- Hiển thị kết quả -->

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Đơn hàng</h5>
            <div class="table-responsive">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã hóa đơn</th>
                            <th>Nhân viên</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt </th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        <?php foreach ($orders['order'] as $order) : ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td><b><?= $order['PK_iMaDon'] ?></b></td>
                                <td><?= $order['sTenNV'] ?></td>
                                <td><?= $order['sTenKH'] ?></td>
                                <td><?= date('d/m/Y', strtotime($order['dThoiGianTao'])) ?></td>
                                <?php if ($order['FK_iMaTrangThai'] == '4') : ?>
                                    <td><span class="badge rounded-pill alert-warning"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php elseif ($order['FK_iMaTrangThai'] == '10') : ?>
                                    <td><span class="badge rounded-pill alert-primary"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php elseif ($order['FK_iMaTrangThai'] == '5') : ?>
                                    <td><span class="badge rounded-pill alert-danger"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php else : ?>
                                    <td><span class="badge rounded-pill alert-success"><?= $order['sTenTrangThai'] ?></span></td>
                                <?php endif; ?>
                                <td>
                                    <?php
                                    $totalAmount = 0;
                                    $key = 0;
                                    foreach ($order['orderDetails'] as $od) {
                                        $totalAmount += $od['iSoLuong'] * $od['fGiaBanLe'];
                                    }
                                    echo   number_format($totalAmount)
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div> <!-- table-responsive end// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

</section> <!-- content-main end// -->

<script>
    function searchOrders() {
        // Lấy giá trị ngày bắt đầu và kết thúc từ input
        var startDate = $('#dBatDau').val();
        var endDate = $('#dKetThuc').val();

        // Gọi Ajax
        $.ajax({
            url: '<?= site_url('statistical/search') ?>',
            type: 'POST',
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(result) {
                console.log(startDate);
                // Hiển thị kết quả trong div với id là 'searchResult'
                $('#searchResult').html(result);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    var currentDate = new Date();
    var firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    var lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

    var formattedFirstDay = firstDayOfMonth.toISOString().substr(0, 10);
    var formattedLastDay = lastDayOfMonth.toISOString().substr(0, 10);

    $("#dBatDau").val(formattedFirstDay);
    $("#dKetThuc").val(formattedLastDay);
</script>