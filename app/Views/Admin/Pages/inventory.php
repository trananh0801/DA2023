<style>
    .td_img {
        width: 100px;
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .td_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
    }
</style>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Thống kê sản phẩm tồn kho </h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="admin/statistical/searchProduct" method="get">
                <div class="card card-body mb-4">
                    <div class="row">
                        <div class="mb-4 col-8">
                            <label class="form-label">Sản phẩm</label>
                            <select class="form-select" name="PK_iMaSP">
                                <?php foreach ($products as $product) : ?>
                                    <option value="<?= $product['PK_iMaSP'] ?>"><?= $product['sTenSP'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <button onclick="searchOrders()" class="btn btn-primary btn-sm">Thống kê</button>
                        </div>
                    </div>
                </div> <!-- card  end// -->
            </form>
        </div> <!-- col end// -->
    </div> <!-- row end// -->

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Đơn hàng</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <?php $k = 1 ?>
                    <?php foreach ($productLists as $productList) : ?>
                        <tr>
                            <td><?= $k++ ?></td>
                            <td>
                                <div class="td_img">
                                    <img src="<?php echo base_url('assets/admin/images/products/' . $productList['sHinhAnh']) ?>" alt="Ảnh sản phẩm">
                                </div>
                            </td>
                            <td><b><?= $productList['sTenSP'] ?></b></td>
                            <td><?= $productList['sTenNhom'] ?></td>
                            <td><?= number_format($productList['fGiaBanLe'], 0, '.', ',') ?> VNĐ</td>
                            <td>
                                <?php if ($productList['fSoLuong'] >= 100) : ?>
                                    <span class="badge rounded-pill alert-success">
                                        <?= $productList['fSoLuong'] ?>
                                        <?= $productList['sDVT'] ?>
                                    </span>
                                <?php else : ?>
                                    <span class="badge rounded-pill alert-warning">
                                        <?= $productList['fSoLuong'] ?>
                                        <?= $productList['sDVT'] ?>
                                    </span>
                                <?php endif ?>
                            </td>
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
</script>