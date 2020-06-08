<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
       <?php 

       $admin =DB::Table('admins')->join('role','admins.id_role','=','role.id')
            ->select('admins.*','role.role_key as role_key')
            ->where('admins.id',Auth::guard('admin')->user()->id)
            ->first();

        ?>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="header" style="display: flex; align-items: center;" >                    	
            	<div>
            		<img src="{{ url('/') }}/public/images/default-avatar-png-18.png" alt="" style="width: 40px; height: 40px; margin-right: 15px">
            	</div>
            	<div>
            		{{ Auth::guard('admin')->user()->full_name }}
            	</div>    
            </li>

            <li>
                <a href="{{route('backend.home')}}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                </a>
            </li>
        
        @if(($admin->role_key == 'manager'))
        
            <li>
                <a href="{{route('backend.report')}}">
                   <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Báo cáo bán hàng</span>
                </a>
            </li>

        @endif()
            
        @if(!($admin->role_key == 'manage_info'))
         
            <li>
                <a href="{{ route('backend.order-add-user') }}">
                    <i class="glyphicon glyphicon-plus"></i> <span>Tạo hóa đơn</span>
                </a>
            </li>
          
            <li>
                <a href="{{route('backend.order')}}">
                    <i class="glyphicon glyphicon-shopping-cart"></i> <span>Đơn hàng</span>
                </a>
            </li>
           
            <li>
                <a href="{{route('backend.user')}}">
                    <i class="fa fa-users"></i> <span>Khách hàng</span>
                </a>
            </li>

        @endif()


        @if(!($admin->role_key == 'manage_sale'))
            
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Danh mục</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.category-create')}}">Thêm mới</a></li>
                    <li><a href="{{ route('backend.category') }}"></i>Danh sách danh mục</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-coffee"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.products-create')}}">Thêm mới</a></li>
                    <li><a href="{{ route('backend.products') }}"></i>Danh sách sản phẩm</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> 
                    <span>Bài viết</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.news-create')}}">Thêm mới</a></li>
                    <li><a href="{{route('backend.news')}}"></i>Danh sách bài viết</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('backend.banner')}}">
                    <i class="fa fa-picture-o"></i> <span>Banner</span>
                </a>
            </li>

        @endif()
        
        @if($admin->role_key == 'manager')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Tài khoản Admin</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.admin-create')}}">Thêm mới</a></li>
                    <li><a href="{{route('backend.admin')}}"></i>Danh sách tài khoản</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('backend.role')}}">
                    <i class="fa fa-lock"></i> <span>Quyền quản lý</span>
                </a>
            </li>

        @endif()

        @if(!($admin->role_key == 'manage_sale'))

          <li>
                <a href="{{route('backend.about-us')}}">
                    <i class="fa fa-cog" aria-hidden="true"></i> <span>Thông tin cửa hàng</span>
                </a>
            </li>

        @endif()
        </ul>
      
    </section>
  
</aside>