<section class="content-main">

	<div class="content-header">
		<h2 class="content-title">Danh sách sản phẩm</h2>
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


</section> <!-- content-main end// -->