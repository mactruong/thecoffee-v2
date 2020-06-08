<header class="main-header">
  <!-- Logo -->

    <a href="{{route('backend.home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>THE COFFEE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="nav navbar-nav">
            <div>Hôm nay là ngày: <?php echo date("d/m/Y"); ?></div>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
                <li style="position: relative; margin-right: 20px">
                    <a href="#" title="Tin nhắn mới" class="order-noti">
                        <i class="fa fa-comment"></i>
                        <div class="number-notification">8</div>
                    </a>
                </li>

                <li style="position: relative; margin-right: 20px">
                    <a href="#" title="Thông báo" class="order-noti">
                        <i class="fa fa-bell"></i>
                        <div class="number-notification">8</div>
                    </a>
                </li>

             <?php 

                $admin =DB::Table('admins')->join('role','admins.id_role','=','role.id')
                    ->select('admins.*','role.role_key as role_key')
                    ->where('admins.id',Auth::guard('admin')->user()->id)
                    ->first();

            ?>    

            @if(!($admin->role_key == 'manage_info'))

                <li style="position: relative; margin-right: 20px">
                    <a href="{{ route('backend.order-pending')}}" title="Đơn hàng mới" class="order-noti">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <div class="number-notification " id="number-notification"></div>
                    </a>
                </li>

            @endif() 

            @if(Auth::guard('admin')->check())

                <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle user-login" data-toggle="dropdown">
                        Xin chào {{ Auth::guard('admin')->user()->full_name }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="padding: 0">
                        <li>
                            <a href="{{ route('backend.change-password',['id'=>Auth::guard('admin')->user()->id ])}}">
                             <i class="fa fa-key color-teal" aria-hidden="true"></i></svg>Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.logout')}}">
                                <i class="fa fa-sign-out color-red" aria-hidden="true"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
                
            @else
                <li>
                    <a href="{{route('admin.login')}}" title="">Đăng nhập</a>
                </li>
            @endif

            </ul>
        </div>

    </nav>
</header>


