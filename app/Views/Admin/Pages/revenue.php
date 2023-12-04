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
                        <div class="col-4">
                            <button onclick="searchOrders()" class="btn btn-primary btn-sm">Thống kê</button>
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
    </div> <!-- row end// -->
    <!-- <div id="searchResult"></div> -->
    <!-- Hiển thị kết quả -->

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Đơn hàng</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <?php $k = 1 ?>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $k++ ?></td>
                            <td><b><?= $order['PK_iMaDon'] ?></b></td>
                            <td><?= $order['sTenNV'] ?></td>
                            <td><?= $order['sTenKH'] ?></td>
                            <td><?= date('d/m/Y', strtotime($order['dThoiGianTao'])) ?></td>
                            <td><span class="badge rounded-pill alert-success"><?= $order['sTenTrangThai'] ?></span></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div> <!-- table-responsive end// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
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