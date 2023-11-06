<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user.home">Trang chủ</a></li>
                <li><a href="category.html">Sữa bột</a></li>
                <li class="active">Sản phẩm 1</li>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image col-lg-12 no-padding style3">
                <a class="product-largeimg-link" href="product-details.html"><img src="<?= $allProducts['fGiaBanLe'] ?>" class="img-responsive product-largeimg" alt="img" />
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5">
            <h1 class="product-title"> <?= $allProducts['sTenSP'] ?></h1>

            <h3 class="product-code"> Code : <?= $allProducts['PK_iMaSP'] ?></h3>

            <div class="rating">
                <p><span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star-o "></i></span> <span class="ratingInfo"> <span> / </span> <a data-target="#modal-review" data-toggle="modal"> Đánh giá</a> </span></p>
            </div>
            <div class="product-price"><span class="price-sales"> <?= $allProducts['fGiaBanLe'] ?></span> <span class="price-standard">600.000 VNĐ</span>
            </div>
            <div class="details-description">
                <p><?= $allProducts['sGhiChu'] ?> </p>
            </div>

            <!-- <div class="productFilter productFilterLook2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                        <div class="form-group required">
                            <label for="InputLastName">Số lượng <sup>*</sup> </label>
                            <input required type="number" class="form-control" id="InputLastName" placeholder="0">
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- productFilter -->

            <div class="cart-actions">
                <div class="addto row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <button onclick="productAddToCartForm.submit(this);" class="button btn-block btn-cart cart first" title="Add to Cart" type="button">Thêm vào giỏ hàng
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a class="link-wishlist wishlist btn-block ">Mua ngay</a></div>
                </div>
                <div style="clear:both"></div>
            </div>
            <!--/.cart-actions-->

            <!-- <div class="clear"></div>
            <div class="product-tab w100 clearfix">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
                </ul> -->

                <!-- Tab panes -->
                <!-- <div class="tab-content">
                    <div class="tab-pane active" id="details">Đây là mô tả sản phẩm
                    </div>
                    <div class="tab-pane" id="size"> free
                    </div>
                </div> -->
                <!-- /.tab content -->

            <!-- </div> -->
            <!--/.product-tab-->
        </div>
        <!--/ right column end -->

    </div>
    <!--/.row-->

    <div class="row recommended">
        <h1> CÓ THỂ BẠN CŨNG THÍCH </h1>

        <div id="SimilarProductSlider">
        <?php foreach ($getAllProducts as $getAllProduct) : ?>
            <div class="item">
                <div class="product"><a class="product-image"> <img src="<?= $getAllProduct['PK_iMaSP'] ?>" alt="img"> </a>

                    <div class="description">
                        <h4><a href="san-remo-spaghetti.html"><?= $getAllProduct['sTenSP'] ?></a></h4>

                        <div class="price"><span><?= $getAllProduct['fGiaBanLe'] ?></span></div>
                    </div>
                </div>
            </div>
            <!--/.item-->

            <?php endforeach ?>
        </div>
        <!--/.recommended-->

    </div>
    <div style="clear:both"></div>
</div>
<!-- /main-container -->