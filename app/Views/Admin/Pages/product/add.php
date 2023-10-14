
<section class="content-main">
<?php if(session('errorsMsg')) :?>
    <?php foreach(session('errorsMsg') as $error) :?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Lỗi: </strong> <?= $error?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>
<?php if(session('successMsg')) :?>
    <?php foreach(session('successMsg') as $success) :?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thành công: </strong> <?= $success?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>
	<div class="content-header">
		<h2 class="content-title">Thêm mới sản phẩm</h2>
		<div>
			<a href="#" class="btn btn-outline-danger"> &times; Discard</a>
		</div>
	</div>

	<div class="card mb-4">
          <div class="card-body">
			<form action="admin/product/create" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6 mb-3">
					    <label class="form-label">Nhóm sản phẩm</label>
					    <select class="form-select" name="FK_iMaNhom">
                            <?php foreach($productsGroup as $productGroup) :?>
					    	    <option value="<?= $productGroup['PK_iMaNhom']?>"><?= $productGroup['sTenNhom']?></option>
                            <?php endforeach?>
					    </select>
				  	</div>
                    <div class="mb-4 col-6">
                        <label for="sTenSP" class="form-label">Tên sản phẩm</label>
                        <input type="text" value="<?= old('sTenSP')?>" placeholder="Type here" class="form-control" id="sTenSP" name="sTenSP">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Số lượng</label>
                        <div>
                            <input type="number" class="form-control" placeholder="012345678" name="fSoLuong">
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                    <div class="mb-4 col-6">
                        <label for="sDVT" class="form-label">Đơn vị tính</label>
                        <input type="text" <?= old('sDVT')?> placeholder="Type here" class="form-control" id="sDVT" name="sDVT">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-2">
                        <label for="fGiaNhap" class="form-label">Giá nhập</label>
                        <input type="text" <?= old('fGiaNhap')?> placeholder="Type here" class="form-control" id="fGiaNhap" name="fGiaNhap">
                    </div>
                    <div class="mb-4 col-2">
                        <label for="fGiaBanLe" class="form-label">Giá bán lẻ</label>
                        <input type="text" <?= old('fGiaBanLe')?> placeholder="Type here" class="form-control" id="fGiaBanLe" name="fGiaBanLe">
                    </div>
                    <div class="mb-4 col-2">
                        <label for="fGiaBanSi" class="form-label">Giá bán sỉ</label>
                        <input type="text" <?= old('fGiaBanSi')?> placeholder="Type here" class="form-control" id="fGiaBanSi" name="fGiaBanSi">
                    </div>
                    <div class="mb-4 col-6">
                        <label for="dHSD" class="form-label">Hạn sử dụng</label>
                        <input type="text" <?= old('dHSD')?> placeholder="Type here" class="form-control" id="dHSD" name="dHSD">
                    </div>
                </div>
				<div class="row">
                    <div class="col-6">
                        <label class="form-label">Ảnh sản phẩm</label>
                        <input class="form-control" type="file" name="sHinhAnh">
                    </div>
                    <div class="mb-4 col-6">
                        <label class="form-check mb-3">
                            Trạng thái
                        </label>
                        <input class="form-check-input" type="checkbox" value="1" name="FK_iMaTrangThai">
                            <span class="form-check-label">  Kích hoạt </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="sGhiChu">Ghi chú</label>
                        <textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"></textarea>
                    </div>
                </div>
				<button type="submit" class="btn btn-primary">Thêm mới</button>

			</form>
          </div>
    </div> <!-- card end// -->


</section> <!-- content-main end// -->