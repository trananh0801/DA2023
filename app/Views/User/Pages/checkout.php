<style>
    .checkout-img {
        width: 100px;
        height: 90px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .checkout-img img {
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
                <li class="active"> Đặt hàng</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Đặt hàng</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="user/home"><i class="fa fa-chevron-left"></i> Quay lại trang chủ </a></h4>
        </div>
    </div>
    <div class="row">
        <?php if (session('errorsMsg')) : ?>
            <?php foreach (session('errorsMsg') as $error) : ?>
                <div class="alert alert-danger alert-dismissible myAlert" role="alert">
                    <strong>Lỗi: </strong> <?= $error ?>
                </div>
                <?php break; ?>
            <?php endforeach ?>
        <?php endif ?>
        <?php if (session('successMsg')) : ?>
            <?php foreach (session('successMsg') as $success) : ?>
                <div class="alert alert-success alert-dismissible myAlert" role="alert">
                    <strong>Thành công: </strong> <?= $success ?>
                </div>
                <?php break; ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <form action="user/addCheckout" method="POST">
                        <div class="w100 clearfix">
                            <ul class="orderStep orderStepLook2">
                                <li><a href="checkout-1.html">
                                        <i class="fa fa-map-marker "></i>
                                        <span> ĐỊA CHỈ</span>
                                    </a></li>
                                <li class="active"><a href="checkout-5.html"><i class="fa fa-check-square "> </i><span>ĐẶT HÀNG</span></a></li>
                            </ul>
                        </div>
                        <div class="w100 clearfix">
                            <div class="row userInfo">
                                <div class="col-lg-12">
                                    <h2 class="block-title-2"> Chi tiết đơn hàng </h2>
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <div class="cartContent w100 checkoutReview ">
                                        <table class="cartTable table-responsive" style="width:100%">
                                            <tbody>
                                                <tr class="CartProduct cartTableHeader">
                                                    <th style="width:15%"> Sản phẩm</th>
                                                    <th class="checkoutReviewTdDetails">Chi tiết</th>
                                                    <th style="width:10%">Đơn giá</th>
                                                    <th class="hidden-xs" style="width:5%">Số lượng</th>
                                                    <th class="hidden-xs" style="width:10%">Chiết khấu</th>
                                                    <th style="width:15%">Thành tiền</th>
                                                </tr>
                                                <?php foreach ($products as $product) : ?>
                                                    <tr class="CartProduct">
                                                        <td>
                                                            <div><a href="product-details.html" class="checkout-img"><img src="<?php echo base_url('assets/admin/images/products/' . $product['sHinhAnh']) ?>"></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="CartDescription">
                                                                <h4><a href="product-details.html"><?= $product['sTenSP'] ?> </a></h4>
                                                                <i>Số lượng: <?= $product['fSoLuong'] ?> (<?= $product['sDVT'] ?>)</i>
                                                            </div>
                                                        </td>
                                                        <td class="delete">
                                                            <div class="price "><?= number_format($product['fGiaBanLe'], 0, '.', ',') ?> đ</div>
                                                        </td>
                                                        <td>
                                                            <input type="text" value="<?= $product['PK_iMaSP'] ?>" name="FK_iMaSP[]" hidden>
                                                            <input class="quanitySniper" type="text" value="<?= $product['iSoLuong'] ?>" min="1" name="iSoLuong[]" style="width:35px">
                                                        </td>
                                                        <td class="hidden-xs">
                                                            <?php $currentDate = date('Y-m-d') ?>
                                                            <?php if ($product['fChietKhau'] == null || ($currentDate < $product['dNgayHieuLuc'] || $currentDate > $product['dNgayHetHieuLuc'])) : ?>
                                                                0
                                                            <?php else : ?>
                                                                <?= $product['fChietKhau'] ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="price thanhtien">
                                                            <?php if ($product['fChietKhau'] == null || ($currentDate < $product['dNgayHieuLuc'] || $currentDate > $product['dNgayHetHieuLuc'])) : ?>
                                                                <?php echo   number_format(($product['iSoLuong'] * $product['fGiaBanLe']), 0, '.', ',') ?> đ
                                                            <?php else : ?>
                                                                <?php echo   number_format(($product['iSoLuong'] * $product['fGiaBanLe'] * (1 - $product['fChietKhau'] / 100 ?: 0)), 0, '.', ',') ?> đ
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="cartFooter w100">
                            <div class="box-footer">
                                <div class="pull-left"><a class="btn btn-default" href="user/account">
                                        <i class="fa fa-arrow-left"></i> &nbsp; Thay đổi địa chỉ </a>
                                </div>
                                <div class="pull-right">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-small" type="submit" value="ttnhanhang">
                                        Thanh toán khi nhận hàng &nbsp; <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="pull-right" style="margin-right: 5px;">
                                    <input type="text" id="tongtien-onepay" name="tongtien_onepay">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-success btn-small" type="submit" value="ttonepay">
                                        Thanh toán OnePay &nbsp; <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- <form action="user/onepay_payment" method="POST">
                        
                    </form> -->
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
            <div class="w100 cartMiniTable">
                <table id="cart-summary" class="std table">
                    <tbody>
                        <tr>
                            <h2><strong>TỔNG TIỀN</strong></h2>
                        </tr>
                        <hr>
                        <tr>
                            <div><b> Tổng tiền <i>(Đã bao gồm khuyến mãi)</i></b></div>
                            <br>
                            <span class="site-color">
                                <div class=" site-color" id="total-price"></div> VNĐ
                            </span>

                        </tr>
                    </tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
</div>

<script>
    //set timeout cho thông báo
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);

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
        $('#total-price').html(formatNumber(tong));
        $('#tongtien-onepay').val(tong);
    });
</script>