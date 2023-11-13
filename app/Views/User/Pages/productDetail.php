<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="user/home">Trang chủ</a></li>
                <li class="active">Sản phẩm 1</li>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image col-lg-12 no-padding style3">
                <a class="product-largeimg-link" href="product-details.html"><img src="<?= $allProducts['fGiaBanLe'] ?>" class="img-responsive product-largeimg" alt="img" />
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5">
            <h1 class="product-title"> <?= $allProducts['sTenSP'] ?></h1>

            <h3 class="product-code"> Code : <?= $allProducts['PK_iMaSP'] ?></h3>

            <div class="rating">
                <p><span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star-o "></i></span> <span class="ratingInfo"> <span> / </span> <a data-target="#modal-review" data-toggle="modal"> Đánh giá</a> </span></p>
            </div>
            <div class="product-price"><span class="price-sales"> <?= $allProducts['fGiaBanLe'] ?></span> <span class="price-standard">600.000 VNĐ</span>
            </div>
            <div class="details-description">
                <p><?= $allProducts['sGhiChu'] ?> </p>
            </div>

            <div class="cart-actions">
                <div class="addto row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <button  class="button btn-block btn-cart cart first edit" title="Add to Cart" type="button" data-toggle="modal" data-target="#AddCart" data-masanpham="<?= $allProducts['PK_iMaSP'] ?>">Thêm vào giỏ hàng
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a class="link-wishlist wishlist btn-block ">Mua ngay</a></div>
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
                <div class="product"><a class="product-image"> <img src="<?= $getAllProduct['PK_iMaSP'] ?>" alt="img"> </a>

                    <div class="description">
                        <h4><a href="user/productDetail/<?= $getAllProduct['PK_iMaSP'] ?>"><?= $getAllProduct['sTenSP'] ?></a></h4>

                        <div class="price"><span><?= $getAllProduct['fGiaBanLe'] ?></span></div>
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
                        <div>
                            <img src="" alt="img">
                            <div class="description">
                                <h4>Sản phẩm 1</h4>
                                <div class="price"><span>100.000 VNĐ</span></div>
                            </div>
                            <input name="FK_iMaSP" id="masanpham" type="text" hidden>
                            <input name="iSoLuong" id="login-user" class="form-control input" size="20" placeholder="Nhập số lượng" type="number">
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

            $("#masanpham").val(masanpham);
        })
    })
</script>