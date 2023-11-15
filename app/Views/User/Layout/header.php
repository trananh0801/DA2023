<style>
	.imgCart {
		width: 70px;
		height: 60px;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
        padding-left: 5px;
	}

	.imgCart img {
		width: 100% !important;
		height: 100% !important;
		object-fit: cover !important;
		/* Cắt hoặc mở rộng hình ảnh để vừa với kích thước được xác định */
		object-position: center center !important;
		display: block !important;
	}
</style>
<!-- Fixed navbar start -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                    <div class="pull-left ">
                        <ul class="userMenu ">
                            <li class="phone-number">
                                <a href="callto:+12025550151">
                                    <span> <i class="glyphicon glyphicon-phone-alt "></i></span>
                                    <span class="hidden-xs" style="margin-left:5px"> +84 35 612 674 </span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li><a href="user/account"><span class="hidden-xs"> Cá nhân</span> <i class="glyphicon glyphicon-user hide visible-xs "></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">Đăng nhập</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a></li>
                            <li class="hidden-xs"><a href="#" data-toggle="modal" data-target="#ModalSignup">Đăng ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.navbar-top-->

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> ($210.00) </span></button>
            <a class="navbar-brand " href="user/home"> NANA HOUSE </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
                <!-- /input-group -->

            </div>
        </div>

        <!-- this part is duplicate from cartMenu  keep it for mobile -->
        <!-- <div class="navbar-cart  collapse">
            <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">
                <div class="w100 miniCartTable scroll-pane">
                    <table>
                        <tbody>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/3.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/2.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/5.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/3.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/3.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    <div><a href="product-details.html"> <img src="images/product/4.jpg" alt="img"> </a>
                                    </div>
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="product-details.html"> TSHOP T shirt Black </a></h4>
                                        <span class="size"> 12 x 1.5 L </span>

                                        <div class="price"><span> $8.80 </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                <td style="width:5%" class="delete"><a> x </a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="miniCartFooter  miniCartFooterInMobile text-right">
                    <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                    <a class="btn btn-sm btn-danger" href="cart.html"> <i class="fa fa-shopping-cart"> </i> VIEW CART
                    </a> <a href="checkout-0.html" class="btn btn-sm btn-primary"> CHECKOUT </a>
                </div>

            </div>
        </div> -->
        <!--/.navbar-cart-->

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="user/home"> TRANG CHỦ </a></li>
                <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> SẢN PHẨM<b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content ">
                            <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                <li>
                                    <p><strong> Nhóm sản phẩm </strong></p>
                                </li>
                                <?php foreach ($groups as $group) : ?>
                                    <li><a href="#"><?= $group['sTenNhom'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                <li class="dropdown megamenu-80width "><a data-toggle="dropdown" class="dropdown-toggle" href="#"> KHUYẾN MÃI
                        <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <!-- megamenu-content -->
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled noMarginLeft">

                                <li>
                                    <p><strong> Khuyến mãi sản phẩm </strong></p>
                                </li>
                                <?php foreach ($promotions as $promotion) : ?>
                                    <li><a href="#"><?= $promotion['sTenKM'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                <li>
                                    <p><strong> Khuyến mãi tháng </strong></p>
                                </li>
                                <?php foreach ($promotionMonths as $promotionMonth) : ?>
                                    <li><a href="#"><?= $promotionMonth['sTenKM'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=""><a href="user/about-us"> GIỚI THIỆU </a></li>
            </ul>


            <!--- this part will be hidden for mobile version -->
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Giỏ hàng ($210.00) </span> <b class="caret"> </b> </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table>
                                <tbody>
                                    <?php $k = 1 ?>
                                    <?php $k1 = 1 ?>
                                    <?php foreach ($productCarts as $productCart) : ?>
                                        <tr class="miniCartProduct cart-<?= $k++ ?>" data-index="<?= $k1++ ?>">
                                            <td style="width:20%" class="miniCartProductThumb">
                                                <div><a href="user/productDetail/<?= $productCart['PK_iMaSP'] ?>" class="imgCart"> <img src="<?php echo base_url('assets/admin/images/products/' . $productCart['sHinhAnh']) ?>" alt="img">
                                                    </a></div>
                                            </td>
                                            <td style="width:40%">
                                                <div class="miniCartDescription">
                                                    <h4><a href="user/productDetail/<?= $productCart['PK_iMaSP'] ?>"> <?= $productCart['sTenSP'] ?> </a></h4>
                                                    <span class="size"> <?= $productCart['sDVT'] ?> </span>

                                                    <div class="thanhtien"><strong>1.000.000 đ</strong></div>
                                                </div>
                                            </td>
                                            <td style="width:10%">X <span class="miniCartQuantity"><?= $productCart['iSoLuong'] ?></span> </td>
                                            <td style="width:15%"> <span class="miniCartSubtotal"><?= $productCart['fGiaBanLe'] ?></span>  đ</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!--/.miniCartTable-->

                        <div class="miniCartFooter text-right">
                            <h3 class="text-right subtotal"> Tổng cộng: 600.000 VNĐ </h3>
                            <a class="btn btn-sm btn-danger" href="user/cart"> <i class="fa fa-shopping-cart"> </i> Xem tất cả </a><a class="btn btn-sm btn-primary" href="user/checkout"> Thanh toán </a>
                        </div>
                        <!--/.miniCartFooter-->
                    </div>
                    <!--/.dropdown-menu-->
                </div>
                <!--/.cartMenu-->

                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                    </div>
                    <!-- /input-group -->

                </div>
                <!--/.search-box -->
            </div>
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->

    <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>

        <div class="searchInputBox pull-right">
            <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
            <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </div>
    </div>
    <!--/.search-full-->

</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        soluong = $('.miniCartQuantity').text();
        dongia = $('.miniCartSubtotal').text();
        console.log(soluong);
        // $('.thanhtien').html(soluong*dongia);
    });
</script>