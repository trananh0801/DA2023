<section class="content-main">

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
					<input type="text" placeholder="Search..." class="form-control">
				</div>
				<div class="col-lg-2 col-6 col-md-3">
					<select class="form-select">
						<option>Status</option>
						<option>Active</option>
						<option>Disabled</option>
						<option>Show all</option>
					</select>
				</div>
				<div class="col-lg-2 col-6 col-md-3">
					<select class="form-select">
						<option>Show 20</option>
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
							<th scope="col">Ảnh sản phẩm</th>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Giá nhập</th>
							<th scope="col">Hạn sử dụng</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Nhóm</th>
							<th scope="col">Trạng thái</th>
							<th scope="col" class="text-end"> Tác vụ </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product) : ?>
							<tr>
								<td>STT</td>
								<td><img src="<?php echo base_url('writable/uploads/products/' . $product['sHinhAnh']); ?>" alt="Ảnh sản phẩm">
								</td>
								<td><b><?= $product['sTenSP'] ?></b></td>
								<td><?= $product['fGiaNhap'] ?></td>
								<td><b><?= $product['dHSD'] ?></b></td>
								<td><?= $product['fSoLuong'] ?></td>
								<td><b><?= $product['sTenNhom'] ?></b></td>
								<td><span class="badge rounded-pill alert-warning"><?= $product['sTenTrangThai'] ?></span></td>
								<td class="text-end">
									<button type="button" class="btn btn-info">Sửa</button>
									<button type="button" class="btn btn-danger">Xóa</button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div> <!-- table-responsive //end -->
		</div> <!-- card-body end// -->
	</div> <!-- card end// -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
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
								<input type="text" value="<?= old('sTenSP') ?>" placeholder="Nhập tên nhóm" class="form-control" id="sTenSP" name="sTenSP">
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label">Số lượng</label>
								<div>
									<input type="number" class="form-control" placeholder="VD: 10" name="fSoLuong">
								</div> <!-- col.// -->
							</div> <!-- row.// -->
							<div class="mb-4 col-6">
								<label for="sDVT" class="form-label">Đơn vị tính</label>
								<input type="text" <?= old('sDVT') ?> placeholder="VD: Chiếc" class="form-control" id="sDVT" name="sDVT">
							</div>
						</div>
						<div class="row">
							<div class="mb-4 col-2">
								<label for="fGiaNhap" class="form-label">Giá nhập</label>
								<input type="text" <?= old('fGiaNhap') ?> class="form-control" id="fGiaNhap" name="fGiaNhap">
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanLe" class="form-label">Giá bán lẻ</label>
								<input type="text" <?= old('fGiaBanLe') ?> class="form-control" id="fGiaBanLe" name="fGiaBanLe">
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanSi" class="form-label">Giá bán sỉ</label>
								<input type="text" <?= old('fGiaBanSi') ?> class="form-control" id="fGiaBanSi" name="fGiaBanSi">
							</div>
							<div class="mb-4 col-6">
								<label for="dHSD" class="form-label">Hạn sử dụng</label>
								<input type="date" <?= old('dHSD') ?> class="form-control" id="dHSD" name="dHSD">
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
								<span class="form-check-label"> Kích hoạt </span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="sGhiChu">Ghi chú</label>
								<textarea class="form-control" id="sGhiChu" rows="3" name="sGhiChu"></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</section> <!-- content-main end// -->