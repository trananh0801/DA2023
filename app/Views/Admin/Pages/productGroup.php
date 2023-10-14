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
                                   <input type="text" placeholder="Type here" class="form-control" id="PK_iMaNhom" name="PK_iMaNhom" />
                              </div>
                              <div class="mb-4">
                                   <label for="sTenNhom" class="form-label">Tên nhóm sản phẩm</label>
                                   <input type="text" placeholder="Type here" class="form-control" id="sTenNhom" name="sTenNhom" />
                              </div>
                              <div class="d-grid">
                                   <button type="submit" class="btn btn-primary" id="insert">Thêm mới</button>
                              </div>
                              <div class="grid">
                                   <button type="submit" class="btn btn-primary" id="update">Cập nhật</button>
                                   <button type="submit" class="btn btn-danger" id="huy">Hủy bỏ</button>
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
                                   <?php foreach ($productGroups as $productGroup) : ?>
                                        <tr>
                                             <td>1</td>
                                             <td><?= $productGroup['PK_iMaNhom'] ?></td>
                                             <td><b><?= $productGroup['sTenNhom'] ?></b></td>
                                             <td class="text-end">
                                                  <button type="button" class="btn btn-info editGroup" data-sTenNhom="<?= $productGroup['sTenNhom'] ?>" value="<?= $productGroup['PK_iMaNhom'] ?>">Sửa</button>
                                                  <button type="button" class="btn btn-danger deleteGroup">xóa</button>
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
<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
     $(document).ready(function() {
          $("#update").hide();
          $("#huy").hide();
          $(".editGroup").click(function() {
               $("#insert").hide();
               $("#update").show();
               $("#huy").show();
               
               // Thực hiện lấy dữ liệu khi click button
               sTenNhom = $(this).attr("data-sTenNhom");
               PK_iMaNhom = $(this).val();
               $("#formGroupId").attr("action", "admin/productGroup/edit");
               // $("#formGroupId").attr("method", "get");
               // window.history.pushState({}, "Danh sách nhóm sản phẩm", "/admin/productGroup/edit/".concat(PK_iMaNhom));
               // console.log(PK_iMaNhom);

               // Hiển thị lên trên form
               $("#PK_iMaNhom").val(PK_iMaNhom);
               $("#sTenNhom").val(sTenNhom);
          })
     })
</script>