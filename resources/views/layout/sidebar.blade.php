<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <?php use Illuminate\Support\Facades\Auth; $user = Auth::user(); ?>
                @if ($user->quyen != 1)
                    <p>Xin chào, {{ $user->name }}</p>

                    <p><a href="{{url('logout')}}">Đăng xuất</a>
                    </p>
                @else
                        <p>Xin chào admin, {{ $user->name }}</p>
                    <p><a href="{{url('logout')}}">Đăng xuất</a>
                    </p>
                @endif

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if($user->quyen == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Tên miền</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin_domain_list') }}"><i class="fa fa-circle-o"></i>Danh sách tên miền</a></li>
                        <li><a href="{{route('admin_domain_create')}}"><i class="fa fa-circle-o"></i>Thêm mới tên miền</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin_user_list')}}"><i class="fa fa-circle-o"></i>Danh sách user</a></li>
                        <li><a href="{{route('admin_user_create')}}"><i class="fa fa-circle-o"></i>Thêm mới user</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
