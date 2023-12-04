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
		object-position: center center;
		display: block;
	}
</style>
<section class="content-main">
	<?php if (session('errorsMsg')) : ?>
		<?php foreach (session('errorsMsg') as $error) : ?>
			<div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
				<strong>Lỗi: </strong> <?= $error ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php break; ?>
		<?php endforeach ?>
	<?php endif ?>
	<?php if (session('successMsg')) : ?>
		<?php foreach (session('successMsg') as $success) : ?>
			<div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
				<strong>Thành công: </strong> <?= $success ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php break; ?>
		<?php endforeach ?>
	<?php endif ?>
	<div class="content-header">
		<h2 class="content-title">Danh sách sản phẩm</h2>
		<div>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="material-icons md-plus"></i> Thêm mới sản phẩm</button>
		</div>
	</div>

	<div class="card mb-4">
		<header class="card-header">
			<div class="row gx-3">
				<div class="col-lg-4 col-md-6 me-auto">
					<input type="text" placeholder="Tìm kiếm..." class="form-control">
				</div>
				<div class="col-lg-2 col-6 col-md-3">
					<select class="form-select">
						<option>Trạng thái</option>
						<option>Active</option>
						<option>Disabled</option>
						<option>Show all</option>
					</select>
				</div>
				<div class="col-lg-2 col-6 col-md-3">
					<select class="form-select">
						<option>Hiển thị 20</option>
						<option>Show 30</option>
						<option>Show 40</option>
					</select>
				</div>
			</div>
		</header> <!-- card-header end// -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th scope="col">Hình ảnh</th>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Giá bán</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Phân loại</th>
							<th scope="col" class="text-end"> Tác vụ </th>
						</tr>
					</thead>
					<tbody>
						<?php $k = 1 ?>
						<?php if (empty($products)) : ?>
							<tr>
								<td colspan="9" class="text-center">Không có dữ liệu</td>
							</tr>
						<?php else : ?>
							<?php foreach ($products as $product) : ?>
								<tr>
									<td><?= $k++ ?></td>
									<td>
										<div class="td_img">
											<img src="<?php echo base_url('assets/admin/images/products/' . $product['sHinhAnh']) ?>" alt="Ảnh sản phẩm">
										</div>
									</td>
									<td><b><?= $product['sTenSP'] ?></b></td>
									<td><span class="badge rounded-pill alert-warning"><?= number_format($product['fGiaBanLe'], 0, '.', ',') ?> &#8363</span></td>
									<td><span class="badge rounded-pill alert-success"><?= $product['fSoLuong'] ?> <?= $product['sDVT'] ?></span></td>
									<td><?= $product['sTenNhom'] ?></td>
									<td class="text-end">
										<a href="admin/product/update/<?= $product['PK_iMaSP'] ?>" class="btn btn-sm btn-warning editGroup">Sửa</a>
										<a href="admin/product/delete/<?= $product['PK_iMaSP'] ?>" class="btn btn-sm btn-danger deleteGroup" value="<?= $product['PK_iMaSP'] ?>" name="maNhom" onclick="return myFunction()">Xóa</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div> <!-- table-responsive //end -->
		</div> <!-- card-body end// -->
	</div> <!-- card end// -->

	<!-- Modal thêm mới -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="admin/product/create" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6 mb-3">
								<label class="form-label">Nhóm sản phẩm</label>
								<select class="form-select" name="FK_iMaNhom">
									<?php foreach ($productsGroup as $productGroup) : ?>
										<option value="<?= $productGroup['PK_iMaNhom'] ?>"><?= $productGroup['sTenNhom'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="mb-4 col-6">
								<label for="sTenSP" class="form-label">Tên sản phẩm</label>
								<input type="text" value="<?= old('sTenSP') ?>" placeholder="Nhập tên sản phẩm" class="form-control" id="sTenSP" name="sTenSP">
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label">Số lượng</label>
								<div>
									<input type="number" class="form-control" placeholder="VD: 10" name="fSoLuong" value="0" readonly>
								</div> <!-- col.// -->
							</div> <!-- row.// -->
							<div class="mb-4 col-6">
								<label for="sDVT" class="form-label">Đơn vị tính</label>
								<input type="text" <?= old('sDVT') ?> placeholder="VD: Chiếc,..." class="form-control" id="sDVT" name="sDVT">
							</div>
						</div>
						<div class="row">
							<div class="mb-4 col-6">
								<label for="fGiaBanLe" class="form-label">Giá bán</label>
								<input type="text" <?= old('fGiaBanLe') ?> class="form-control giatien" id="fGiaBanLe" name="fGiaBanLe" placeholder="VD: 100.000đ">
							</div>
							<div class="col-6">
								<label class="form-label">Ảnh sản phẩm</label>
								<input class="form-control" type="file" name="sHinhAnh">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="sGhiChu">Ghi chú</label>
								<textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
							<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
	setTimeout(function() {
		$('.myAlert').fadeOut('slow');
	}, 3000);

	function myFunction() {
		return confirm("Bạn có chắc chắn muốn xóa sản phẩm này!");
	}

	//format giá tiền
	$(document).ready(function() {
		$('.giatien').on('input', function() {
			// Lấy giá trị từ input
			let inputValue = $(this).val();

			// Loại bỏ dấu phẩy ngăn cách hàng nghìn nếu có
			let cleanedValue = inputValue.replace(/,/g, '');

			// Format lại giá trị với dấu phẩy ngăn cách hàng nghìn
			let formattedValue = cleanedValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

			// Cập nhật giá trị vào input
			$(this).val(formattedValue);
		});

	});
</script>