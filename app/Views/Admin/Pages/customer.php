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
                                             <td><?= $customer['dNgaySinh'] ?></td>
                                             <td><?= $customer['sGioiTinh'] ?></td>
                                             <td><?= $customer['iTichDiem'] ?></td>
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