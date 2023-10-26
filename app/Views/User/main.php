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
    <base href="http://localhost:8080">
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
    <link rel="stylesheet" type="text/css" href="assets/user/assets/css/gray-look.css">
</head>

<body>


    <script type="text/javascript">
        function swapStyleSheet(sheet) {
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>
    <style>
        .themeControll {
            background: #2d3e50;
            height: auto;
            width: 100px;
            position: fixed;
            left: 0;
            padding: 20px;
            top: 20%;
            z-index: 999999;
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
            background: #2D3E50;
            color: #FFFFFF !important;
            font-size: 30px;
            height: auto;
            padding: 10px;
            position: absolute;
            right: -40px;
            top: 0;
            width: 40px;
            cursor: pointer;
        }

        @media (max-width: 780px) {
            .themeControll {
                display: none;
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
            <a style="color:#fff" href="http://templatecycle.com/tshop/v6/index.html"><i class="fa fa-angle-double-left"></i> Theme Chooser </a>
        </h3>
        <p class="tbtn"> <i class="fa fa-angle-double-left"></i></p>
    </div>



    <script type="text/javascript">
        function swapStyleSheet(sheet) {
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>
    <style>
        .themeControll {
            background: #2d3e50;
            height: auto;
            width: 100px;
            position: fixed;
            left: 0;
            padding: 20px;
            top: 20%;
            z-index: 999999;
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
            background: #2D3E50;
            color: #FFFFFF !important;
            font-size: 30px;
            height: auto;
            padding: 10px;
            position: absolute;
            right: -40px;
            top: 0;
            width: 40px;
            cursor: pointer;
        }

        @media (max-width: 780px) {
            .themeControll {
                display: none;
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
            <a style="color:#fff" href="http://templatecycle.com/tshop/v6/index.html"><i class="fa fa-angle-double-left"></i> Theme Chooser </a>
        </h3>
        <p class="tbtn"> <i class="fa fa-angle-double-left"></i></p>
    </div>
    <?= $header ?>
    <?= $content?>
    <?= $footer ?>
    <!-- Le javascript
================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/user/assets/js/jquery/jquery-2.1.3.min.js"></script>
    <script src="assets/user/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // this script required for subscribe modal
        $(window).load(function() {
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