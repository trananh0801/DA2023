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
          <h2 class="content-title">Danh sách nhóm sản phẩm</h2>
     </div>

     <div class="card">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4">
                         <form action="admin/productGroup/create" method="POST" id="formGroupId">
                              <div class="mb-4">
                                   <label for="PK_iMaNhom" class="form-label">Mã nhóm</label>
                                   <input type="text" placeholder="Mã nhóm sản phẩm" class="form-control" id="PK_iMaNhom" name="PK_iMaNhom" />
                              </div>
                              <div class="mb-4">
                                   <label for="sTenNhom" class="form-label">Tên nhóm sản phẩm</label>
                                   <input type="text" placeholder="Tên nhóm sản phẩm" class="form-control" id="sTenNhom" name="sTenNhom" />
                              </div>
                              <div class="d-grid">
                                   <button type="submit" class="btn btn-primary" id="insert">Thêm mới</button>
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
                                   <span hidden><?= $k = 1?></span>
                                   <?php foreach ($productGroups as $productGroup) : ?>
                                        <tr>
                                             <td><?= $k++ ?></td>
                                             <td><?= $productGroup['PK_iMaNhom'] ?></td>
                                             <td><b><?= $productGroup['sTenNhom'] ?></b></td>
                                             <td class="text-end">
                                                  <a href="#" class="btn btn-light">Chi tiết</a>
                                                  <div class="dropdown">
                                                       <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
                                                       <div class="dropdown-menu">
                                                            <button type="button" class="btn btn-primary dropdown-item editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-sTenNhom="<?= $productGroup['sTenNhom'] ?>" value="<?= $productGroup['PK_iMaNhom'] ?>">Sửa</button>
                                                            <a class="dropdown-item text-danger" href="#">Xóa</a>
                                                       </div>
                                                  </div> <!-- dropdown //end -->
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật nhóm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="admin/productGroup/edit" method="POST" id="formGroupId">
                         <div class="mb-4">
                              <label for="maNhom" class="form-label">Mã nhóm</label>
                              <input type="text" placeholder="Mã nhóm sản phẩm" class="form-control" id="maNhom" name="PK_iMaNhom" readonly/>
                         </div>
                         <div class="mb-4">
                              <label for="tenNhom" class="form-label">Tên nhóm sản phẩm</label>
                              <input type="text" placeholder="Tên nhóm sản phẩm" class="form-control" id="tenNhom" name="sTenNhom" />
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button type="submit" class="btn btn-primary">Cập nhật</button>
                         </div>
                    </form>
               </div>

          </div>
     </div>
</div>
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
     $(document).ready(function() {
          $(".editGroup").click(function() {
               // Thực hiện lấy dữ liệu khi click button
               sTenNhom = $(this).attr("data-sTenNhom");
               PK_iMaNhom = $(this).val();

               // Hiển thị lên trên form
               $("#maNhom").val(PK_iMaNhom);
               $("#tenNhom").val(sTenNhom);
          })
     })
</script>