<section class="content-main">

		<div class="content-header">
			<h2 class="content-title">Danh sách người dùng</h2>
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
							<th scope="col">Tên tài khoản</th>
							<th scope="col">Trạng thái</th>
							<th scope="col">Quyền</th>
							<th scope="col" class="text-end"> Tác vụ </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user) :?>
						<tr>
							<td><?= $user['PK_iMaTK'] ?></td>
							<td><b><?= $user['sTenTK'] ?></b></td>
							<td><span class="badge rounded-pill alert-warning"><?= $user['sTenTrangThai'] ?></span></td>
							<td><?= $user['sTenQuyen'] ?></td>
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