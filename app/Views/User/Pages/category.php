<style>
    .product-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
    }
    .modalImg {
        width: 100%;
        height: 200px;
        overflow: hidden;
        align-items: center;
        justify-content: center;
        padding: 0px 10px 0px 10px;
    }

    .modalImg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        align-items: center;
        justify-content: center;
        object-position: center center;
        display: block;
    }
    .description {
        max-width: 390px; 
        margin-top: 10px; 
    }
    .modal-soluong{
        margin-top: 20px;
    }
</style>
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
                                <a href="user/productDetail/<?= $productInGroup['PK_iMaSP'] ?>" class="product-image"><img class="img-responsive" alt="img" src="<?php echo base_url('assets/admin/images/products/' . $productInGroup['sHinhAnh']) ?>"></a>

                                <div class="promotion"><span class="new-product"> MỚI</span> <span class="discount"> giảm 15%</span></div>
                            </div>
                            <div class="description">
                                <h4><a href="user/productDetail/<?= $productInGroup['PK_iMaSP'] ?>"><?= $productInGroup['sTenSP'] ?></a></h4>
                                <i>Số lượng: <?= $productInGroup['fSoLuong'] ?> (<?= $productInGroup['sDVT'] ?>)</i>
                                <div class="grid-description">
                                    <p><?= $productInGroup['sGhiChu'] ?> </p>
                                </div>
                            </div>
                            <div class="price"><span><?= number_format($productInGroup['fGiaBanLe'], 0, '.', ',') ?></span> VNĐ</div>
                            <?php if ($sessions['tendn']) : ?>
                                <div class="action-control">
                                    <a class="btn btn-primary edit" href="#" data-toggle="modal" data-target="#AddCart_category" data-masanpham="<?= $productInGroup['PK_iMaSP'] ?>" data-hinhanh="<?= $productInGroup['sHinhAnh'] ?>" data-tensp="<?= $productInGroup['sTenSP'] ?>" data-soluong="<?= $productInGroup['fSoLuong'] ?>" data-dvt="<?= $productInGroup['sDVT'] ?>" data-giatien="<?= $productInGroup['fGiaBanLe'] ?>">
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
        </div> <!--/right column end-->
    </div><!-- /.row  -->
</div>

<!-- Modal thêm vào giỏ hàng  -->
<div class="modal signUpContent fade" id="AddCart_category" tabindex="-1" role="dialog">
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
                                <h4 id="tensp"></h4>
                                <div class="price"><span id="giatien"></span> VNĐ</div>
                                <i>Số lượng: <span id="soluong"></span> (<span id="dvt"></span>)</i>
                                <div class="form-group modal-soluong">
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
        function formatNumber(number) {
            return number.toLocaleString('vi-VN');
        }
        $(".edit").click(function() {
            masanpham = $(this).attr("data-masanpham");
            hinhanh = $(this).attr("data-hinhanh");
            tensp = $(this).attr("data-tensp");
            giatien = $(this).attr("data-giatien");
            soluong = $(this).attr("data-soluong");
            dvt = $(this).attr("data-dvt");

            $("#masanpham").val(masanpham);
            $("#tensp").text(tensp);
            $("#soluong").text(soluong);
            $("#dvt").text(dvt);
            $("#giatien").text(formatNumber(parseFloat(giatien)));
            $(".anhsp").attr('src', '<?php echo base_url('assets/admin/images/products/') ?>' + hinhanh);
        })
    })
</script>