<style>
	.td_img {
		width: 100px;
		height: 100px;
		overflow: hidden;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.td_img img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* Cắt hoặc mở rộng hình ảnh để vừa với kích thước được xác định */
		object-position: center center;
		display: block;
	}
</style>
<section class="content-main">
	<?php if (session('errorsMsg')) : ?>
		<?php foreach (session('errorsMsg') as $error) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Lỗi: </strong> <?= $error ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php break; ?>
		<?php endforeach ?>
	<?php endif ?>
	<?php if (session('successMsg')) : ?>
		<?php foreach (session('successMsg') as $success) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Thành công: </strong> <?= $success ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php break; ?>
		<?php endforeach ?>
	<?php endif ?>
	<div class="content-header">
		<h2 class="content-title">Cập nhật sản phẩm </h2>
	</div>
	<div class="card mb-4">
		<div class="card-body">
			<form action="admin/product/updateSave/<?= $products['PK_iMaSP'] ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 mb-3">
						<label class="form-label">Ảnh sản phẩm</label>
						<div class="td_img">
							<?php echo '<img src="' . base_url('assets/admin/images/products/' . $products['sHinhAnh']) . '" alt="Ảnh">'; ?>
						</div>
					</div>
					<div class="mb-4 col-6">
						<label for="sTenSP" class="form-label">Tên sản phẩm</label>
						<input type="text" value="<?= $products['sTenSP'] ?>" placeholder="Nhập tên sản phẩm" class="form-control" id="sTenSP" name="sTenSP">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 mb-3">
						<label class="form-label">Ảnh sản phẩm</label>
						<input class="form-control" type="file" name="sHinhAnh" value="">
					</div>
					<div class="col-sm-6 mb-3">
						<label class="form-label">Nhóm sản phẩm</label>
						<select class="form-select" name="FK_iMaNhom">
							<?php foreach ($productsGroup as $productGroup) : ?>
								<option value="<?= $productGroup['PK_iMaNhom'] ?>" <?php if ($productGroup['PK_iMaNhom'] == $products['FK_iMaNhom']) : ?> selected <?php endif; ?>><?= $productGroup['sTenNhom'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<label for="sGhiChu">Ghi chú</label>
						<textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"><?= $products['sGhiChu'] ?></textarea>
					</div> <!-- row.// -->
					<div class="mb-4 col-6">
						<div class="row">
							<div class="col-6">
								<label class="form-label">Số lượng</label>
								<div>
									<input type="number" class="form-control" placeholder="VD: 10" name="fSoLuong" value="<?= $products['fSoLuong'] ?>" readonly>
								</div> <!-- col.// -->
							</div>
							<div class="col-6">
								<label for="sDVT" class="form-label">Đơn vị tính</label>
								<input type="text" value="<?= $products['sDVT'] ?>" placeholder="VD: Chiếc,..." class="form-control" id="sDVT" name="sDVT">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">

					</div>
					<div class="col-6">
						<div class="row">
							<div class="mb-4 col-6">
								<label for="fGiaBanLe" class="form-label">Giá bán</label>
								<input type="text" class="form-control giatien" id="fGiaBanLe" name="fGiaBanLe" placeholder="VD: 100.000đ" value="<?= $products['fGiaBanLe'] ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Lưu thay đổi</button>
				</div>
			</form>
		</div>
	</div> <!-- card end// -->
</section> <!-- content-main end// -->