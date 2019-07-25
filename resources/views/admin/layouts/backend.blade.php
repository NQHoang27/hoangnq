<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <!--Bootstrap Main-->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/bootstrap.min.css">
  <!-- CSS Main -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/AdminLTE.min.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/font-awesome/css/font-awesome.min.css">
  <!-- Fonts chữ -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/fonts/font-time.css">
  <!--  -->
  <link rel="stylesheet" type="text/css" href="{{url('/')}}/backend/css/_all-skins.min.css">
  <link rel="shortcut icon" href="{{url('/')}}/backend/images/logo.jpg">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{route('admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b>CE</span>
        <!-- logo for regular state and mobile devices -->
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a class="dropdown-item" href="{{route('logout')}}">
                {{ __('Đăng xuất') }}
              </a>
            </li>
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              <a href="{!! route('user.change-language', ['en']) !!}">English</a>
              <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{url('/')}}/backend/images/user3-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{!!Auth::user()->name!!}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Đang truy cập</a>
            </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><b style="color:white"></b></li>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Tài khoản</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{route('tai-khoan')}}"><i class="fa fa-dashboard "></i> Danh sách tài khoản</a></li>
            <li><a href="{{route('them-tai-khoan')}}"><i class="fa fa-circle-o"></i> Thêm tài khoản</a></li>

            </ul>
            </li>
            {{--quản lý project--}}
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-ul"></i>
                <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('project')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                <li><a href="{{route('them-project')}}"><i class="fa fa-circle-o"></i> Thêm project</a></li>

              </ul>
            </li>
            {{--quản lý team--}}
            <li class="treeview">
              <a href="{{route('team')}}">
                <i class="fa fa-table"></i>
                <span>Team</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('team')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                <li><a href="{{route('them-team')}}"><i class="fa fa-circle-o"></i> Thêm team</a></li>

              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Trang admin
         </h1>
       </section>
       @yield('backend')

       <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
     <footer class="main-footer">
     </footer>
     <!-- jQuery 3 -->
     <script type="text/javascript" src="{{url('/')}}/backend/js/jquery.min.js"></script>

     <script type="text/javascript" src="{{url('/')}}/backend/js/bootstrap.min.js"></script>

     <script type="text/javascript" src="{{url('/')}}/backend/js/adminlte.min.js"></script>

     <script type="text/javascript" src="{{url('/')}}/backend/js/fastclick.js"></script>
     <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
    @yield('script')
  </body>
  </html>
