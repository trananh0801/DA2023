
<section class="content-main" style="max-width: 720px">
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
		<h2 class="content-title">Thêm mới tài khoản</h2>
		<div>
			<a href="#" class="btn btn-outline-danger"> &times; Discard</a>
		</div>
	</div>

	<div class="card mb-4">
          <div class="card-body">
			<form action="admin/user/create" method="POST">
				<div class="mb-4">
					<label for="sTenTK" class="form-label">Tên tài khoản</label>
					<input type="text" value="<?= old('sTenTK')?>" placeholder="Type here" class="form-control" id="sTenTK" name="sTenTK">
				</div>

				<div class="mb-4">
                    <label for="sMatKhau" class="form-label">Mật khẩu</label>
					<input type="text" <?= old('sMatKhau')?> placeholder="Type here" class="form-control" id="sMatKhau" name="sMatKhau">
				</div>
				<div class="row gx-2">
					<div class="col-sm-6 mb-3">
					    <label class="form-label">Quyền</label>
					    <select class="form-select" name="FK_iMaQuyen">
					    	<option value="1"> Admin </option>
					    	<option value="2"> User</option>
					    </select>
				  	</div>
				</div> <!-- row.// -->

				<label class="form-check mb-4">
				  <input class="form-check-input" type="checkbox" value="1" name="FK_iMaTrangThai">
				  <span class="form-check-label">  Kích hoạt </span>
				</label>

				<button type="submit" class="btn btn-primary">Thêm mới</button>

			</form>
          </div>
    </div> <!-- card end// -->


</section> <!-- content-main end// -->