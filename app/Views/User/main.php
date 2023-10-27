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

    <script src="assets/user/assets/js/pace.min.js"></script>

    <!-- add theme styles for this template -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="assets/user/assets/css/skin-10.css">
    <link rel="stylesheet" type="text/css" href="assets/user/assets/css/gray-look.css">
</head>

<body>
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


</html>