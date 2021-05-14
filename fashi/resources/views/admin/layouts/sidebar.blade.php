<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
       <!-- sidebar menu -->
       <ul class="sidebar-menu">
          <li class="active">
             <a href="{{ url('/admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
             <span class="pull-right-container">
             </span>
             </a>
          </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-list"></i><span>Categories</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{ url('/admin/add-category')}}">Add Category</a></li>
               <li><a href="{{ url('/admin/view-categories')}}">View Categories</a></li>
            </ul>
         </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-product-hunt"></i><span>Products</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{url('/admin/add-product')}}">Add Product</a></li>
               <li><a href="{{url('/admin/view-products')}}">View Products</a></li>
               <li><a href="{{url('/admin/import')}}">Import Products</a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-image"></i><span>Banners</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{url('/admin/add-banner')}}">Add Banner</a></li>
               <li><a href="{{url('/admin/banners')}}">View Banners</a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-comment"></i><span>Blogs</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{url('/admin/add_blog')}}">Add Blog</a></li>
               <li><a href="{{url('/admin/view_blogs')}}">View Blogs</a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-gift"></i><span>Coupons</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{url('/admin/add-coupon')}}">Add Coupon</a></li>
               <li><a href="{{url('/admin/view-coupons')}}">View Coupons</a></li>
            </ul>
         </li>

         <li class="treeview">
            <a href="{{url('admin/orders')}}">
            <i class="pe-7s-cart"></i><span>Orders</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
         </li>
         <li class="treeview">
            <a href="{{url('admin/customers')}}">
            <i class="fa fa-users"></i><span>Customers</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
         </li>
       </ul>
    </div>
    <!-- /.sidebar -->
 </aside>
