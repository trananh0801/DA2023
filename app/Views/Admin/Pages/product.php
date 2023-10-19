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
							<th scope="col">Giá bán lẻ</th>
							<th scope="col">Giá bán sỉ</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Nhóm</th>
							<th scope="col" class="text-end"> Tác vụ </th>
						</tr>
					</thead>
					<tbody>
						<?php $k = 1 ?>
						<?php foreach ($products as $product) : ?>
							<tr>
								<td><?= $k++ ?></td>
								<td><img src="<?php echo base_url('writable/uploads/products/' . $product['sHinhAnh']); ?>" alt="Ảnh sản phẩm">
								</td>
								<td><b><?= $product['sTenSP'] ?></b></td>
								<td><span class="badge rounded-pill alert-warning"><?= $product['fGiaNhap'] ?>đ</span></td>
								<td><span class="badge rounded-pill alert-warning"><?= $product['fGiaBanLe'] ?>đ</span></td>
								<td><span class="badge rounded-pill alert-warning"><?= $product['fGiaBanSi'] ?>đ</span></td>
								<td><span class="badge rounded-pill alert-success"><?= $product['fSoLuong'] ?></span></td>
								<td><?= $product['sTenNhom'] ?></td>
								<td class="text-end">
									<a href="#" class="btn btn-light">Chi tiết</a>
									<div class="dropdown">
										<a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
										<div class="dropdown-menu">
											<a href="admin/product/edit/<?= $product['PK_iMaSP'] ?>" class="btn btn-primary dropdown-item editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo" data-FK_iMaNhom="<?= $product['FK_iMaNhom'] ?>" data-sTenSP="<?= $product['sTenSP'] ?>" data-fSoLuong="<?= $product['fSoLuong'] ?>" data-sDVT="<?= $product['sDVT'] ?>" data-fGiaNhap="<?= $product['fGiaNhap'] ?>" data-fGiaBanLe="<?= $product['fGiaBanLe'] ?>" data-fGiaBanSi="<?= $product['fGiaBanSi'] ?>" data-sHinhAnh="<?= $product['sHinhAnh'] ?>" data-sGhiChu="<?= $product['sGhiChu'] ?>" data-PK_iMaSP="<?= $product['PK_iMaSP'] ?>">Sửa</a>
											<a href="admin/product/delete/<?= $product['PK_iMaSP'] ?>" class="btn btn-danger dropdown-item deleteGroup text-danger" value="<?= $product['PK_iMaSP'] ?>" name="masanpham" onclick="myFunction()">Xóa</a>
										</div>
									</div> <!-- dropdown //end -->
								</td>
							</tr>
						<?php endforeach ?>
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
									<option value="">Chọn nhóm sản phẩm</option>
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
							<div class="mb-4 col-2">
								<label for="fGiaNhap" class="form-label">Giá nhập</label>
								<input type="text" <?= old('fGiaNhap') ?> class="form-control" id="fGiaNhap" name="fGiaNhap" value="0" readonly>
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanLe" class="form-label">Giá bán lẻ</label>
								<input type="text" <?= old('fGiaBanLe') ?> class="form-control" id="fGiaBanLe" name="fGiaBanLe" placeholder="VD: 100.000đ">
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanSi" class="form-label">Giá bán sỉ</label>
								<input type="text" <?= old('fGiaBanSi') ?> class="form-control" id="fGiaBanSi" name="fGiaBanSi" placeholder="VD: 90.000đ">
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

	<!-- Modal cập nhật -->
	<div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="admin/product/update" method="POST" enctype="multipart/form-data">

						<div class="row">
							<div class="col-sm-6 mb-3">
								<label class="form-label">Nhóm sản phẩm</label>
								<select class="form-select" name="FK_iMaNhom" id="manhom">
									<option value="">Chọn nhóm sản phẩm</option>
									<?php foreach ($productsGroup as $productGroup) : ?>
										<option value="<?= $productGroup['PK_iMaNhom'] ?>"><?= $productGroup['sTenNhom'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="mb-4 col-6">
								<label for="sTenSP" class="form-label">Tên sản phẩm</label>
								<input type="text" value="<?= old('sTenSP') ?>" placeholder="Nhập tên sản phẩm" class="form-control" id="tensp" name="sTenSP">
								<input type="text" value="<?= old('PK_iMaSP') ?>" placeholder="Nhập tên sản phẩm" class="form-control" id="masanpham" name="PK_iMaSP" hidden>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label">Số lượng</label>
								<div>
									<input type="number" class="form-control" placeholder="VD: 10" name="fSoLuong" value="0" readonly id="soluong">
								</div> <!-- col.// -->
							</div> <!-- row.// -->
							<div class="mb-4 col-6">
								<label for="sDVT" class="form-label">Đơn vị tính</label>
								<input type="text" <?= old('sDVT') ?> placeholder="VD: Chiếc,..." class="form-control" id="donvi" name="sDVT">
							</div>
						</div>
						<div class="row">
							<div class="mb-4 col-2">
								<label for="fGiaNhap" class="form-label">Giá nhập</label>
								<input type="text" <?= old('fGiaNhap') ?> class="form-control" id="gianhap" name="fGiaNhap" value="0" readonly>
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanLe" class="form-label">Giá bán lẻ</label>
								<input type="text" <?= old('fGiaBanLe') ?> class="form-control" id="giabanle" name="fGiaBanLe" placeholder="VD: 100.000đ">
							</div>
							<div class="mb-4 col-2">
								<label for="fGiaBanSi" class="form-label">Giá bán sỉ</label>
								<input type="text" <?= old('fGiaBanSi') ?> class="form-control" id="giabansi" name="fGiaBanSi" placeholder="VD: 90.000đ">
							</div>
							<div class="col-6">
								<label class="form-label">Ảnh sản phẩm</label>
								<input class="form-control" type="file" name="sHinhAnh" id="hinhanh">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="sGhiChu">Ghi chú</label>
								<textarea class="form-control" id="ghichu" rows="3" name="sGhiChu"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
							<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</section> <!-- content-main end// -->
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
	$(document).ready(function() {
		$(".editGroup").click(function() {
			// Thực hiện lấy dữ liệu khi click button
			FK_iMaNhom = $(this).attr("data-FK_iMaNhom");
			sTenSP = $(this).attr("data-sTenSP");
			fSoLuong = $(this).attr("data-fSoLuong");
			sDVT = $(this).attr("data-sDVT");
			fGiaNhap = $(this).attr("data-fGiaNhap");
			fGiaBanLe = $(this).attr("data-fGiaBanLe");
			fGiaBanSi = $(this).attr("data-fGiaBanSi");
			sHinhAnh = $(this).attr("data-sHinhAnh");
			sGhiChu = $(this).attr("data-sGhiChu");
			PK_iMaSP = $(this).attr("data-PK_iMaSP");
			//    console.log(PK_iMaSP);

			// Hiển thị lên trên form
			$("#manhom").val(FK_iMaNhom);
			$("#tensp").val(sTenSP);
			$("#soluong").val(fSoLuong);
			$("#donvi").val(sDVT);
			$("#gianhap").val(fGiaNhap);
			$("#giabanle").val(fGiaBanLe);
			$("#giabansi").val(fGiaBanSi);
			$("#ghichu").val(sGhiChu);
			$("#masanpham").val(PK_iMaSP);
			$("#hinhanh").val(sHinhAnh);
		})
	})

	function myFunction() {
		confirm("Bạn có chắc chắn muốn xóa sản phẩm này!");
	}
</script>