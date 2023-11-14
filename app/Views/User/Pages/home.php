<style>
	.td_img {
		width: 100%;
		height: 240px;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
        margin-left: -3px;
	}

	.td_img img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* Cắt hoặc mở rộng hình ảnh để vừa với kích thước được xác định */
		object-position: center center;
		display: block;
	}
</style>
<div class="banner">
    <div class="full-container">
        <div class="slider-content">
            <ul id="pager2" class="container">
            </ul>
            <!-- prev/next links -->
            <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>

            <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-loader="wait">
                <div class="slider-item slider-item-img1"><img src="assets/user/images/slider/3.jpg" class="img-responsive parallaximg sliderImg" alt="img" style="width:100%; height:auto">
                </div>
                <div class="slider-item slider-item-img1">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                                <div class="inner text-center">
                                    <div class="topAnima animated">
                                        <h1 class="uppercase xlarge">MIỄN PHÍ SHIP</h1>

                                        <h3 class="hidden-xs"> Miễn phí ship cho đơn hàng tối thiểu 500.000VNĐ </h3>
                                    </div>
                                    <a class="btn btn-danger btn-lg bottomAnima animated opacity0">TRẢI NGHIỆM NGAY
                                        <span class="arrowUnicode">►</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/3.jpg" class="img-responsive parallaximg sliderImg" alt="img" style="width:100%; height:auto">
                </div>
                <!--/.slider-item-->

                <div class="slider-item slider-item-img2 ">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull  ">
                                <div class="inner dark maxwidth500 text-center animated topAnima">
                                    <div class=" ">
                                        <h1 class="uppercase xlarge"> VỚI NHIỀU KHUYẾN MÃI HẤP DẪN</h1>

                                        <h3 class="hidden-xs"> Khuyến mãi khủng cho lần đặt đầu tiên </h3>
                                    </div>
                                    <a class="btn btn-danger btn-lg">TRẢI NGHIỆM NGAY <span class="arrowUnicode">►</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/3.jpg" class="img-responsive parallaximg sliderImg" alt="img" style="width:100%; height:auto">
                </div>
                <!--/.slider-item-->
            </div>
            <!--/.slider slider-v1-->
        </div>
        <!--/.slider-content-->
    </div>
    <!--/.full-container-->
</div>
<!--/.banner style1-->

<div class="container main-container">
    <div class="row featuredPostContainer globalPadding style2">
        <h3 class="section-title style2 text-center"><span>SẢN PHẨM MỚI</span></h3>
        <div id="productslider" class="owl-carousel owl-theme">
            <?php foreach ($newProducts as $newProduct) : ?>
                <div class="item">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image">
                            <!-- <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="user/productDetail/" data-target="#productSetailsModalAjax">Quick View </a>
                            </div> -->
                            <a href="user/productDetail/<?= $newProduct['PK_iMaSP'] ?>" class="td_img"><img src="<?php echo base_url('assets/admin/images/products/' . $newProduct['sHinhAnh']) ?>" alt="img" class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> GIẢM</span> <span class="discount">15% </span></div>
                        </div>
                        <div class="description">
                            <h4><a href="user/productDetail/<?= $newProduct['PK_iMaSP'] ?>"><?= $newProduct['sTenSP'] ?> </a></h4>

                            <p><?= $newProduct['sGhiChu'] ?></p>
                        </div>
                        <div class="price"><span><?= $newProduct['fGiaBanLe'] ?></span></div>
                        <div class="action-control"><a class="btn btn-primary edit" href="#" data-toggle="modal" data-target="#AddCart" data-masanpham="<?= $newProduct['PK_iMaSP'] ?>"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Thêm vào giỏ hàng </span> </a></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- /main container -->

<div class="parallax-section parallax-image-1">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="parallax-content clearfix">
                    <h1 class="parallaxPrce"> 200.000VNĐ </h1>

                    <h2 class="uppercase">KHO KHUYẾN MÃI DÀNH CHO CÁC BA MẸ KHI MUA SẮM TẠI NANA'S HOUSE</h2>

                    <h3> Nhiều ưu đãn hấp dẫn đang chờ các ba mẹ, nhanh tay rinh quà về cho con yêu nhé! </h3>

                    <div style="clear:both"></div>
                    <a class="btn btn-discover "> <i class="fa fa-shopping-cart"></i> KHÁM PHÁ </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.parallax-image-1-->

<div class="container main-container">
    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>SẢN PHẨM BÁN CHẠY NHẤT</span></h3>
        <div class="container">
            <div class="row xsResponse categoryProduct">
                <?php foreach ($sellingProducts as $sellingProduct) : ?>
                    <!--/.item-->
                    <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>
                            <div class="imageHover">
                                <a href="user/productDetail/<?= $sellingProduct['PK_iMaSP'] ?>" class="td_img">
                                    <img src="<?php echo base_url('assets/admin/images/products/' . $sellingProduct['sHinhAnh']) ?>" alt="img" class="img-responsive">
                                    <div class="promotion"><span class="discount">15% OFF</span></div>
                            </div>
                            <div class="description">
                                <h4><a href="user/productDetail/<?= $sellingProduct['PK_iMaSP'] ?>"> <?= $sellingProduct['sTenSP'] ?> </a></h4>

                                <div class="grid-description">
                                    <p><?= $sellingProduct['sGhiChu'] ?> </p>
                                </div>

                            </div>
                            <div class="price"><span><?= $sellingProduct['fGiaBanLe'] ?></span></div>
                            <div class="action-control"><a class="btn btn-primary edit" href="#" data-toggle="modal" data-target="#AddCart" data-masanpham="<?= $sellingProduct['PK_iMaSP'] ?>"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Thêm vào giỏ hàng </span> </a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!--main-container-->

<div class="parallax-section parallax-image-2">
    <div class="w100 parallax-section-overley">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="parallax-content clearfix">
                        <h1 class="xlarge"> HÀNG NGHÌN KHÁCH HÀNG TIN TƯỞNG </h1>
                        <h5 class="parallaxSubtitle"> Hàng nghìn khách hàng đã tin tưởng chọn Nana's House là nơi mua sắm đáng tin cậy </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.parallax-section-->

<!-- Product Details Modal  -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog" aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- Modal thêm vào giỏ hàng  -->
<div class="modal signUpContent fade" id="AddCart" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> Thêm vào giỏ hàng </h3>
            </div>
            <div class="modal-body">
                <form action="user/addCart" method="POST">
                    <div class="form-group login-username">
                        <div>
                            <img src="" alt="img">
                            <div class="description">
                                <h4>Sản phẩm 1</h4>
                                <div class="price"><span>100.000 VNĐ</span></div>
                            </div>
                            <input name="FK_iMaSP" id="masanpham" type="text" hidden>
                            <input name="iSoLuong" id="login-user" class="form-control input" size="20" placeholder="Nhập số lượng" type="number">
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn  btn-block btn-lg btn-primary" value="Thêm vào giỏ hàng" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            masanpham = $(this).attr("data-masanpham");

            $("#masanpham").val(masanpham);
        })
    })
</script>