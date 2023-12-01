
<aside class="navbar-aside" id="offcanvas_aside">

<div class="aside-top">
  <a href="page-index-1.html" class="brand-wrap">
    <img src="assets/admin/images/logo.svg" height="46" class="logo" alt="Ecommerce dashboard template">
  </a>
  <div>
    <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
  </div>
</div> <!-- aside-top.// -->

<nav>
  <ul class="menu-aside">
    <li class="menu-item <?= ($currentMenu == 'home') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/home"> <i class="icon material-icons md-home"></i> 
        <span class="text">Trang chủ</span> 
      </a> 
    </li>
    <li class="menu-item has-submenu <?= ($currentMenu == 'product/list' || $currentMenu == 'productGroup/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>  
        <span class="text">Quản lý sản phẩm</span> 
      </a> 
      <div class="submenu"> 
        <a href="admin/productGroup/list">Nhóm sản phẩm</a>
        <a href="admin/product/list">Sản phẩm</a>
      </div>
    </li>
    <li class="menu-item <?= ($currentMenu == 'order/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/order/list"> <i class="icon material-icons md-home"></i> 
        <span class="text">Quản lý đơn đặt hàng</span> 
      </a> 
    </li>
    <li class="menu-item has-submenu <?= ($currentMenu == 'importBill/list' || $currentMenu == 'returnBill/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="page-form-product-1.html"> <i class="icon material-icons md-add_box"></i>  
        <span class="text">Quản lý nhập kho</span> 
      </a> 
      <div class="submenu">
        <a href="admin/importBill/list">Phiếu nhập kho</a>
        <a href="admin/returnBill/list">Phiếu hoàn trả</a>
      </div>
    </li>
    <li class="menu-item <?= ($currentMenu == 'supplier/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/supplier/list"> <i class="icon material-icons md-home"></i> 
        <span class="text">Quản lý nhà cung cấp</span> 
      </a> 
    </li>
    <li class="menu-item <?= ($currentMenu == 'customer/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/customer/list"> <i class="icon material-icons md-home"></i> 
        <span class="text">Quản lý Khách hàng</span> 
      </a> 
    </li>
    <li class="menu-item <?= ($currentMenu == 'staff/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/staff/list"> <i class="icon material-icons md-home"></i> 
        <span class="text">Quản lý nhân viên</span> 
      </a> 
    </li>
    
    <li class="menu-item <?= ($currentMenu == 'promotion/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/promotion/list"> <i class="icon material-icons md-add_box"></i> 
        <span class="text">Danh sách khuyến mãi</span> 
      </a> 
    </li>
    <li class="menu-item <?= ($currentMenu == 'gift/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/gift/list"> <i class="icon material-icons md-add_box"></i> 
        <span class="text">Danh mục quà tặng</span> 
      </a> 
    </li>
    <li class="menu-item has-submenu <?= ($currentMenu == 'statistical/revenue' || $currentMenu == 'statistical/inventory') ? 'active' : '' ?>"> 
      <a class="menu-link" href="page-form-product-1.html"> <i class="icon material-icons md-add_box"></i>  
        <span class="text">Báo cáo thống kê</span> 
      </a> 
      <div class="submenu">
        <a href="admin/statistical/revenue">Báo cáo thống kê doanh thu</a>
        <a href="admin/statistical/inventory">Báo cáo thống kê sản phẩm</a>
      </div>
    </li>
  </ul>
  <hr>
  <ul class="menu-aside">
    <li class="menu-item <?= ($currentMenu == 'setting/list') ? 'active' : '' ?>"> 
      <a class="menu-link" href="admin/setting/list"> <i class="icon material-icons md-home"></i> 
        <span class="text">Thông tin cá nhân</span> 
      </a> 
    </li>
  </ul>
  <br>
  <br>
</nav>
</aside>