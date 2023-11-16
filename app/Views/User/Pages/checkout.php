<style>
    .quantity-container {
        display: flex;
        align-items: center;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        margin: 0 10px;
    }
</style>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li class="active"> Đặt hàng</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Đặt hàng</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
            <h4 class="caps"><a href="user/home"><i class="fa fa-chevron-left"></i> Quay lại trang chủ </a></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <div class="w100 clearfix">
                        <ul class="orderStep orderStepLook2">
                            <li><a href="checkout-1.html">
                                    <i class="fa fa-map-marker "></i>
                                    <span> ĐỊA CHỈ</span>
                                </a></li>
                            <li class="active"><a href="checkout-5.html"><i class="fa fa-check-square "> </i><span>ĐẶT HÀNG</span></a></li>
                        </ul>
                        <!--orderStep-->
                    </div>
                    <div class="w100 clearfix">
                        <div class="row userInfo">
                            <div class="col-lg-12">
                                <h2 class="block-title-2"> Chi tiết đơn hàng </h2>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="cartContent w100 checkoutReview ">
                                    <table class="cartTable table-responsive" style="width:100%">
                                        <tbody>
                                            <tr class="CartProduct cartTableHeader">
                                                <th style="width:15%"> Sản phẩm</th>
                                                <th class="checkoutReviewTdDetails">Chi tiết</th>
                                                <th style="width:10%">Đơn giá</th>
                                                <th class="hidden-xs" style="width:5%">Số lượng</th>
                                                <th class="hidden-xs" style="width:10%">Chiết khấu</th>
                                                <th style="width:15%">Thành tiền</th>
                                            </tr>
                                            <tr class="CartProduct">
                                                <td class="CartProductThumb">
                                                    <div><a href="product-details.html"><img src="assets/user/images/product/3.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="CartDescription">
                                                        <h4><a href="product-details.html">Sữa tươi </a></h4>
                                                        <span class="size">Hộp</span>
                                                    </div>
                                                </td>
                                                <td class="delete">
                                                    <div class="price ">300.000 VNĐ</div>
                                                </td>
                                                <td class="quantity-container">
                                                    <button class="btn btn-sm btn-info" onclick="decreaseQuantity()">-</button>
                                                    <input type="text" id="quantity" class="quantity-input" value="1" readonly>
                                                    <button class="btn btn-sm btn-info" onclick="increaseQuantity()">+</button>
                                                </td>
                                                <td class="hidden-xs">0</td>
                                                <td class="price">600.000 VNĐ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--cartContent-->

                                <div class="w100 costDetails">
                                    <div class="table-block" id="order-detail-content">
                                        <table class="std table" id="cart-summary">
                                            <tr>
                                                <td>Tổng tiền sản phẩm</td>
                                                <td class="price">1.000.000 VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="price"><span class="success">Free shipping!</span></td>
                                            </tr>
                                            <tr>
                                                <td> Tổng tiền (Đã áp dụng khuyến mãi)</td>
                                                <td id="total-price" class="price">1.000.000 VNĐ</td>
                                            </tr>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/costDetails-->
                            </div>
                        </div>
                    </div>
                    <!--/row end-->
                    <div class="cartFooter w100">
                        <div class="box-footer">
                            <div class="pull-left"><a class="btn btn-default" href="user/account">
                                    <i class="fa fa-arrow-left"></i> &nbsp; Thay đổi địa chỉ </a>
                            </div>
                            <div class="pull-right">
                                <a href="user/thankyou" class="btn btn-primary btn-small ">
                                    Xác nhận đặt hàng &nbsp; <i class="fa fa-check"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/ cartFooter -->
                </div>
            </div>
        </div>
        <!--/row end-->

        <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
            <div class="w100 cartMiniTable">
                <table id="cart-summary" class="std table">
                    <tbody>
                        <tr>
                            <td>Tổng tiền sản phẩm</td>
                            <td class="price">1.000.000</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td class="price"><span class="success">Free shipping!</span></td>
                        </tr>
                        <tr>
                            <td> Tổng tiền</td>
                            <td class=" site-color" id="total-price">1.000.000 VNĐ</td>
                        </tr>
                    </tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
        <!--/rightSidebar-->

    </div>
    <!--/row-->

    <div style="clear:both"></div>
</div>

<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value, 10);
        quantityInput.value = currentQuantity + 1;
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value, 10);

        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }
</script>