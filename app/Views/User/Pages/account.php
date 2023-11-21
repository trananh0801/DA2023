<!-- styles needed by footable  -->
<link href="assets/user/assets/css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="assets/user/assets/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="account.html">Cá nhân</a></li>
                <li class="active"> Thông tin cá nhân</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
            <div class="product-tab w100 clearfix">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab"><span><i class="glyphicon glyphicon-user"></i> Thông tin cá nhân </span></a></li>
                    <li><a href="#donhang" data-toggle="tab">Lịch sử đặt hàng</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                <p class="required"><sup>*</sup> Bắt buộc nhập</p>
                            </div>
                            <form>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputName">Họ và tên <sup>*</sup> </label>
                                        <input required type="text" class="form-control" id="InputName" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputLastName">Địa chỉ <sup>*</sup> </label>
                                        <input required type="text" class="form-control" id="InputLastName" placeholder="Địa chỉ">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail"> Số điện thoại </label>
                                        <input type="text" class="form-control" id="InputEmail" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" id="days" name="days">
                                                    <option>-</option>
                                                    <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?> &nbsp;&nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="months" id="months">
                                                    <option>-</option>
                                                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                        <option value="<?php echo $i; ?>">Tháng <?php echo $i; ?> &nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="years" id="years">
                                                    <option>-</option>
                                                    <?php for ($i = 1950; $i <= 2023; $i++) : ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?> &nbsp;</option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select id="selectbasic" name="selectbasic" class="form-control">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group required">
                                        <label for="InputPasswordCurrent"> Mật khẩu <sup> * </sup> </label>
                                        <input type="password" value="123456" name="InputPasswordCurrent" class="form-control" id="InputPasswordCurrent">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputPasswordnew"> Mật khẩu mới </label>
                                        <input type="password" name="InputPasswordnew" class="form-control" id="InputPasswordnew">
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
                                    <li class="previous pull-right"><a href="index.html"> <i class="fa fa-home"></i> Quay lại trang chủ </a>
                                    </li>
                                    <li class="next pull-left"><a href="account.html"> &larr; Trở về thông tin cá nhân</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--/row end-->
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
                                                    <!-- <th data-hide="phone,tablet"><strong>Phương thức thanh toán</strong></th> -->
                                                    <th data-hide="phone,tablet"><strong></strong></th>
                                                    <!-- <th data-hide="default"> Thành tiền</th> -->
                                                    <th data-hide="default" data-type="numeric"> Ngày đặt hàng</th>
                                                    <th data-hide="phone" data-type="numeric"> Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $k = 1?>
                                                <?php foreach ($historys as $history) : ?>
                                                    <tr>
                                                        <td><?= $k++ ?></td>
                                                        <td><?= $history['PK_iMaDon'] ?></td>
                                                        <td>
                                                            <small><?= $history['soluongsp'] ?> sản phẩm</small>
                                                        </td>
                                                        <!-- <td>Tiền mặt</td> -->
                                                        <td><a href="user/order-status/<?= $history['PK_iMaDon'] ?>" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                        <td data-value="78025368997"><?= $history['dThoiGianTao'] ?></td>
                                                        <td data-value="3"><span class="label label-success"><?= $history['sTenTrangThai'] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div style="clear:both"></div>

                                    <div class="col-lg-12 clearfix">
                                        <ul class="pager">
                                            <li class="previous pull-right"><a href="index.html"> <i class="fa fa-home"></i> Quay lại trang chủ </a>
                                            </li>
                                            <li class="next pull-left"><a href="account.html"> &larr; Trở về thông tin cá nhân</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/row end-->

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-5"></div>
                        </div>
                        <!-- /main-container -->
                    </div>
                </div>
            </div>


        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>
<!-- /main-container -->

<!-- include footable plugin -->
<script src="assets/user/assets/js/footable.js" type="text/javascript"></script>
<script src="assets/user/assets/js/footable.sortable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('.footable').footable();
    });
</script>