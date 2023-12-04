<!-- styles needed by footable  -->
<link href="assets/user/assets/css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="assets/user/assets/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li class="active"> Thông tin cá nhân</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="product-tab w100 clearfix">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab"><span><i class="glyphicon glyphicon-user"></i> Thông tin cá nhân </span></a></li>
                    <li><a href="#donhang" data-toggle="tab"><i class="glyphicon glyphicon-tasks"></i> Lịch sử đặt hàng</a></li>
                    <li><a href="#tichdiem" data-toggle="tab"><i class="glyphicon glyphicon-saved"></i> Thông tin tích điểm</a></li>
                </ul>
                <div class="row">
                    <?php if (session('errorsMsg')) : ?>
                        <?php foreach (session('errorsMsg') as $error) : ?>
                            <div class="alert alert-danger d-flex align-items-center myAlert" role="alert">
                                <span>Thêm dữ liệu thất bại!</span>
                            </div>
                            <?php break; ?>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if (session('successMsg')) : ?>
                        <?php foreach (session('successMsg') as $success) : ?>
                            <div class="alert alert-success d-flex align-items-center myAlert" role="alert">
                                <span>Thêm dữ liệu thành công!</span>
                            </div>
                            <?php break; ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                <p class="required"><sup>*</sup> Bắt buộc nhập</p>
                            </div>
                            <form method="POST" action="user/account/my-profile">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputName">Họ và tên <sup>*</sup> </label>
                                        <input required type="text" class="form-control" name="sTenKH" id="InputName" placeholder="Họ và tên" value="<?= $profiles['sTenKH'] ?>">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputLastName">Địa chỉ <sup>*</sup> </label>
                                        <input required type="text" class="form-control" id="InputLastName" placeholder="Địa chỉ" value="<?= $profiles['sDiaChi'] ?>" name="sDiaChi">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail"> Số điện thoại </label>
                                        <input type="text" class="form-control" id="InputEmail" placeholder="Số điện thoại" value="<?= $profiles['sSDT'] ?>" name="sSDT">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <?php
                                                // Chuyển đổi thành đối tượng DateTime
                                                $date = new \DateTime($profiles['dNgaySinh']);
                                                // Lấy ngày
                                                $day = $date->format('d');
                                                // Lấy tháng
                                                $month = $date->format('m');
                                                // Lấy năm
                                                $year = $date->format('Y');
                                                ?>
                                                <select class="form-control" id="days" name="ngay">
                                                    <option>-</option>
                                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i == $day) : ?> selected <?php endif; ?>><?php echo $i; ?> &nbsp;&nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="thang" id="months">
                                                    <option>-</option>
                                                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i == $month) : ?> selected <?php endif; ?>>Tháng <?php echo $i; ?> &nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="nam" id="years">
                                                    <option>-</option>
                                                    <?php for ($i = 1950; $i <= 2023; $i++) : ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i == $year) : ?> selected <?php endif; ?>><?php echo $i; ?> &nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select id="selectbasic" name="sGioiTinh" class="form-control">
                                            <option value="Nam" <?php if ($profiles['sGioiTinh'] == "Nam") : ?> selected <?php endif; ?>>Nam</option>
                                            <option value="Nữ" <?php if ($profiles['sGioiTinh'] == "Nữ") : ?> selected <?php endif; ?>>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputPasswordCurrent"> Mật khẩu <sup> * </sup> </label>
                                        <input type="password" value="<?= $profiles['sMatKhau'] ?>" name="InputPasswordCurrent" class="form-control" id="InputPasswordCurrent">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputPasswordnew"> Mật khẩu mới </label>
                                        <input type="password" name="sMatKhau" class="form-control" id="InputPasswordnew">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputPasswordnewConfirm"> Xác nhận mật khẩu </label>
                                        <input type="password" name="InputPasswordnewConfirm" class="form-control" id="InputPasswordnewConfirm">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <p class="clearfix">
                                            <input type="checkbox" value="1" id="optin" name="optin">
                                            <label for="optin">Nhớ mật khẩu!</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn   btn-primary"><i class="fa fa-save"></i> &nbsp; Lưu thay đổi</button>
                                </div>
                            </form>
                            <div class="col-lg-12 clearfix">
                                <ul class="pager">
                                    <li class="previous pull-right"><a href="user/home"> <i class="fa fa-home"></i> Quay lại trang chủ </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="donhang">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Danh sách đơn hàng </span></h1>
                                <div class="row userInfo">
                                    <div class="col-lg-12">
                                        <h2 class="block-title-2"> Danh sách đơn hàng của bạn </h2>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div class="col-xs-12 col-sm-12">
                                        <table class="footable">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th data-class="expand" data-sort-initial="true"><span title="table sorted by this column on load">Mã đơn</span></th>
                                                    <th data-hide="phone,tablet" data-sort-ignore="true">Số lượng sản phẩm</th>
                                                    <th data-hide="phone,tablet"><strong></strong></th>
                                                    <th data-hide="default" data-type="numeric"> Ngày đặt hàng</th>
                                                    <th data-hide="phone" data-type="numeric"> Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $k = 1 ?>
                                                <?php if (empty($historys)) : ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Bạn chưa đặt đơn hàng nào !!!</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($historys as $history) : ?>
                                                        <tr>
                                                            <td><?= $k++ ?></td>
                                                            <td><?= $history['PK_iMaDon'] ?></td>
                                                            <td>
                                                                <small><?= $history['soluongsp'] ?> sản phẩm</small>
                                                            </td>
                                                            <td><a href="user/order-status/<?= $history['PK_iMaDon'] ?>" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                            <td data-value="78025368997"><?= date('d/m/Y', strtotime($history['dThoiGianTao'])) ?></td>

                                                            <?php if ($history['FK_iMaTrangThai'] == '4') : ?>
                                                                <td data-value="3"><span class="label label-warning"><?= $history['sTenTrangThai'] ?></span></td>
                                                            <?php elseif ($history['FK_iMaTrangThai'] == '10') : ?>
                                                                <td><span class="label label-primary"><?= $history['sTenTrangThai'] ?></span></td>
                                                            <?php elseif ($history['FK_iMaTrangThai'] == '5') : ?>
                                                                <td><span class="label label-danger"><?= $history['sTenTrangThai'] ?></span></td>
                                                            <?php else : ?>
                                                                <td><span class="label label-success"><?= $history['sTenTrangThai'] ?></span></td>
                                                            <?php endif; ?>

                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div class="col-lg-12 clearfix">
                                        <ul class="pager">
                                            <li class="previous pull-right"><a href="user/home"> <i class="fa fa-home"></i> Quay lại trang chủ </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5"></div>
                        </div>
                    </div>


                    <div class="tab-pane" id="tichdiem">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-ms-4">
                                        <div class="site-color">
                                            <h3>Số điểm bạn đang tích lũy được là: </h3>
                                            <p style="font-size:100px; font-weight: bold; margin:50px">8</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-ms-8">
                                        <div clsass="row subCategoryList clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center ">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/1.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Gấu nâu lông mềm </span></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/2.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Gấu hồng </span></a></div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/3.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Xe đẩy </span></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/4.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Xe đẩy xanh lam </span></a></div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/5.jpg" class="img-rounded  " alt="img"> </a> <a class="subCategoryTitle"><span> Bình sữa 200ml </span></a></div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6  text-center">
                                                <div class="thumbnail"><a class="subCategoryThumb" href="sub-category.html"><img src="assets/user/images/gift/6.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Bình sữa nhỏ </span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul class="pager">
                                        <li class="previous pull-right"><a href="user/home"> <i class="fa fa-home"></i> Quay lại trang chủ </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <div style="clear:both"></div>
</div>

<script src="assets/user/assets/js/footable.js" type="text/javascript"></script>
<script src="assets/user/assets/js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript">
    // Đợi 3 giây (3000 miligiây) sau đó ẩn alert
    setTimeout(function() {
        $('.myAlert').fadeOut('slow');
    }, 3000);
    $(function() {
        $('.footable').footable();
    });
</script>