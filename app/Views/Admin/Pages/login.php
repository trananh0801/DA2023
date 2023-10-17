<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.ecommerce-admin.com/demo/page-account-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 02:53:39 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Đăng nhập quản trị</title>
  <base href="http://localhost:8080">

  <link href="assets/admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="assets/admin/css/bootstrapf9e3.css?v=1.1" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="assets/admin/fonts/material-icon/css/round.css" />

  <!-- custom style -->
  <link href="assets/admin/css/uif9e3.css?v=1.1" rel="stylesheet" type="text/css" />
  <link href="assets/admin/css/responsivef9e3.css?v=1.1" rel="stylesheet" />

</head>

<body>

  <b class="screen-overlay"></b>

  <main>


    <section class="content-main">
      <?php if (session('errorsMsg')) : ?>
        <?php foreach (session('errorsMsg') as $error) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Lỗi: </strong> <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php break; ?>
        <?php endforeach ?>
      <?php endif ?>
      <?php if (session('successMsg')) : ?>
        <?php foreach (session('successMsg') as $success) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thành công: </strong> <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php break; ?>
        <?php endforeach ?>
      <?php endif ?>
      <!-- ============================ COMPONENT LOGIN   ================================= -->
      <div class="card shadow mx-auto" style="max-width: 380px; margin-top:100px;">
        <div class="card-body">
          <h4 class="card-title mb-4">Đăng nhập</h4>
          <form method="POST" action="admin/login">
            <div class="mb-3">
              <input class="form-control" placeholder="Tên đăng nhập" type="text" name="sTenTK">
            </div> <!-- form-group// -->
            <div class="mb-3">
              <input class="form-control" placeholder="Mật khẩu" type="password" name="sMatKhau">
            </div> <!-- form-group// -->

            <div class="mb-3">
              <a href="#" class="float-end">Quên mật khẩu?</a>
              <label class="form-check">
                <input type="checkbox" class="form-check-input" checked="">
                <span class="form-check-label">Nhớ mật khẩu</span>
              </label>
            </div> <!-- form-group form-check .// -->
            <div class="mb-4">
              <button type="submit" class="btn btn-primary w-100"> Đăng nhập </button>
            </div> <!-- form-group// -->
          </form>
        </div> <!-- card-body.// -->
      </div> <!-- card .// -->


      <!-- ============================ COMPONENT LOGIN  END.// ================================= -->




    </section> <!-- content-main end// -->
  </main>

  <script>
    if (localStorage.getItem("darkmode")) {
      var body_el = document.body;
      body_el.className += 'dark';
    }
  </script>

  <script src="assets/admin/js/jquery-3.5.0.min.js"></script>
  <script src="assets/admin/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script src="assets/admin/js/scriptc619.js?v=1.0"></script>

</body>

<!-- Mirrored from www.ecommerce-admin.com/demo/page-account-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 02:53:39 GMT -->

</html>