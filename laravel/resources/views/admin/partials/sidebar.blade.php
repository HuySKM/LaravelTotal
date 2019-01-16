<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="{{url('/')}}"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="{{url('/admin/')}}">
                            <i class="fa fa-power-off"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Shop</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/shop/category') }}"><i class="fa fa-angle-right"></i> Danh mục</a></li>
                            <li><a href="{{ url('/admin/shop/product') }}"><i class="fa fa-product-hunt"></i></i> Sản phẩm</a></li>
                            <li><a href="{{ url('/admin/shop/customer') }}"><i class="fa fa-angle-right"></i> Khách hàng</a></li>
                            <li><a href="{{ url('/admin/shop/order') }}"><i class="fa fa-angle-right"></i> Đơn hàng</a></li>
                            <li><a href="{{ url('/admin/shop/review') }}"><i class="fa fa-star"></i> Đánh giá</a></li>
                            <li><a href="{{ url('/admin/shop/brand') }}"><i class="fa fa-angle-right"></i> Nhãn hiệu</a></li>
                            <li><a href="{{ url('/admin/shop/statistic') }}"><i class="fa fa-angle-right"></i> Thống kê</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cc-visa"></i>
                            <span>Order</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/shop/product/order') }}"><i class="fa fa-star"></i> Đơn đặt hàng</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Content</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/content/category') }}"><i class="fa fa-angle-right"></i> Danh mục</a></li>
                            <li><a href="{{ url('/admin/content/post') }}"><i class="fa fa-angle-right"></i> Bài viết</a></li>
                            <li><a href="{{ url('/admin/content/page') }}"><i class="fa fa-angle-right"></i> Trang</a></li>
                            <li><a href="{{ url('/admin/content/tag') }}"><i class="fa fa-angle-right"></i> Tag</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/menu') }}"><i class="fa fa-angle-right"></i> Menu</a></li>
                            <li><a href="{{ url('/admin/menuitems') }}"><i class="fa fa-angle-right"></i> Menu items</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Admin</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/users') }}"><i class="fa fa-user"></i> Quản trị viên</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-medium"></i>
                            <span>Media</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/media') }}"><i class="fa fa-camera"></i> Media Manager</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/config') }}"><i class="fa fa-cogs"></i> Global Settings</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            <span>Newsletter</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/newsletter') }}"><i class="fa fa-bell"></i> Newsletter</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tv"></i>
                            <span>Banners</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/banners') }}"><i class="fa fa-tv"></i> Banners</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-phone"></i>
                            <span>Contact</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/contacts') }}"><i class="fa fa-phone"></i> Contacts</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            <span>Email</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/email/inbox') }}"><i class="fa fa-angle-right"></i> Inbox</a></li>
                            <li><a href="{{ url('/admin/email/draft') }}"><i class="fa fa-angle-right"></i> Draft</a></li>
                            <li><a href="{{ url('/admin/email/send') }}"><i class="fa fa-angle-right"></i> Send</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>