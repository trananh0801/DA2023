<style>
    .status-img {
        width: 100px;
        height: 90px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
        /* margin-left: 5px; */
        margin-right: 5px;
    }
</style>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li><a href="user/account">Cá nhân</a></li>
                <li class="active"> Danh sách đơn hàng</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Trạng thái đơn hàng </span></h1>

            <div class="row userInfo">
                <div class="col-lg-12">
                    <h2 class="block-title-2"> Trạng thái đơn hàng của bạn </h2>
                </div>
                <div class="statusContent">
                    <div class="col-sm-12">
                        <div class=" statusTop">
                            <p><strong>Trạng thái:</strong> <?= $orders['sTenTrangThai'] ?></p>

                            <p><strong>Ngày đặt hàng:</strong><?= date('d/m/Y', strtotime($orders['dThoiGianTao'])) ?></p>

                            <p><strong>Số đơn hàng:</strong> <?= $orders['PK_iMaDon'] ?> </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                Thông tin khách hàng
                            </div>
                            <div class="order-box-content">
                                <div class="address">
                                    <p><strong><?= $orders['sTenKH'] ?> </strong></p>

                                    <p><strong><?= $orders['sSDT'] ?> </strong></p>

                                    <div class="adr">
                                        <?= $orders['sDiaChi'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                Địa chỉ nhận hàng
                            </div>
                            <div class="order-box-content">
                                <div class="address">
                                    <p><strong><?= $orders['sDiaChi'] ?></strong></p>
                                    <!-- <div class="adr">
                                        202 Định Công hạ<br>Hoàng Mai, Hà Nội
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                    <div class="col-sm-12 clearfix">
                        <div class="order-box">
                            <div class="order-box-header">
                                Danh sách sản phẩm
                            </div>
                            <div class="order-box-content">
                                <div class="table-responsive">
                                    <table class="order-details-cart">
                                        <tbody>
                                            <?php foreach ($orderDetails as $orderDetail) : ?>
                                                <tr class="cartProduct">
                                                    <td class="cartProductThumb" style="width:20%">
                                                        <div><a href="product-details.html" class="status-img"> <img alt="img" src="<?php echo base_url('assets/admin/images/products/' . $orderDetail['sHinhAnh']) ?>">
                                                            </a></div>
                                                    </td>
                                                    <td style="width:40%">
                                                        <div class="miniCartDescription">
                                                            <h4><a href="product-details.html"> <?= $orderDetail['sTenSP'] ?> </a></h4>
                                                            <span class="size"> <?= $orderDetail['sDVT'] ?> </span>

                                                            <div class="price"><span> <?= number_format($orderDetail['fGiaBanLe'], 0, '.', ',') ?> </span>đ</div>
                                                        </div>
                                                    </td>
                                                    <td class="" style="width:10%"><a> X <?= $orderDetail['iSoLuong'] ?> </a></td>
                                                    <td class="" style="width:10%"><a> <?php if ($orderDetail['fChietKhau'] == null) : ?>0 %<?php else : ?><?= $orderDetail['fChietKhau'] ?> %<?php endif; ?> </a></td>
                                                    <td style="width:15%"><span class="thanhtien"> <?php echo   number_format(($orderDetail['iSoLuong'] * $orderDetail['fGiaBanLe'] * (1 - $orderDetail['fChietKhau'] / 100 ?: 0)), 0, '.', ',') ?></span>đ</td>
                                                </tr>
                                            <?php endforeach ?>

                                            <tr class="cartTotalTr blank">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td style="width:40%"></td>
                                                <td class="" style="width:20%"></td>
                                                <td class="" style="width:15%"><span> </span></td>
                                            </tr>
                                            <tr class="cartTotalTr">
                                                <td class="" style="width:20%">
                                                    <div></div>
                                                </td>
                                                <td style="width:40%"></td>
                                                <td class="" style="width:20%">Tổng tiền (Đã áp dụng khuyến mãi)</td>
                                                <td class="" style="width:15%"><span id="tongtien" class="price"></span> đ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 clearfix">
                    <ul class="pager">
                        <li class="previous pull-right"><a href="user/home"> <i class="fa fa-home"></i> Trở về trang chủ </a>
                        </li>
                        <li class="next pull-left">
                            <?php if ($orders['sTenTrangThai'] == "Chờ thanh toán" || $orders['sTenTrangThai'] == "Đang giao hàng") : ?>
                                <a href="user/doitra/<?= $orders['PK_iMaDon'] ?>" class="btn btn-primary btn-sm" style="color: #000"> ← Hoàn trả</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <div style="clear:both"></div>
</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        var tong = 0;

        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }

        $(".thanhtien").each(function() {
            var thanhtien = $(this).text();
            var changeThanhtien = thanhtien.replace(/\,/g, "");
            console.log(changeThanhtien);
            tong += parseFloat(changeThanhtien) || 0;
        });
        $('#tongtien').html(formatNumber(tong));
    });
</script>