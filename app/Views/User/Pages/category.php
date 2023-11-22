<div class="container main-container headerOffset">

    <!-- Main component call to action -->

    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li class="active">Nhóm sản phẩm</li>
            </ul>
        </div>
    </div>
    <!-- /.row  -->

    <div class="row">

        <!--left column-->

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="panel-group" id="accordionNo">
                <!--Category-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseCategory" class="collapseWill active ">
                                <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Danh mục nhóm sản phẩm
                            </a>
                        </h4>
                    </div>

                    <div id="collapseCategory" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked tree">
                                <?php foreach ($productGroups as $productGroup) : ?>
                                    <li class="active dropdown-tree open-tree"><a class="dropdown-tree-a" href="user/category/<?= $productGroup['PK_iMaNhom'] ?>"> <span class="badge pull-right">new</span> <?= $productGroup['sTenNhom'] ?> </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Category menu end-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a class="collapseWill active " data-toggle="collapse" href="#collapsePrice">
                                Giá tiền <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> <span class="pull-right clearFilter  label-danger"> Clear </span></h4>
                    </div>
                    <div id="collapsePrice" class="panel-collapse collapse in">
                        <div class="panel-body priceFilterBody">
                            <!-- -->
                            <label>
                                <input type="radio" name="agree" value="0" />
                                100$ - 500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="1" />
                                500$ - 1000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="2" />
                                1000$ - 1500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="3" />
                                1500$ - 2000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="4" />
                                2000$ - 2500$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="5" />
                                2500$ - 3000$</label>
                            <br>
                            <label>
                                <input type="radio" name="agree" value="6" disabled checked />
                                Không biết</label>
                            <hr>
                            <p>Chọn khoảng giá </p>

                            <form class="form-inline " role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="2000 $">
                                </div>
                                <div class="form-group sp"> -</div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="3000 $">
                                </div>
                                <button type="submit" class="btn btn-default pull-right">Kiếm tra</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/price panel end-->
            </div>
        </div>


        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">

            <div class="w100 clearfix category-top">
                <h2 style="text-transform: uppercase;"> <?= $nameProductGroups['sTenNhom'] ?> </h2>
            </div>
            <!--/.category-top-->

            <div class="w100 productFilter clearfix">
                <p class="pull-left"> Hiển thị <strong><?php foreach ($demsps as $demsp) : ?><?= $demsp['tongsp'] ?><?php endforeach ?></strong> sản phẩm </p>
                <div class="pull-right ">
                    <div class="change-order pull-right">
                        <select class="form-control" name="orderby">
                            <option selected="selected">Sắp xếp mặc định</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <div class="change-view pull-right">
                        <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a>
                        <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a>
                    </div>
                </div>
            </div>
            <!--/.productFilter-->

            <div class="row  categoryProduct xsResponse clearfix">
                <?php foreach ($productInGroups as $productInGroup) : ?>
                    <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                        <div class="product">
                            <a data-placement="left" data-original-title="Add to Wishlist" data-toggle="tooltip" class="add-fav tooltipHere">
                                <i class="glyphicon glyphicon-heart"></i>
                            </a>

                            <div class="image">
                                <div class="quickview">
                                    <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html" data-target="#productSetailsModalAjax">Xem nhanh </a>
                                </div>
                                <a href="product-details.html"><img class="img-responsive" alt="img" src="<?php echo base_url('assets/admin/images/products/' . $productInGroup['sHinhAnh']) ?>"></a>

                                <div class="promotion"><span class="new-product"> MỚI</span> <span class="discount"> giảm 15%</span></div>
                            </div>
                            <div class="description">
                                <h4><a href="product-details.html"><?= $productInGroup['sTenSP'] ?></a></h4>

                                <div class="grid-description">
                                    <p><?= $productInGroup['sGhiChu'] ?> </p>
                                </div>
                            </div>
                            <div class="price"><span><?= $productInGroup['fGiaBanLe'] ?></span>đ</div>
                            <?php if ($sessions['tendn']) : ?>
                                <div class="action-control">
                                    <a class="btn btn-primary edit" href="#" data-toggle="modal" data-target="#AddCart" data-masanpham="<?= $productInGroup['PK_iMaSP'] ?>" data-hinhanh="<?= $productInGroup['sHinhAnh'] ?>">
                                        <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Thêm vào giỏ hàng </span>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="action-control">
                                    <a class="btn btn-primary edit" href="#" data-toggle="modal" data-target="#ModalLogin" data-masanpham="<?= $productInGroup['PK_iMaSP'] ?>">
                                        <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Thêm vào giỏ hàng </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!--/.categoryProduct || product content end-->

            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
                <div class="pull-right pull-right  col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
                </div>
            </div>
            <!--/.categoryFooter-->
        </div> <!--/right column end-->
    </div><!-- /.row  -->
</div>
<!-- /main container -->

<!-- Modal thêm vào giỏ hàng  -->
<div class="modal signUpContent fade" id="AddCart" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h3 class="modal-title-site text-center"> Thêm vào giỏ hàng </h3>
            </div>
            <div class="modal-body">
                <form action="user/addCart" method="POST">
                    <div class="form-group login-username">
                        <div class="row">
                            <div class="modalImg">
                                <img src="" alt="img" class="anhsp">
                            </div>
                            <div class="description">
                                <h4>Sản phẩm 1</h4>
                                <div class="price"><span>100.000 VNĐ</span></div>
                                <div class="form-group">
                                    <div class="">
                                        <div class="input-group"><span class="input-group-addon">Số lượng</span>
                                            <input name="iSoLuong" id="login-user" class="form-control input" size="20" placeholder="Nhập số lượng" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input name="FK_iMaSP" id="masanpham" type="text" hidden>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn  btn-block btn-lg btn-primary" value="Thêm vào giỏ hàng" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            masanpham = $(this).attr("data-masanpham");
            hinhanh = $(this).attr("data-hinhanh");
            console.log(hinhanh)

            $("#masanpham").val(masanpham);
            $(".anhsp").attr('src', '<?php echo base_url('assets/admin/images/products/') ?>' + hinhanh);
        })
    })
</script>