<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> THÔNG TIN CỬA HÀNG </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Mọi thắc mắc vui lòng liên hệ </p>
                            <h4><a class="inline" href="callto:+12025550151"> <strong> <i class="fa fa-phone"> </i>
                                        +84 3561 2674 </strong> </a></h4>
                            <h4><a class="inline" href="mailto:help@yourweb.com"> <i class="fa fa-envelope-o"> </i>
                                    tranthianh.8101@gmail.com </a></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Shop </h3>
                    <ul>
                        <li><a href="#">
                                Sản phẩm
                            </a></li>
                        <li><a href="#">
                                Khuyến mãi</a>
                        </li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Thông tin </h3>
                    <ul class="list-unstyled footer-nav">
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Cá nhân </h3>
                    <ul>
                        <li><a href="account.html"> Tài khoản </a></li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Đăng ký </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <button class="btn  bg-gray" type="button"> Đăng ký <i class="fa fa-long-arrow-right"> </i></button>
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
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; 19A10010068 - Trần Ánh - Đồ án tốt nghiệp 2023 </p>
        </div>
    </div>
</footer>





<!-- Modal Login start -->
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> ĐĂNG NHẬP </h3>
            </div>
            <div class="modal-body">
                <form action="user/login" method="POST">
                    <div class="form-group login-username">
                        <div>
                            <input name="sTenTK" id="login-user" class="form-control input" size="20" placeholder="Tên đăng nhập" type="text">
                        </div>
                    </div>
                    <div class="form-group login-password">
                        <div>
                            <input name="sMatKhau" id="login-password" class="form-control input" size="20" placeholder="Mật khẩu" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox login-remember">
                                <label>
                                    <input name="rememberme" value="forever" checked="checked" type="checkbox">
                                    Nhớ mật khẩu </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input name="submit" class="btn  btn-block btn-lg btn-primary" value="Đăng nhập" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center"> Bạn chưa từng đăng nhập? <a data-toggle="modal" data-dismiss="modal" href="#ModalSignup"> Đăng ký. </a> <br>
                    <a href="forgot-password.html"> Bạn quên mật khẩu? </a>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Modal đăng ký -->
<div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> ĐĂNG KÝ </h3>
            </div>
            <div class="modal-body">
                <form action="user/register" method="POST">
                    <div class="form-group reg-username">
                        <div>
                            <input name="sTenKH" class="form-control input" size="20" placeholder="Họ và tên" type="text">
                        </div>
                    </div>
                    <div class="form-group reg-username">
                        <div>
                            <input name="sDiaChi" class="form-control input" size="20" placeholder="Địa chỉ" type="text">
                        </div>
                    </div>
                    <div class="form-group reg-username">
                        <div>
                            <input name="dNgaySinh" class="form-control input" size="20" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <select id="selectbasic" name="sGioiTinh" class="form-control">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group reg-username">
                        <div>
                            <input name="sTenTK" class="form-control input" size="20" placeholder="Tên đăng nhập" type="text">
                        </div>
                    </div>
                    <div class="form-group reg-email">
                        <div>
                            <input name="sSDT" class="form-control input" size="20" placeholder="Số điện thoại" type="text">
                        </div>
                    </div>
                    <div class="form-group reg-password">
                        <div>
                            <input name="sMatKhau" class="form-control input" size="20" placeholder="Mật khẩu" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox login-remember">
                                <label>
                                    <input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox">
                                    Nhớ mật khẩu </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input name="submit" class="btn  btn-block btn-lg btn-primary" value="ĐĂNG NHẬP" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center"> Bạn đã có tài khoản? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin">
                        Đăng nhập </a></p>
            </div>
        </div>
    </div>
</div>