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
          <h2 class="content-title">Danh sách khách hàng</h2>
     </div>

     <div class="card">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4">
                         <form action="admin/customer/create" method="POST">
                              <div class="mb-4">
                                   <label for="sTenKH" class="form-label">Tên khách hàng</label>
                                   <input type="text" placeholder="Nhập tên khách hàng" class="form-control" id="sTenKH" name="sTenKH" />
                              </div>
                              <div class="mb-4">
                                   <label for="sDiaChi" class="form-label">Địa chỉ</label>
                                   <input type="text" placeholder="Địa chỉ khách hàng" class="form-control" id="sDiaChi" name="sDiaChi" />
                              </div>
                              <div class="row">
                                   <div class="mb-4 col-6">
                                        <label for="sSDT" class="form-label">Số điện thoại</label>
                                        <input type="text" placeholder="Số điện thoại" class="form-control" id="sSDT" name="sSDT" />
                                   </div>
                                   <div class="mb-4 col-6">
                                        <label for="dNgaySinh" class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control" id="dNgaySinh" name="dNgaySinh" />
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-6 mb-3">
                                        <label class="form-label">Giới tính</label>
                                        <select class="form-select" name="sGioiTinh">
                                             <option value="Nam">Nam</option>
                                             <option value="Nữ">Nữ</option>
                                        </select>
                                   </div>
                                   <div class="col-6">
                                        <label class="form-label">Tích điểm</label>
                                        <div>
                                             <input type="number" class="form-control" placeholder="VD: 10" name="iTichDiem">
                                        </div> <!-- col.// -->
                                   </div> <!-- row.// -->
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

                         <table class="table table-hover">
                              <thead>
                                   <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Tích điểm</th>
                                        <th class="text-end">Thao tác</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($customers as $customer) : ?>
                                        <tr>
                                             <td>1</td>
                                             <td><?= $customer['sTenKH'] ?></td>
                                             <td><b><?= $customer['sDiaChi'] ?></b></td>
                                             <td><?= $customer['sSDT'] ?></td>
                                             <td><?= date('d/m/Y', strtotime($customer['dNgaySinh'])) ?></td>
                                             <td><?= $customer['sGioiTinh'] ?></td>
                                             <td><?= $customer['iTichDiem'] ?></td>
                                             <td class="text-end">
                                                  <button type="button" class="btn btn-sm btn-warning editGroup" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-sTenKH="<?= $customer['sTenKH'] ?>" data-sDiaChi="<?= $customer['sDiaChi'] ?>" data-sSDT="<?= $customer['sSDT'] ?>" data-dNgaySinh="<?= $customer['dNgaySinh'] ?>" data-sGioiTinh="<?= $customer['sGioiTinh'] ?>" data-iTichDiem="<?= $customer['iTichDiem'] ?>" data-sGhiChu="<?= $customer['sGhiChu'] ?>" value="<?= $customer['PK_iMaKH'] ?>">Sửa</button>
                                                  <a href="admin/customer/delete/<?= $customer['PK_iMaKH'] ?>" class="btn btn-sm btn-danger deleteGroup" value="<?= $customer['PK_iMaKH'] ?>" name="maNhom" onclick="return myFunction()">Xóa</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="admin/customer/update" method="POST" id="formGroupId">
                         <div class="mb-4">
                              <label for="sTenKH" class="form-label">Tên khách hàng</label>
                              <input type="text" placeholder="Nhập tên khách hàng" class="form-control" id="tenkh" name="sTenKH" />
                              <input type="text" value="<?= old('PK_iMaKH') ?>" class="form-control" id="makh" name="PK_iMaKH" hidden>
                         </div>
                         <div class="mb-4">
                              <label for="sDiaChi" class="form-label">Địa chỉ</label>
                              <input type="text" placeholder="Địa chỉ khách hàng" class="form-control" id="diachi" name="sDiaChi" />
                         </div>
                         <div class="row">
                              <div class="mb-4 col-6">
                                   <label for="sSDT" class="form-label">Số điện thoại</label>
                                   <input type="text" placeholder="Số điện thoại" class="form-control" id="sdt" name="sSDT" />
                              </div>
                              <div class="mb-4 col-6">
                                   <label for="dNgaySinh" class="form-label">Ngày sinh</label>
                                   <input type="date" class="form-control" id="ngaysinh" name="dNgaySinh" />
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-6 mb-3">
                                   <label class="form-label">Giới tính</label>
                                   <select class="form-select" name="sGioiTinh" id="gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                   </select>
                              </div>
                              <div class="col-6">
                                   <label class="form-label">Tích điểm</label>
                                   <div>
                                        <input type="number" class="form-control" placeholder="VD: 10" name="iTichDiem" id="tichdiem">
                                   </div> <!-- col.// -->
                              </div> <!-- row.// -->
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
     $(document).ready(function() {
          $(".editGroup").click(function() {
               // Thực hiện lấy dữ liệu khi click button
               sTenKH = $(this).attr("data-sTenKH");
               sDiaChi = $(this).attr("data-sDiaChi");
               sSDT = $(this).attr("data-sSDT");
               dNgaySinh = $(this).attr("data-dNgaySinh");
               sGioiTinh = $(this).attr("data-sGioiTinh");
               iTichDiem = $(this).attr("data-iTichDiem");
               sGhiChu = $(this).attr("data-sGhiChu");
               PK_iMaKH = $(this).val();

               // Hiển thị lên trên form
               $("#tenkh").val(sTenKH);
               $("#diachi").val(sDiaChi);
               $("#sdt").val(sSDT);
               $("#ngaysinh").val(dNgaySinh);
               $("#gioitinh").val(sGioiTinh);
               $("#tichdiem").val(iTichDiem);
               $("#ghichu").val(sGhiChu);
               $("#makh").val(PK_iMaKH);
          })
     })

     function myFunction() {
          return confirm("Bạn có chắc chắn muốn xóa khách hàng này!");
     }
</script>