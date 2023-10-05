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
     <h2 class="content-title">Danh sách nhà cung cấp</h2>
</div>

<div class="card">
     <div class="card-body">
          <div class="row">
               <div class="col-md-4">
                    <form action="admin/supplier/create" method="POST">
                         <div class="mb-4">
                              <label for="sTenNCC" class="form-label">Tên nhà cung cấp</label>
                              <input type="text" placeholder="Type here" class="form-control" id="sTenNCC" name="sTenNCC"/>
                         </div>
                         <div class="mb-4">
                              <label for="sDiaChi" class="form-label">Địa chỉ</label>
                              <input type="text" placeholder="Type here" class="form-control" id="sDiaChi" name="sDiaChi" />
                         </div>
                         <div class="mb-4">
                              <label for="sSDT" class="form-label">Số điện thoại</label>
                              <input type="text" placeholder="Type here" class="form-control" id="sSDT" name="sSDT"/>
                         </div>
                         <div class="mb-4">
                              <label class="form-label">Ghi chú</label>
                              <textarea placeholder="Type here" class="form-control" rows="4" name="sGhiChu"></textarea>
                         </div>
                         <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Thêm mới</button>
                         </div>
                    </form>
               </div>
               <div class="col-md-8">
                    
<table class="table table-hover">
<thead>
  <tr>
    <th>STT</th>
    <th>Tên nhà cung cấp</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Ghi chú</th>
    <th class="text-end">Thao tác</th>
  </tr>
</thead>
<tbody>
<?php foreach($suppliers as $supplier) :?>
  <tr>
        <td>1</td>
       <td><?= $supplier['sTenNCC'] ?></td>
       <td><b><?= $supplier['sDiaChi'] ?></b></td>
       <td><?= $supplier['sSDT'] ?></td>
       <td><?= $supplier['sGhiChu'] ?></td>
       <td class="text-end">
            <button type="button" class="btn btn-info">Sửa</button>
            <button type="button" class="btn btn-danger">Xóa</button>
       </td>
  </tr>
  <?php endforeach ?>
</tbody>
</table>

               </div> <!-- .col// -->
          </div> <!-- .row // -->
     </div> <!-- card body .// -->
</div> <!-- card .// -->
</section> <!-- content-main end// -->