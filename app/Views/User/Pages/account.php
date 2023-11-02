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
                    <li><a href="#donhang" data-toggle="tab">Đơn hàng</a></li>
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
                                        <input required type="text" class="form-control" id="InputName" placeholder="First Name">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputLastName">Địa chỉ <sup>*</sup> </label>
                                        <input required type="text" class="form-control" id="InputLastName" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail"> Số điện thoại </label>
                                        <input type="email" class="form-control" id="InputEmail" placeholder="gtanim@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" id="days" name="days">
                                                    <option>-</option>
                                                    <option value="1">1&nbsp;&nbsp;</option>
                                                    <option value="2">2&nbsp;&nbsp;</option>
                                                    <option value="3">3&nbsp;&nbsp;</option>
                                                    <option value="4">4&nbsp;&nbsp;</option>
                                                    <option value="5">5&nbsp;&nbsp;</option>
                                                    <option value="6">6&nbsp;&nbsp;</option>
                                                    <option value="7">7&nbsp;&nbsp;</option>
                                                    <option value="8">8&nbsp;&nbsp;</option>
                                                    <option value="9">9&nbsp;&nbsp;</option>
                                                    <option value="10">10&nbsp;&nbsp;</option>
                                                    <option value="11">11&nbsp;&nbsp;</option>
                                                    <option value="12">12&nbsp;&nbsp;</option>
                                                    <option value="13">13&nbsp;&nbsp;</option>
                                                    <option value="14">14&nbsp;&nbsp;</option>
                                                    <option value="15">15&nbsp;&nbsp;</option>
                                                    <option selected="selected" value="16">16&nbsp;&nbsp;</option>
                                                    <option value="17">17&nbsp;&nbsp;</option>
                                                    <option value="18">18&nbsp;&nbsp;</option>
                                                    <option value="19">19&nbsp;&nbsp;</option>
                                                    <option value="20">20&nbsp;&nbsp;</option>
                                                    <option value="21">21&nbsp;&nbsp;</option>
                                                    <option value="22">22&nbsp;&nbsp;</option>
                                                    <option value="23">23&nbsp;&nbsp;</option>
                                                    <option value="24">24&nbsp;&nbsp;</option>
                                                    <option value="25">25&nbsp;&nbsp;</option>
                                                    <option value="26">26&nbsp;&nbsp;</option>
                                                    <option value="27">27&nbsp;&nbsp;</option>
                                                    <option value="28">28&nbsp;&nbsp;</option>
                                                    <option value="29">29&nbsp;&nbsp;</option>
                                                    <option value="30">30&nbsp;&nbsp;</option>
                                                    <option value="31">31&nbsp;&nbsp;</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="months" id="months">
                                                    <option>-</option>
                                                    <option value="1">January&nbsp;</option>
                                                    <option value="2">February&nbsp;</option>
                                                    <option value="3">March&nbsp;</option>
                                                    <option value="4">April&nbsp;</option>
                                                    <option value="5">May&nbsp;</option>
                                                    <option value="6">June&nbsp;</option>
                                                    <option value="7">July&nbsp;</option>
                                                    <option value="8">August&nbsp;</option>
                                                    <option value="9">September&nbsp;</option>
                                                    <option value="10">October&nbsp;</option>
                                                    <option value="11">November&nbsp;</option>
                                                    <option selected="selected" value="12">December&nbsp;</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="years" id="years">
                                                    <option>-</option>
                                                    <option value="2014">2014&nbsp;&nbsp;</option>
                                                    <option value="2013">2013&nbsp;&nbsp;</option>
                                                    <option value="2012">2012&nbsp;&nbsp;</option>
                                                    <option value="2011">2011&nbsp;&nbsp;</option>
                                                    <option value="2010">2010&nbsp;&nbsp;</option>
                                                    <option value="2009">2009&nbsp;&nbsp;</option>
                                                    <option value="2008">2008&nbsp;&nbsp;</option>
                                                    <option value="2007">2007&nbsp;&nbsp;</option>
                                                    <option value="2006">2006&nbsp;&nbsp;</option>
                                                    <option value="2005">2005&nbsp;&nbsp;</option>
                                                    <option value="2004">2004&nbsp;&nbsp;</option>
                                                    <option value="2003">2003&nbsp;&nbsp;</option>
                                                    <option value="2002">2002&nbsp;&nbsp;</option>
                                                    <option value="2001">2001&nbsp;&nbsp;</option>
                                                    <option value="2000">2000&nbsp;&nbsp;</option>
                                                    <option value="1999">1999&nbsp;&nbsp;</option>
                                                    <option selected="selected" value="1998">1998&nbsp;&nbsp;</option>
                                                    <option value="1997">1997&nbsp;&nbsp;</option>
                                                    <option value="1996">1996&nbsp;&nbsp;</option>
                                                    <option value="1995">1995&nbsp;&nbsp;</option>
                                                    <option value="1994">1994&nbsp;&nbsp;</option>
                                                    <option value="1993">1993&nbsp;&nbsp;</option>
                                                    <option value="1992">1992&nbsp;&nbsp;</option>
                                                    <option value="1991">1991&nbsp;&nbsp;</option>
                                                    <option value="1990">1990&nbsp;&nbsp;</option>
                                                    <option value="1989">1989&nbsp;&nbsp;</option>
                                                    <option value="1988">1988&nbsp;&nbsp;</option>
                                                    <option value="1987">1987&nbsp;&nbsp;</option>
                                                    <option value="1986">1986&nbsp;&nbsp;</option>
                                                    <option value="1985">1985&nbsp;&nbsp;</option>
                                                    <option value="1984">1984&nbsp;&nbsp;</option>
                                                    <option value="1983">1983&nbsp;&nbsp;</option>
                                                    <option value="1982">1982&nbsp;&nbsp;</option>
                                                    <option value="1981">1981&nbsp;&nbsp;</option>
                                                    <option value="1980">1980&nbsp;&nbsp;</option>
                                                    <option value="1979">1979&nbsp;&nbsp;</option>
                                                    <option value="1978">1978&nbsp;&nbsp;</option>
                                                    <option value="1977">1977&nbsp;&nbsp;</option>
                                                    <option value="1976">1976&nbsp;&nbsp;</option>
                                                    <option value="1975">1975&nbsp;&nbsp;</option>
                                                    <option value="1974">1974&nbsp;&nbsp;</option>
                                                    <option value="1973">1973&nbsp;&nbsp;</option>
                                                    <option value="1972">1972&nbsp;&nbsp;</option>
                                                    <option value="1971">1971&nbsp;&nbsp;</option>
                                                    <option value="1970">1970&nbsp;&nbsp;</option>
                                                    <option value="1969">1969&nbsp;&nbsp;</option>
                                                    <option value="1968">1968&nbsp;&nbsp;</option>
                                                    <option value="1967">1967&nbsp;&nbsp;</option>
                                                    <option value="1966">1966&nbsp;&nbsp;</option>
                                                    <option value="1965">1965&nbsp;&nbsp;</option>
                                                    <option value="1964">1964&nbsp;&nbsp;</option>
                                                    <option value="1963">1963&nbsp;&nbsp;</option>
                                                    <option value="1962">1962&nbsp;&nbsp;</option>
                                                    <option value="1961">1961&nbsp;&nbsp;</option>
                                                    <option value="1960">1960&nbsp;&nbsp;</option>
                                                    <option value="1959">1959&nbsp;&nbsp;</option>
                                                    <option value="1958">1958&nbsp;&nbsp;</option>
                                                    <option value="1957">1957&nbsp;&nbsp;</option>
                                                    <option value="1956">1956&nbsp;&nbsp;</option>
                                                    <option value="1955">1955&nbsp;&nbsp;</option>
                                                    <option value="1954">1954&nbsp;&nbsp;</option>
                                                    <option value="1953">1953&nbsp;&nbsp;</option>
                                                    <option value="1952">1952&nbsp;&nbsp;</option>
                                                    <option value="1951">1951&nbsp;&nbsp;</option>
                                                    <option value="1950">1950&nbsp;&nbsp;</option>
                                                    <option value="1949">1949&nbsp;&nbsp;</option>
                                                    <option value="1948">1948&nbsp;&nbsp;</option>
                                                    <option value="1947">1947&nbsp;&nbsp;</option>
                                                    <option value="1946">1946&nbsp;&nbsp;</option>
                                                    <option value="1945">1945&nbsp;&nbsp;</option>
                                                    <option value="1944">1944&nbsp;&nbsp;</option>
                                                    <option value="1943">1943&nbsp;&nbsp;</option>
                                                    <option value="1942">1942&nbsp;&nbsp;</option>
                                                    <option value="1941">1941&nbsp;&nbsp;</option>
                                                    <option value="1940">1940&nbsp;&nbsp;</option>
                                                    <option value="1939">1939&nbsp;&nbsp;</option>
                                                    <option value="1938">1938&nbsp;&nbsp;</option>
                                                    <option value="1937">1937&nbsp;&nbsp;</option>
                                                    <option value="1936">1936&nbsp;&nbsp;</option>
                                                    <option value="1935">1935&nbsp;&nbsp;</option>
                                                    <option value="1934">1934&nbsp;&nbsp;</option>
                                                    <option value="1933">1933&nbsp;&nbsp;</option>
                                                    <option value="1932">1932&nbsp;&nbsp;</option>
                                                    <option value="1931">1931&nbsp;&nbsp;</option>
                                                    <option value="1930">1930&nbsp;&nbsp;</option>
                                                    <option value="1929">1929&nbsp;&nbsp;</option>
                                                    <option value="1928">1928&nbsp;&nbsp;</option>
                                                    <option value="1927">1927&nbsp;&nbsp;</option>
                                                    <option value="1926">1926&nbsp;&nbsp;</option>
                                                    <option value="1925">1925&nbsp;&nbsp;</option>
                                                    <option value="1924">1924&nbsp;&nbsp;</option>
                                                    <option value="1923">1923&nbsp;&nbsp;</option>
                                                    <option value="1922">1922&nbsp;&nbsp;</option>
                                                    <option value="1921">1921&nbsp;&nbsp;</option>
                                                    <option value="1920">1920&nbsp;&nbsp;</option>
                                                    <option value="1919">1919&nbsp;&nbsp;</option>
                                                    <option value="1918">1918&nbsp;&nbsp;</option>
                                                    <option value="1917">1917&nbsp;&nbsp;</option>
                                                    <option value="1916">1916&nbsp;&nbsp;</option>
                                                    <option value="1915">1915&nbsp;&nbsp;</option>
                                                    <option value="1914">1914&nbsp;&nbsp;</option>
                                                    <option value="1913">1913&nbsp;&nbsp;</option>
                                                    <option value="1912">1912&nbsp;&nbsp;</option>
                                                    <option value="1911">1911&nbsp;&nbsp;</option>
                                                    <option value="1910">1910&nbsp;&nbsp;</option>
                                                    <option value="1909">1909&nbsp;&nbsp;</option>
                                                    <option value="1908">1908&nbsp;&nbsp;</option>
                                                    <option value="1907">1907&nbsp;&nbsp;</option>
                                                    <option value="1906">1906&nbsp;&nbsp;</option>
                                                    <option value="1905">1905&nbsp;&nbsp;</option>
                                                    <option value="1904">1904&nbsp;&nbsp;</option>
                                                    <option value="1903">1903&nbsp;&nbsp;</option>
                                                    <option value="1902">1902&nbsp;&nbsp;</option>
                                                    <option value="1901">1901&nbsp;&nbsp;</option>
                                                    <option value="1900">1900&nbsp;&nbsp;</option>
                                                </select>
                                            </div>
                                        </div>
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
                                                    <th data-class="expand" data-sort-initial="true"><span title="table sorted by this column on load">Mã sản phẩm</span></th>
                                                    <th data-hide="phone,tablet" data-sort-ignore="true">Số lượng sản phẩm</th>
                                                    <th data-hide="phone,tablet"><strong>Phương thức thanh toán</strong></th>
                                                    <th data-hide="phone,tablet"><strong></strong></th>
                                                    <th data-hide="default"> Thành tiền</th>
                                                    <th data-hide="default" data-type="numeric"> Ngày đặt hàng</th>
                                                    <th data-hide="phone" data-type="numeric"> Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="user/order-status" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#028DE</td>
                                                    <td>5
                                                        <small>Sản phẩm(s)</small>
                                                    </td>
                                                    <td>Tiền mặt</td>
                                                    <td><a href="order-status.html" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
                                                    <td>30.000.000 VNĐ</td>
                                                    <td data-value="78025368997">31/10/2023</td>
                                                    <td data-value="3"><span class="label label-success">Hoàn thành</span>
                                                    </td>
                                                </tr>
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