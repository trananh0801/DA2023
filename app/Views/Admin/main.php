<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.ecommerce-admin.com/demo/page-0-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 02:53:43 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= $title ?></title>
  <base href="http://localhost:8080">


  <link href="assets/admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="assets/admin/css/bootstrapf9e3.css" rel="stylesheet" type="text/css" />


  <!-- custom style -->
  <link href="assets/admin/css/uif9e3.css" rel="stylesheet" type="text/css" />
  <link href="assets/admin/css/responsivef9e3.css" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="assets/admin/fonts/material-icon/css/round.css" />




</head>

<body>

  <b class="screen-overlay"></b>
  <?= $leftMenu ?>
  <main class="main-wrap">
    <?= $header ?>
    <?= $content ?>
  </main>
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <script>
  $('.selected2').select2();
//   $(".js-example-placeholder-single").select2({

// });
    if (localStorage.getItem("darkmode")) {
      var body_el = document.body;
      body_el.className += 'dark';
    }
  </script>

  <!-- <script src="assets/admin/js/jquery-3.5.0.min.js"></script> -->

  <script src="assets/admin/js/bootstrap.bundle.min.js"></script>
  <script src="assets/admin/js/jquery-3.7.1.min.js"></script>
  <!-- ChartJS files-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Custom JS -->
  <script src="assets/admin/js/scriptc619.js"></script>



<!-- Mirrored from www.ecommerce-admin.com/demo/page-0-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 02:53:43 GMT -->

</html>