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

    .modal-soluong {
        margin-top: 20px;
    }

    .product-largeimg-link {
        width: 100%;
        height: 450px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-largeimg-link img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
    }
</style>
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image col-lg-12 no-padding style3">
                <a class="product-largeimg-link" href="#"><img src="<?php echo base_url('assets/admin/images/products/' . $allProducts['sHinhAnh']) ?>" class="img-responsive product-largeimg" alt="img" />
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5">
            <h1 class="product-title"> <?= $allProducts['sTenSP'] ?></h1>

            <h3 class="product-code"> Mã sản phẩm : <?= $allProducts['PK_iMaSP'] ?></h3>

            <div class="product-price"><span class="price-sales"> <?= number_format($allProducts['fGiaBanLe'], 0, '.', ',') ?></span> VNĐ
            </div>
            <i>Số lượng: <?= $allProducts['fSoLuong'] ?> (<?= $allProducts['sDVT'] ?>)</i>
            <div class="details-description">
                <p><strong>Mô tả: </strong><?= $allProducts['sGhiChu'] ?> </p>
            </div>

            <div class="cart-actions">
                <div class="addto row">
                    <?php if ($sessions['tendn'] && ($sessions['quyen'] == '4')) : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button class="button btn-block btn-cart cart first edit" title="Add to Cart" type="button" data-toggle="modal" data-target="#AddCart" data-masanpham="<?= $allProducts['PK_iMaSP'] ?>" data-hinhanh="<?= $allProducts['sHinhAnh'] ?>" data-soluong="<?= $allProducts['fSoLuong'] ?>" data-dvt="<?= $allProducts['sDVT'] ?>" data-tensp="<?= $allProducts['sTenSP'] ?>" data-giatien="<?= $allProducts['fGiaBanLe'] ?>" data-ghichu="<?= $allProducts['sGhiChu'] ?>">Thêm vào giỏ hàng
                            </button>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button class="button btn-block btn-cart cart first edit" title="Add to Cart" type="button" data-toggle="modal" data-target="#ModalLogin" data-masanpham="<?= $allProducts['PK_iMaSP'] ?>" data-hinhanh="<?= $allProducts['sHinhAnh'] ?>" data-tensp="<?= $allProducts['sTenSP'] ?>" data-giatien="<?= $allProducts['fGiaBanLe'] ?>">Thêm vào giỏ hàng
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($sessions['tendn'] && ($sessions['quyen'] == '4')) : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a class="link-wishlist wishlist btn-block" href="user/checkoutProd/<?= $allProducts['PK_iMaSP'] ?>">Mua ngay</a></div>
                    <?php else : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a class="link-wishlist wishlist btn-block" href="user/checkoutProd/<?= $allProducts['PK_iMaSP'] ?>" data-toggle="modal" data-target="#ModalLogin">Mua ngay</a></div>
                    <?php endif; ?>

                </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>

    <div class="row recommended">
        <h1> CÓ THỂ BẠN CŨNG THÍCH </h1>

        <div id="SimilarProductSlider">
            <?php foreach ($getAllProducts as $getAllProduct) : ?>
                <div class="item">
                    <div class="product"><a class="product-image" href="user/productDetail/<?= $getAllProduct['PK_iMaSP'] ?>"> <img src="<?php echo base_url('assets/admin/images/products/' . $getAllProduct['sHinhAnh']) ?>" alt="img"> </a>

                        <div class="description">
                            <h4><a href="user/productDetail/<?= $getAllProduct['PK_iMaSP'] ?>"><?= $getAllProduct['sTenSP'] ?></a></h4>

                            <div class="price"><span><?= number_format($getAllProduct['fGiaBanLe'], 0, '.', ',') ?></span> VNĐ</div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div style="clear:both"></div>
</div>

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
                                <h4 id="tensp"></h4>
                                <div class="price"><span id="giatien"></span> VNĐ</div>
                                <i>Số lượng: <span id="soluong"></span> (<span id="dvt"></span>)</i>
                                <div>Mô tả: <span id="ghichu"></span></div>
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
        $(".edit").click(function() {
            masanpham = $(this).attr("data-masanpham");
            hinhanh = $(this).attr("data-hinhanh");
            tensp = $(this).attr("data-tensp");
            giatien = $(this).attr("data-giatien");
            ghichu = $(this).attr("data-ghichu");
            soluong = $(this).attr("data-soluong");
            dvt = $(this).attr("data-dvt");

            $("#masanpham").val(masanpham);
            $("#tensp").text(tensp);
            $("#giatien").text(giatien);
            $("#ghichu").text(ghichu);
            $("#soluong").text(soluong);
            $("#dvt").text(dvt);
            $(".anhsp").attr('src', '<?php echo base_url('assets/admin/images/products/') ?>' + hinhanh);
        })
    })
</script>