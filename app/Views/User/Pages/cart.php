<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Danh sách sản phẩm đã thêm vào giỏ hàng </span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="user/home"><i class="fa fa-chevron-left"></i> Quay lại trang chủ </a></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <form action="user/updateCart" method="POST">
                        <div class="cartContent w100">
                            <table class="cartTable table-responsive" style="width:100%">
                                <tbody>
                                    <tr class="CartProduct cartTableHeader">
                                        <td style="width:15%"> Sản phẩm</td>
                                        <td style="width:40%">Chi tiết</td>
                                        <td style="width:10%" class="delete">&nbsp;</td>
                                        <td style="width:10%">Số lượng</td>
                                        <!-- <td style="width:10%">Chiết khấu</td> -->
                                        <td style="width:15%">Tổng cộng</td>
                                    </tr>
                                    <?php foreach ($allProductInCarts as $allProductInCart) : ?>
                                        <tr class="CartProduct">
                                            <td class="CartProductThumb">
                                                <div><a href="user/productDetail/<?= $allProductInCart['PK_iMaSP'] ?>"><img src="<?php echo base_url('assets/admin/images/products/' . $allProductInCart['sHinhAnh']) ?>" alt="img"></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="CartDescription">
                                                    <h4><a href="user/productDetail"><?= $allProductInCart['sTenSP'] ?> </a></h4>
                                                    <div class="price"><span><?= $allProductInCart['fGiaBanLe'] ?> VNĐ</span></div>
                                                </div>
                                            </td>
                                            <td class="delete">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="glyphicon glyphicon-trash fa-2x"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <input type="text" value="<?= $allProductInCart['PK_iMaGH'] ?>" name="PK_iMaGH" hidden>
                                                <input type="text" value="<?= $allProductInCart['FK_iMaSP'] ?>" name="FK_iMaSP[]" hidden>
                                                <input class="quanitySniper" type="text" value="<?= $allProductInCart['iSoLuong'] ?>" min="1" name="iSoLuong[]">
                                            </td>
                                            <!-- <td>0</td> -->
                                            <td class="price">1.000.000 VNĐ</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cartFooter w100">
                            <div class="box-footer">
                                <div class="pull-left"><a href="user/home" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Tiếp tục mua sắm </a></div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-undo"></i> &nbsp; Cập nhật giỏ hàng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
            <div class="contentBox">
                <div class="w100 costDetails">
                    <div class="table-block" id="order-detail-content"><a class="btn btn-primary btn-lg btn-block " title="checkout" href="user/checkout" style="margin-bottom:20px"> Thanh toán &nbsp; <i class="fa fa-arrow-right"></i> </a>

                        <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                <tbody>
                                    <tr>
                                        <td>Tổng tiền sản phẩm</td>
                                        <td class="price">25.000.000 VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td class="price"><span class="success">Free shipping!</span></td>
                                    </tr>
                                    <tr>
                                        <td>Sau khi áp dụng khuyến mãi </td>
                                        <td class=" site-color" id="total-price">25.000.000 VNĐ</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
</div>

<!-- Modal xác nhận xóa sản phẩm trong giỏ hàng -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Xóa sản phẩm khỏi giỏ hàng của bạn?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Xóa</button>
            </div>
        </div>
    </div>
</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>