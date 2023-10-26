<div class="banner">
        <div class="full-container">
            <div class="slider-content">
                <ul id="pager2" class="container">
                </ul>
                <!-- prev/next links -->
                <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>

                <div class="slider slider-v1" data-cycle-swipe=true data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-loader="wait">
                    <div class="slider-item slider-item-img1"><img src="assets/user/images/slider/slider0.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                    </div>
                    <div class="slider-item slider-item-img1">
                        <div class="sliderInfo">
                            <div class="container">
                                <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                                    <div class="inner text-center">
                                        <div class="topAnima animated">
                                            <h1 class="uppercase xlarge">FREE SHIPPING</h1>

                                            <h3 class="hidden-xs"> Free Standard Shipping on Orders Over $100 </h3>
                                        </div>
                                        <a class="btn btn-danger btn-lg bottomAnima animated opacity0">SHOP NOW ON TSHOP
                                            <span class="arrowUnicode">►</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="assets/user/images/slider/slider2.jpg" class="img-responsive parallaximg sliderImg" alt="img">
                    </div>
                    <!--/.slider-item-->

                    <div class="slider-item slider-item-img2 ">
                        <div class="sliderInfo">
                            <div class="container">
                                <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull  ">
                                    <div class="inner dark maxwidth500 text-center animated topAnima">
                                        <div class=" ">
                                            <h1 class="uppercase xlarge"> CUSTOM HTML BLOCK</h1>

                                            <h3 class="hidden-xs"> Custom Slides to Your Slider </h3>
                                        </div>
                                        <a class="btn btn-danger btn-lg">SHOP NOW ON TSHOP <span class="arrowUnicode">►</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="assets/user/images/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img">
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

        <!-- Main component call to action -->

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
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html" data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/12.jpg" alt="img" class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span> <span class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html"><?= $newProduct['sTenSP'] ?> </a></h4>

                            <p><?= $newProduct['sGhiChu'] ?></p>
                        </div>
                        <div class="price"><span><?= $newProduct['fGiaBanLe'] ?> VNĐ</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Thêm vào giỏ hàng </span> </a></div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <!--/.productslider-->

        </div>
        <!--/.featuredPostContainer-->
    </div>
    <!-- /main container -->

    <div class="parallax-section parallax-image-1">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="parallax-content clearfix">
                        <h1 class="parallaxPrce"> $200 </h1>

                        <h2 class="uppercase">FREE INTERNATIONAL SHIPPING! Get Free Shipping Coupons</h2>

                        <h3> Energistically develop parallel mindshare rather than premier deliverables. </h3>

                        <div style="clear:both"></div>
                        <a class="btn btn-discover "> <i class="fa fa-shopping-cart"></i> SHOP NOW </a>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.parallax-image-1-->

    <div class="container main-container">


        <!-- Demo Features Content start -->

        <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
            <!-- this div is for demo || Please remove it when use this page -->

            <h3 class="section-title style2 text-center"><span>NEW FEATURES</span></h3>

            <div class="container">
                <div class="row xsResponse categoryProduct">


                    <div class="item itemauto col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>


                            <div class="imageHover">

                                <div class="promotion"><span class="discount">15% OFF</span></div>

                                <div id="carousel-id-1" class="carousel slide" data-ride="carousel" data-interval="0">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-id-1" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-id-1" data-slide-to="1"></li>
                                        <li data-target="#carousel-id-1" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active"><a href="product-details.html"> <img src="images/product/5.jpg" alt="img" class="img-responsive "></a></div>
                                        <div class="item"><a href="product-details.html"> <img src="images/product/21.jpg" alt="img" class="img-responsive "></a>
                                        </div>
                                        <div class="item"><a href="product-details.html"> <img src="images/product/30.jpg" alt="img" class="img-responsive "></a>
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-id-1" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-id-1" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


                            </div>


                            <div class="description">
                                <h4><a href="product-details.html"> Product Slider </a></h4>

                                <div class="grid-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                                <div class="list-description">
                                    <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                        fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                        odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                        vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                        sit amet placerat elit. </p>
                                </div>
                                <span class="size">XL / XXL / S </span>
                            </div>
                            <div class="price"><span>$25</span></div>
                            <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                        </div>
                    </div>
                    <!--/.item-->


                    <div class="item itemauto col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>


                            <div class="imageHover">

                                <div id="carousel-id-2" class="carousel slide carousel-fade" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-id-2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-id-2" data-slide-to="1"></li>
                                        <li data-target="#carousel-id-2" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active"><a href="product-details.html"> <img src="images/product/22.jpg" alt="img" class="img-responsive "></a></div>
                                        <div class="item"><a href="product-details.html"> <img src="images/product/5.jpg" alt="img" class="img-responsive "></a>
                                        </div>
                                        <div class="item"><a href="product-details.html"> <img src="images/product/18.jpg" alt="img" class="img-responsive "></a>
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-id-2" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-id-2" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


                            </div>


                            <div class="description">
                                <h4><a href="product-details.html"> Slider FadeIn </a></h4>

                                <div class="grid-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                                <div class="list-description">
                                    <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                        fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                        odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                        vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                        sit amet placerat elit. </p>
                                </div>
                                <span class="size">XL / XXL / S </span>
                            </div>
                            <div class="price"><span>$25</span></div>
                            <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                        </div>
                    </div>

                    <!--/.item-->
                    <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>


                            <div class="imageHover">
                                <a href="product-details.html">
                                    <img src="images/product/12.jpg" alt="img" class="img-responsive primaryImage">
                                    <img src="images/product/21.jpg" alt="img" class="img-responsive secondaryImage"></a>

                                <div class="promotion"><span class="discount">15% OFF</span></div>
                            </div>


                            <div class="description">
                                <h4><a href="product-details.html"> Hover FadeIn </a></h4>

                                <div class="grid-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                                <div class="list-description">
                                    <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                        fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                        odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                        vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                        sit amet placerat elit. </p>
                                </div>
                                <span class="size">XL / XXL / S </span>
                            </div>
                            <div class="price"><span>$25</span></div>
                            <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                        </div>
                    </div>
                    <!--/.item-->

                    <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="product">
                            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>


                            <div class="imageHover imageHoverFlip">
                                <a href="product-details.html"><img src="images/product/7.jpg" alt="img" class="img-responsive primaryImage">
                                    <img src="images/product/13.jpg" alt="img" class="img-responsive secondaryImage"></a>

                                <div class="promotion"><span class="discount">15% OFF</span></div>
                            </div>


                            <div class="description">
                                <h4><a href="product-details.html"> Hover Flip </a></h4>

                                <div class="grid-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                </div>
                                <div class="list-description">
                                    <p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel
                                        fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin
                                        odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit
                                        vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent
                                        sit amet placerat elit. </p>
                                </div>
                                <span class="size">XL / XXL / S </span>
                            </div>
                            <div class="price"><span>$25</span></div>
                            <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                        </div>
                    </div>
                    <!--/.item-->


                </div>
            </div>

        </div>
        <!-- Demo Features Content end -->


        <!--/.featuredPostContainer-->

        <hr class="no-margin-top">
        <div class="width100 section-block ">
            <div class="row featureImg">
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-1.jpg" class="img-responsive" alt="img"></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-2.jpg" class="img-responsive" alt="img"></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-3.jpg" class="img-responsive" alt="img"></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-4.jpg" class="img-responsive" alt="img"></a>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.section-block-->

        <div class="width100 section-block">
            <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-left"></i> </a></h3>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="no-margin brand-carousel owl-carousel owl-theme">
                        <li><a><img src="images/brand/1.gif" alt="img"></a></li>
                        <li><img src="images/brand/2.png" alt="img"></li>
                        <li><img src="images/brand/3.png" alt="img"></li>
                        <li><img src="images/brand/4.png" alt="img"></li>
                        <li><img src="images/brand/5.png" alt="img"></li>
                        <li><img src="images/brand/6.png" alt="img"></li>
                        <li><img src="images/brand/7.png" alt="img"></li>
                        <li><img src="images/brand/8.png" alt="img"></li>
                        <li><img src="images/brand/1.gif" alt="img"></li>
                        <li><img src="images/brand/2.png" alt="img"></li>
                        <li><img src="images/brand/3.png" alt="img"></li>
                        <li><img src="images/brand/4.png" alt="img"></li>
                        <li><img src="images/brand/5.png" alt="img"></li>
                        <li><img src="images/brand/6.png" alt="img"></li>
                        <li><img src="images/brand/7.png" alt="img"></li>
                        <li><img src="images/brand/8.png" alt="img"></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.section-block-->

    </div>
    <!--main-container-->

    <div class="parallax-section parallax-image-2">
        <div class="w100 parallax-section-overley">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="parallax-content clearfix">
                            <h1 class="xlarge"> Trusted Seller 500+ </h1>
                            <h5 class="parallaxSubtitle"> Lorem ipsum dolor sit amet consectetuer </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.parallax-section-->

    <!-- Product Details Modal  -->
    <!-- Modal -->
    <div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog" aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Modal -->