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
          <h2 class="content-title">Danh sách nhà cung cấp</h2>
     </div>

     <div class="card">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4">
                         <form action="admin/supplier/create" method="POST">
                              <div class="mb-4">
                                   <label for="sTenNCC" class="form-label">Tên nhà cung cấp</label>
                                   <input type="text" placeholder="Nhập tên nhà cung cấp" class="form-control" id="sTenNCC" name="sTenNCC" />
                              </div>
                              <div class="mb-4">
                                   <label for="sDiaChi" class="form-label">Địa chỉ</label>
                                   <input type="text" placeholder="Nhập địa chỉ" class="form-control" id="sDiaChi" name="sDiaChi" />
                              </div>
                              <div class="mb-4">
                                   <label for="sSDT" class="form-label">Số điện thoại</label>
                                   <input type="text" placeholder="Số điện thoại" class="form-control" id="sSDT" name="sSDT" />
                              </div>
                              <div class="mb-4">
                                   <label class="form-label">Ghi chú</label>
                                   <textarea class="form-control" rows="4" name="sGhiChu"></textarea>
                              </div>
                              <div class="d-grid">
                                   <button type="submit" class="btn btn-primary">Thêm mới</button>
                              </div>
                         </form>
                    </div>
                    <div class="col-md-8">
                         <table id="example" class="display nowrap" style="width:100%">
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
                                   <?php $k = 1 ?>
                                   <?php if (empty($suppliers)) : ?>
                                        <tr>
                                             <td colspan="6" class="text-center">Không có dữ liệu</td>
                                        </tr>
                                   <?php else : ?>
                                        <?php foreach ($suppliers as $supplier) : ?>
                                             <tr>
                                                  <td><?= $k++ ?></td>
                                                  <td><b><?= $supplier['sTenNCC'] ?></b></td>
                                                  <td><?= $supplier['sDiaChi'] ?></td>
                                                  <td><?= $supplier['sSDT'] ?></td>
                                                  <td><?= $supplier['sGhiChu'] ?></td>
                                                  <td class="text-end">
                                                       <button type="button" class="btn btn-sm btn-warning editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-sTenNCC="<?= $supplier['sTenNCC'] ?>" data-sDiaChi="<?= $supplier['sDiaChi'] ?>" data-sSDT="<?= $supplier['sSDT'] ?>" data-sGhiChu="<?= $supplier['sGhiChu'] ?>" value="<?= $supplier['PK_iMaNCC'] ?>">Sửa</button>
                                                       <a href="admin/supplier/delete/<?= $supplier['PK_iMaNCC'] ?>" class="btn btn-sm btn-danger deleteGroup" value="<?= $supplier['PK_iMaNCC'] ?>" name="maNhom" onclick="return myFunction()">Xóa</a>
                                                  </td>
                                             </tr>
                                        <?php endforeach ?>
                                   <?php endif ?>
                              </tbody>
                              <tfoot>
                              </tfoot>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="admin/supplier/update" method="POST" id="formGroupId">
                         <div class="mb-4">
                              <label for="sTenNCC" class="form-label">Tên nhà cung cấp</label>
                              <input type="text" placeholder="Nhập tên nhà cung cấp" class="form-control" id="tenncc" name="sTenNCC" />
                              <input type="text" value="<?= old('PK_iMaNCC') ?>" class="form-control" id="mancc" name="PK_iMaNCC" hidden>
                         </div>
                         <div class="mb-4">
                              <label for="sDiaChi" class="form-label">Địa chỉ</label>
                              <input type="text" placeholder="Nhập địa chỉ" class="form-control" id="diachi" name="sDiaChi" />
                         </div>
                         <div class="mb-4">
                              <label for="sSDT" class="form-label">Số điện thoại</label>
                              <input type="text" placeholder="Số điện thoại" class="form-control" id="sdt" name="sSDT" />
                         </div>
                         <div class="mb-4">
                              <label class="form-label">Ghi chú</label>
                              <textarea class="form-control" rows="4" name="sGhiChu" id="ghichu"></textarea>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button type="submit" class="btn btn-warning">Cập nhật</button>
                         </div>
                    </form>
               </div>

          </div>
     </div>
</div>

<script src="assets/admin/js/jquery-3.7.1.min.js"></script>
<script>
     setTimeout(function() {
          $('.myAlert').fadeOut('slow');
     }, 3000);
     $(document).ready(function() {
          $(".editGroup").click(function() {
               // Thực hiện lấy dữ liệu khi click button
               sTenNCC = $(this).attr("data-sTenNCC");
               sDiaChi = $(this).attr("data-sDiaChi");
               sSDT = $(this).attr("data-sSDT");
               sGhiChu = $(this).attr("data-sGhiChu");
               PK_iMaNCC = $(this).val();

               // Hiển thị lên trên form
               $("#tenncc").val(sTenNCC);
               $("#diachi").val(sDiaChi);
               $("#sdt").val(sSDT);
               $("#ghichu").val(sGhiChu);
               $("#mancc").val(PK_iMaNCC);
          })
     })

     function myFunction() {
          confirm("Bạn có chắc chắn muốn xóa nhà cung cấp này!");
     }
</script>