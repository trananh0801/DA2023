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
     <h2 class="content-title">Danh sách khách hàng</h2>
</div>

<div class="card">
     <div class="card-body">
          <div class="row">
               <div class="col-md-4">
                    <form action="admin/productGroup/create" method="POST">
                         <div class="mb-4">
                              <label for="PK_iMaNhom" class="form-label">Mã nhóm</label>
                              <input type="text" placeholder="Type here" class="form-control" id="PK_iMaNhom" name="PK_iMaNhom" readonly />
                         </div>
                         <div class="mb-4">
                              <label for="sTenNhom" class="form-label">Tên nhóm sản phẩm</label>
                              <input type="text" placeholder="Type here" class="form-control" id="sTenNhom" name="sTenNhom" />
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
    <th>Mã nhóm sản phẩm</th>
    <th>Tên nhóm sản phẩm</th>
    <th class="text-end">Thao tác</th>
  </tr>
</thead>
<tbody>
<?php foreach($productGroups as $productGroup) :?>
  <tr>
        <td>1</td>
       <td><?= $productGroup['PK_iMaNhom'] ?></td>
       <td><b><?= $productGroup['sTenNhom'] ?></b></td>
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