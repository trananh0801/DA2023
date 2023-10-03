<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/user/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/user/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/user/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/user/ico/apple-touch-icon-57-precomposed.html">
    <link rel="shortcut icon" href="assets/user/ico/favicon.png">
    <title>NanaHouse - Siêu thị mẹ và bé</title>
    <base href="<?base_url()?>">
    <!-- Bootstrap core CSS -->
    <link href="assets/user/assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="assets/user/assets/css/style.css" rel="stylesheet">

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="assets/user/assets/js/pace.min.js"></script>

<!-- add theme styles for this template -->
<link id="pagestyle" rel="stylesheet" type="text/css" href="assets/user/assets/css/skin-4.css">
<link  rel="stylesheet" type="text/css" href="assets/user/assets/css/gray-look.css">
</head>
<body>
    

    <script type="text/javascript">
        function swapStyleSheet(sheet){
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>    <style>

        .themeControll {
            background:#2d3e50;
            height: auto;
            width:100px;
            position:fixed;
            left:0;
            padding:20px;
            top:20%;
            z-index:999999;
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -o-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
            -ms-filter: none;
            filter: none;
            -webkit-transition: opacity .5s linear, -webkit-transform .7s cubic-bezier(.56, .48, 0, .99);
            -moz-transition: opacity .5s linear, -moz-transform .7s cubic-bezier(.56, .48, 0, .99);
            -o-transition: opacity .5s linear, -o-transform .7s cubic-bezier(.56, .48, 0, .99);
            -ms-transition: opacity .5s linear, -ms-transform .7s cubic-bezier(.56, .48, 0, .99);
            transition: opacity .5s linear, transform .7s cubic-bezier(.56, .48, 0, .99);
        }

        .themeControll.active {
            display: block;
            -webkit-transform: translateX(-100px);
            -moz-transform: translateX(-100px);
            -o-transform: translateX(-100px);
            -ms-transform: translateX(-1020px);
            transform: translateX(-100px);
            -webkit-transition: opacity .5s linear, -webkit-transform .7s cubic-bezier(.56, .48, 0, .99);
            -moz-transition: opacity .5s linear, -moz-transform .7s cubic-bezier(.56, .48, 0, .99);
            -o-transition: opacity .5s linear, -o-transform .7s cubic-bezier(.56, .48, 0, .99);
            -ms-transition: opacity .5s linear, -ms-transform .7s cubic-bezier(.56, .48, 0, .99);
            transition: opacity .5s linear, transform .7s cubic-bezier(.56, .48, 0, .99);

        }

        .themeControll a {
            border-radius: 3px;
            clear: both;
            display: block;
            height: 25px;
            margin-bottom: 4px;
            width: 50px;
        }

        .tbtn {
            background:#2D3E50;
            color: #FFFFFF !important;
            font-size: 30px;
            height: auto;
            padding: 10px;
            position: absolute;
            right: -40px;
            top: 0;
            width: 40px;
            cursor:pointer;
        }

        @media (max-width: 780px) {
            .themeControll {
                display:none;
            }
        }

    </style>

    <div class="themeControll">
        <h3 style="width: 60px; font-size: 10px; line-height: 12px;" class="uppercase color-white text-center"> Choose your colour </h3>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-1.css')" style="background:#4ec67f;border-top: 12px solid #27AE60;"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-8.css')" style="background:#3BCA95;border-top: 12px solid #34BC8A"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/user/')" style="background:#1ABC9C;border-top: 12px solid #16A085"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-3.css')" style="background:#3498DB;border-top: 12px solid #2980B9"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-4.css')" style="background:#9B59B6;border-top: 12px solid #9149AF"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-5.css')" style="background:#E74C3C;border-top: 12px solid #C0392B"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-7.css')" style="background:#95A5A6;border-top: 12px solid #7F8C8D"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-9.css')" style="background:#F7B529;border-top: 12px solid #E78E00"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-10.css')" style="background:#F17370;border-top: 12px solid #F26663"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-11.css')" style="background:#273646;border-top: 12px solid #2ECC71"> </a>
        <a onclick="swapStyleSheet('assets/user/assets/css/skin-6.css')" style="background:#34495E;border-top: 12px solid #283949"> </a>
        <h3 style="width: 60px; font-size: 10px; line-height: 12px;" class="uppercase color-white text-center">
            <br>
            <a style="color:#fff" href="http://templatecycle.com/tshop/v6/index.html"><i class="fa fa-angle-double-left"></i> Theme Chooser </a> </h3>
        <p class="tbtn">  <i class="fa fa-angle-double-left"></i></p>
    </div>



<script type="text/javascript">
    function swapStyleSheet(sheet){
        document.getElementById('pagestyle').setAttribute('href', sheet);
    }
</script>    <style>

    .themeControll {
        background:#2d3e50;
        height: auto;
        width:100px;
        position:fixed;
        left:0;
        padding:20px;
        top:20%;
        z-index:999999;
        -webkit-transform: translateX(0);
        -moz-transform: translateX(0);
        -o-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
        opacity: 1;
        -ms-filter: none;
        filter: none;
        -webkit-transition: opacity .5s linear, -webkit-transform .7s cubic-bezier(.56, .48, 0, .99);
        -moz-transition: opacity .5s linear, -moz-transform .7s cubic-bezier(.56, .48, 0, .99);
        -o-transition: opacity .5s linear, -o-transform .7s cubic-bezier(.56, .48, 0, .99);
        -ms-transition: opacity .5s linear, -ms-transform .7s cubic-bezier(.56, .48, 0, .99);
        transition: opacity .5s linear, transform .7s cubic-bezier(.56, .48, 0, .99);
    }

    .themeControll.active {
        display: block;
        -webkit-transform: translateX(-100px);
        -moz-transform: translateX(-100px);
        -o-transform: translateX(-100px);
        -ms-transform: translateX(-1020px);
        transform: translateX(-100px);
        -webkit-transition: opacity .5s linear, -webkit-transform .7s cubic-bezier(.56, .48, 0, .99);
        -moz-transition: opacity .5s linear, -moz-transform .7s cubic-bezier(.56, .48, 0, .99);
        -o-transition: opacity .5s linear, -o-transform .7s cubic-bezier(.56, .48, 0, .99);
        -ms-transition: opacity .5s linear, -ms-transform .7s cubic-bezier(.56, .48, 0, .99);
        transition: opacity .5s linear, transform .7s cubic-bezier(.56, .48, 0, .99);

    }

    .themeControll a {
        border-radius: 3px;
        clear: both;
        display: block;
        height: 25px;
        margin-bottom: 4px;
        width: 50px;
    }

    .tbtn {
        background:#2D3E50;
        color: #FFFFFF !important;
        font-size: 30px;
        height: auto;
        padding: 10px;
        position: absolute;
        right: -40px;
        top: 0;
        width: 40px;
        cursor:pointer;
    }

    @media (max-width: 780px) {
        .themeControll {
            display:none;
        }
    }

</style>

<div class="themeControll">
    <h3 style="width: 60px; font-size: 10px; line-height: 12px;" class="uppercase color-white text-center"> Choose your colour </h3>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-1.css')" style="background:#4ec67f;border-top: 12px solid #27AE60;"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-8.css')" style="background:#3BCA95;border-top: 12px solid #34BC8A"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-2.css')" style="background:#1ABC9C;border-top: 12px solid #16A085"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-3.css')" style="background:#3498DB;border-top: 12px solid #2980B9"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-4.css')" style="background:#9B59B6;border-top: 12px solid #9149AF"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-5.css')" style="background:#E74C3C;border-top: 12px solid #C0392B"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-7.css')" style="background:#95A5A6;border-top: 12px solid #7F8C8D"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-9.css')" style="background:#F7B529;border-top: 12px solid #E78E00"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-10.css')" style="background:#F17370;border-top: 12px solid #F26663"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-11.css')" style="background:#273646;border-top: 12px solid #2ECC71"> </a>
    <a onclick="swapStyleSheet('assets/user/assets/css/skin-6.css')" style="background:#34495E;border-top: 12px solid #283949"> </a>
    <h3 style="width: 60px; font-size: 10px; line-height: 12px;" class="uppercase color-white text-center">
        <br>
        <a style="color:#fff" href="http://templatecycle.com/tshop/v6/index.html"><i class="fa fa-angle-double-left"></i> Theme Chooser </a> </h3>
    <p class="tbtn">  <i class="fa fa-angle-double-left"></i></p>
</div>





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
                                    <span class="hidden-xs" style="margin-left:5px"> +84 35 612 674 </span> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li><a href="account-1.html"><span class="hidden-xs"> Cá nhân</span> <i
                                    class="glyphicon glyphicon-user hide visible-xs "></i></a></li>
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span
                    class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i
                    class="fa fa-shopping-cart colorWhite"> </i> <span
                    class="cartRespons colorWhite"> ($210.00) </span></button>
            <a class="navbar-brand " href="index.html"> NANA HOUSE </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
                <!-- /input-group -->

            </div>
        </div>

        <!-- this part is duplicate from cartMenu  keep it for mobile -->
        <div class="navbar-cart  collapse">
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
                <!--/.miniCartTable-->

                <div class="miniCartFooter  miniCartFooterInMobile text-right">
                    <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                    <a class="btn btn-sm btn-danger" href="cart.html"> <i class="fa fa-shopping-cart"> </i> VIEW CART
                    </a> <a href="checkout-0.html"
                            class="btn btn-sm btn-primary"> CHECKOUT </a></div>
                <!--/.miniCartFooter-->

            </div>
            <!--/.cartMenu-->
        </div>
        <!--/.navbar-cart-->

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"> TRANG CHỦ </a></li>
                <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> SẢN PHẨM<b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content ">
                            <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                <li class="no-border">
                                    <p class="promo-1"><strong> SẢN PHẨM </strong></p>
                                </li>
                                <li><a href="category.html"> KHUYẾN MÃI </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="images/site/promo1.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> JEANS </span>
                                </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="images/site/promo2.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i
                                        class="fa fa-caret-right"> </i> PARTY DRESS </span> </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="images/site/promo3.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> SHOES </span>
                                </a></li>
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
                                    <p><strong> Women Collection </strong></p>
                                </li>
                                <li><a href="#"> Kameez </a></li>
                                <li><a href="#"> Tops </a></li>
                                <li><a href="#"> Shoes </a></li>
                                <li><a href="#"> T shirt </a></li>
                                <li><a href="#"> TSHOP </a></li>
                                <li><a href="#"> Party Dress </a></li>
                                <li><a href="#"> Women Fragrances </a></li>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                <li>
                                    <p><strong> Men Collection </strong></p>
                                </li>
                                <li><a href="#"> Panjabi </a></li>
                                <li><a href="#"> Male Fragrances </a></li>
                                <li><a href="#"> Scarf </a></li>
                                <li><a href="#"> Sandal </a></li>
                                <li><a href="#"> Underwear </a></li>
                                <li><a href="#"> Winter Collection </a></li>
                                <li><a href="#"> Men Accessories </a></li>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                <li>
                                    <p><strong> Top Brands </strong></p>
                                </li>
                                <li><a href="#"> Diesel </a></li>
                                <li><a href="#"> Farah </a></li>
                                <li><a href="#"> G-Star RAW </a></li>
                                <li><a href="#"> Lyle & Scott </a></li>
                                <li><a href="#"> Pretty Green </a></li>
                                <li><a href="#"> TSHOP </a></li>
                                <li><a href="#"> TANJIM </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                <li class="no-margin productPopItem "><a href="product-details.html"> <img
                                        class="img-responsive" src="images/site/g4.jpg" alt="img"> </a> <a
                                        class="text-center productInfo alpha90" href="product-details.html"> Eodem modo
                                    typi <br>
                                    <span> $60 </span> </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                <li class="no-margin productPopItem relative"><a href="product-details.html"> <img
                                        class="img-responsive" src="images/site/g5.jpg" alt="img"> </a> <a
                                        class="text-center productInfo alpha90" href="product-details.html"> Eodem modo
                                    typi <br>
                                    <span> $60 </span> </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>


            <!--- this part will be hidden for mobile version -->
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-shopping-cart"> </i> <span class="cartRespons"> Cart ($210.00) </span> <b
                        class="caret"> </b> </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table>
                                <tbody>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="product-details.html"> <img src="images/product/3.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="product-details.html"> TSHOP Tshirt DO9 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $22 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $33 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                <tr class="miniCartProduct">
                                    <td style="width:20%" class="miniCartProductThumb">
                                        <div><a href="product-details.html"> <img src="images/product/2.jpg" alt="img">
                                        </a></div>
                                    </td>
                                    <td style="width:40%">
                                        <div class="miniCartDescription">
                                            <h4><a href="product-details.html"> TShir TSHOP 09 </a></h4>
                                            <span class="size"> 12 x 1.5 L </span>

                                            <div class="price"><span> $15 </span></div>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="miniCartQuantity"><a> X 1 </a></td>
                                    <td style="width:15%" class="miniCartSubtotal"><span> $120 </span></td>
                                    <td style="width:5%" class="delete"><a> x </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/.miniCartTable-->

                        <div class="miniCartFooter text-right">
                            <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                            <a class="btn btn-sm btn-danger" href="cart.html"> <i class="fa fa-shopping-cart"> </i> VIEW
                                CART </a><a
                                class="btn btn-sm btn-primary"> CHECKOUT </a></div>
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
            <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search"
                   class="search-input">
            <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </div>
    </div>
    <!--/.search-full-->

</div>
<!-- /.Fixed navbar  -->

<div class="banner">
    <div class="full-container">
        <div class="slider-content">
            <ul id="pager2" class="container">
            </ul>
            <!-- prev/next links -->

            <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span
                class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>

            <div class="slider slider-v1"
                 data-cycle-swipe=true
                 data-cycle-prev=".prevControl"
                 data-cycle-next=".nextControl" data-cycle-loader="wait">
                <div class="slider-item slider-item-img1"><img src="assets/user/images/slider/slider0.jpg"
                                                               class="img-responsive parallaximg sliderImg" alt="img">
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
                                        <span class="arrowUnicode">►</span></a></div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/slider1.jpg" class="img-responsive parallaximg sliderImg" alt="img"></div>
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
                                    <a class="btn btn-danger btn-lg">SHOP NOW ON TSHOP <span
                                            class="arrowUnicode">►</span></a></div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img"></div>
                <!--/.slider-item-->

                <div class="slider-item slider-item-img3 ">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                                <div class="inner">
                                    <h1>TSHOP JEANS</h1>

                                    <h3 class="price "> Free Shipping on $100</h3>

                                    <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                        diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat. </p>
                                    <a href="category.html" class="btn btn-primary">SHOP NOW <span class="arrowUnicode">►</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/slider4.jpg" class="img-responsive parallaximg sliderImg" alt="img"></div>
                <!--/.slider-item-->

                <div class="slider-item slider-item-img3">
                    <div class="sliderInfo">
                        <div class="container">
                            <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5 pull-left sliderText blankstyle transformRight">
                                <div class="inner text-right"><img src="assets/user/images/slider/color.png" class="img-responsive"
                                                                   alt="img"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-7   pull-left sliderText blankstyle color-white">
                                <div class="inner">
                                    <h1 class="uppercase topAnima animated ">10+ Amazing Color Theme</h1>

                                    <p class="bot tomAnima animated opacity0 hidden-xs"> Fully responsive bootstrap
                                        Ecommerce Template. Available in 10+ color schemes and easy to set. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/user/images/slider/6.jpg" class="img-responsive parallaximg sliderImg" alt="img"></div>
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
        <h3 class="section-title style2 text-center"><span>NEW ARRIVALS</span></h3>

        <div id="productslider" class="owl-carousel owl-theme">
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/34.jpg" alt="img"
                                                            class="img-responsive"></a>

                        <div class="promotion"><span class="new-product"> NEW</span> <span
                                class="discount">15% OFF</span></div>
                    </div>
                    <div class="description">
                        <h4><a href="product-details.html">consectetuer adipiscing </a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/30.jpg" alt="img"
                                                            class="img-responsive"></a>

                        <div class="promotion"><span class="discount">15% OFF</span></div>
                    </div>
                    <div class="description">
                        <h4><a href="product-details.html">luptatum zzril delenit</a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="assets/user/images/product/36.jpg" alt="img"
                                                            class="img-responsive"></a>

                        <div class="promotion"><span class="new-product"> NEW</span></div>
                    </div>
                    <div class="description">
                        <h4><a href="product-details.html">eleifend option </a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="assets/user/images/product/9.jpg" alt="img" class="img-responsive"></a>
                    </div>
                    <div class="description">
                        <h4><a href="product-details.html">mutationem consuetudium </a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/12.jpg" alt="img"
                                                            class="img-responsive"></a></div>
                    <div class="description">
                        <h4><a href="product-details.html">sequitur mutationem </a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/13.jpg" alt="img"
                                                            class="img-responsive"></a></div>
                    <div class="description">
                        <h4><a href="product-details.html">consuetudium lectorum.</a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/21.jpg" alt="img"
                                                            class="img-responsive"></a></div>
                    <div class="description">
                        <h4><a href="product-details.html">parum claram</a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/24.jpg" alt="img"
                                                            class="img-responsive"></a></div>
                    <div class="description">
                        <h4><a href="product-details.html">duis dolore </a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>

                    <div class="image">
                        <div class="quickview">
                            <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                               data-target="#productSetailsModalAjax">Quick View </a>
                        </div>
                        <a href="product-details.html"><img src="images/product/15.jpg" alt="img"
                                                            class="img-responsive"></a></div>
                    <div class="description">
                        <h4><a href="product-details.html">feugait nulla facilisi</a></h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <span class="size">XL / XXL / S </span></div>
                    <div class="price"><span>$25</span></div>
                    <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                            class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>
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
                    <a class="btn btn-discover "> <i class="fa fa-shopping-cart"></i> SHOP NOW </a></div>
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
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
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
                                    <div class="item active"><a href="product-details.html"> <img
                                            src="images/product/5.jpg" alt="img" class="img-responsive "></a></div>
                                    <div class="item"><a href="product-details.html"> <img src="images/product/21.jpg"
                                                                                           alt="img"
                                                                                           class="img-responsive "></a>
                                    </div>
                                    <div class="item"><a href="product-details.html"> <img src="images/product/30.jpg"
                                                                                           alt="img"
                                                                                           class="img-responsive "></a>
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
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->


                <div class="item itemauto col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
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
                                    <div class="item active"><a href="product-details.html"> <img
                                            src="images/product/22.jpg" alt="img" class="img-responsive "></a></div>
                                    <div class="item"><a href="product-details.html"> <img src="images/product/5.jpg"
                                                                                           alt="img"
                                                                                           class="img-responsive "></a>
                                    </div>
                                    <div class="item"><a href="product-details.html"> <img src="images/product/18.jpg"
                                                                                           alt="img"
                                                                                           class="img-responsive "></a>
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
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>

                <!--/.item-->
                <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
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
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->

                <div class="item itemauto  col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>


                        <div class="imageHover imageHoverFlip">
                            <a href="product-details.html"><img src="images/product/7.jpg" alt="img"
                                                                class="img-responsive primaryImage">
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
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->


            </div>
        </div>

    </div>
    <!-- Demo Features Content end -->

    <!-- Main component call to action -->

    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>FEATURES PRODUCT</span></h3>

        <div class="container">
            <div class="row xsResponse equalHeightCategoryProduct">
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/30.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span> <span
                                    class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">aliquam erat volutpat</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/31.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">ullamcorper suscipit lobortis </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/34.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">demonstraverunt lectores </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/12.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">humanitatis per</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/33.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">Eodem modo typi</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/10.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">sequitur mutationem </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/37.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">consuetudium lectorum.</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/35.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">parum claram</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/13.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="product-details.html">duis dolore </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/21.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span> <span
                                    class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">aliquam erat volutpat</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/14.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">ullamcorper suscipit lobortis </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="product-details.html"><img src="images/product/17.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html">demonstraverunt lectores </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="load-more-block text-center"><a class="btn btn-thin" href="#"> <i
                        class="fa fa-plus-sign">+</i> load more products</a></div>
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.featuredPostContainer-->

    <hr class="no-margin-top">
    <div class="width100 section-block ">
        <div class="row featureImg">
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-1.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-2.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-3.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6"><a href="category.html"><img src="images/site/new-collection-4.jpg"
                                                                                 class="img-responsive" alt="img"></a>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.section-block-->

    <div class="width100 section-block">
        <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-left"></i> </a></h3>

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
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Support </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Lorem ipsum dolor sit amet, consectetur </p>
                            <h4><a class="inline" href="callto:+12025550151"> <strong> <i class="fa fa-phone"> </i>
                                +1-202-555-0151 </strong> </a></h4>
                            <h4><a class="inline" href="mailto:help@yourweb.com"> <i class="fa fa-envelope-o"> </i>
                                help@yourweb.com </a></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Shop </h3>
                    <ul>
                        <li><a href="#">
                            Men's
                        </a></li>
                        <li><a href="#">
                            Women's</a></li>
                        <li><a href="#">
                            Kids'
                        </a></li>
                        <li><a href="#">Shoes
                        </a></li>
                        <li><a href="#">
                            Gift Cards
                        </a></li>

                    </ul>

                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Information </h3>
                    <ul class="list-unstyled footer-nav">
                        <li><a href="#">Questions?
                        </a></li>

                        <li><a href="#"> Order Status
                        </a></li>
                        <li><a href="#"> Sizing Charts
                        </a></li>
                        <li><a href="#"> Return Policy </a></li>
                        <li><a href="#">
                            Contact Us
                        </a></li>

                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> My Account </h3>
                    <ul>
                        <li><a href="account.html"> My Account </a></li>
                        <li><a href="my-address.html"> My Address </a></li>
                        <li><a href="wishlist.html"> Wish List </a></li>
                        <li><a href="order-list.html"> Order list </a></li>
                        <li><a href="order-status.html"> Order Status </a></li>
                    </ul>
                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Stay in touch </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  bg-gray" type="button"> Subscribe <i
                                        class="fa fa-long-arrow-right"> </i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                        <li><a href="http://facebook.com/"> <i class=" fa fa-facebook"> &nbsp; </i> </a></li>
                        <li><a href="http://twitter.com/"> <i class="fa fa-twitter"> &nbsp; </i> </a></li>
                        <li><a href="https://plus.google.com/"> <i class="fa fa-google-plus"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com/"> <i class="fa fa-pinterest"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com/"> <i class="fa fa-youtube"> &nbsp; </i> </a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; TSHOP 2014. All right reserved. </p>

            <div class="pull-right paymentMethodImg"><img height="30" class="pull-right"
                                                          src="images/site/payment/master_card.png" alt="img"> <img
                    height="30" class="pull-right" src="images/site/payment/visa_card.png" alt="img"><img height="30"
                                                                                                          class="pull-right"
                                                                                                          src="images/site/payment/paypal.png"
                                                                                                          alt="img">
                <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img"> <img
                        height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img">
                <img height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img">

            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>





<!-- Modal Login start -->
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> Login to TSHOP </h3>
            </div>
            <div class="modal-body">
                <div class="form-group login-username">
                    <div>
                        <input name="log" id="login-user" class="form-control input" size="20"
                               placeholder="Enter Username" type="text">
                    </div>
                </div>
                <div class="form-group login-password">
                    <div>
                        <input name="Password" id="login-password" class="form-control input" size="20"
                               placeholder="Password" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <div class="checkbox login-remember">
                            <label>
                                <input name="rememberme" value="forever" checked="checked" type="checkbox">
                                Remember Me </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" type="submit">
                    </div>
                </div>
                <!--userForm-->

            </div>
            <div class="modal-footer">
                <p class="text-center"> Not here before? <a data-toggle="modal" data-dismiss="modal"
                                                            href="#ModalSignup"> Sign Up. </a> <br>
                    <a href="forgot-password.html"> Lost your password? </a></p>
            </div>
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- /.Modal Login -->

<!-- Modal Signup start -->
<div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> REGISTER </h3>
            </div>
            <div class="modal-body">
                <div class="control-group"><a class="fb_button btn  btn-block btn-lg " href="#"> SIGNUP WITH
                    FACEBOOK </a></div>
                <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>

                <div class="form-group reg-username">
                    <div>
                        <input name="login" class="form-control input" size="20" placeholder="Enter Username"
                               type="text">
                    </div>
                </div>
                <div class="form-group reg-email">
                    <div>
                        <input name="reg" class="form-control input" size="20" placeholder="Enter Email" type="text">
                    </div>
                </div>
                <div class="form-group reg-password">
                    <div>
                        <input name="password" class="form-control input" size="20" placeholder="Password"
                               type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <div class="checkbox login-remember">
                            <label>
                                <input name="rememberme" id="rememberme" value="forever" checked="checked"
                                       type="checkbox">
                                Remember Me </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit">
                    </div>
                </div>
                <!--userForm-->

            </div>
            <div class="modal-footer">
                <p class="text-center"> Already member? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin">
                    Sign in </a></p>
            </div>
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- /.ModalSignup End -->


<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/user/assets/js/jquery/jquery-2.1.3.min.js"></script>
<script src="assets/user/assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    // this script required for subscribe modal
    $(window).load(function () {
        // full load
        $('#modalAds').modal('show');
        $('#modalAds').removeClass('hide');
    });

</script>

<!-- include jqueryCycle plugin -->
<script src="assets/user/assets/js/jquery.cycle2.min.js"></script>

<!-- include easing plugin -->
<script src="assets/user/assets/js/jquery.easing.1.3.js"></script>

<!-- include  parallax plugin -->
<script type="text/javascript" src="assets/user/assets/js/jquery.parallax-1.1.js"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="assets/user/assets/js/helper-plugins/jquery.mousewheel.min.js"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->

<script type="text/javascript" src="assets/user/assets/js/jquery.mCustomScrollbar.js"></script>

<!-- include icheck plugin // customized checkboxes and radio buttons   -->
<script type="text/javascript" src="assets/user/assets/plugins/icheck-1.x/icheck.min.js"></script>

<!-- include grid.js // for equal Div height  -->
<script src="assets/user/assets/plugins/jquery-match-height-master/dist/jquery.matchHeight-min.js"></script>
<script src="assets/user/assets/js/grids.js"></script>

<!-- include carousel slider plugin  -->
<script src="assets/user/assets/js/owl.carousel.min.js"></script>

<!-- jQuery select2 // custom select   -->
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="assets/user/assets/js/bootstrap.touchspin.js"></script>

<!-- include custom script for only homepage  -->
<script src="assets/user/assets/js/home.js"></script>

<script src="assets/user/assets/js/grids.js"></script>
<script src="assets/user/assets/js/enquire.min.js"></script>
<!-- include custom script for site  -->
<script src="assets/user/assets/js/script.js"></script>
<script>

</script>
</body>

<!-- Mirrored from templatecycle.com/tshop/v6/gray/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 09:56:00 GMT -->
</html>
