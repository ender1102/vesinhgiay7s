<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{URL::to('/dashboard')}}" class="site_title"><i class="fa fa-paint-brush"></i>
                <span>7S Sneaker Spa</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            {{-- <div class="profile_pic" style="width:100%"> --}}
            <div class="profile_pic">
                <img src="{{asset('public/backend/images/logo.png')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hello,</span>
                <h2>
                    <?php
                    $name = Session::get('admin_name');
                    if($name){
                        echo $name;
                    }
                ?>
                </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Chung</h3>
                <ul class="nav side-menu">
                    <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Tổng Quan</a>
                    </li>

                    <li><a><i class="fa fa-calendar"></i> Đơn Hàng <span class="fa fa-chevron-down"></span>
                            <span class="pull-right-container">
                                {{-- compact biến lên view --}}
                                @if ($donchuagiao > 0)
                                <span class="right badge badge-danger">{{$donchuagiao}}</span>
                                {{-- <small class="label pull-right bg-red"> &nbsp; {{$donchuagiao}} &nbsp; </small>
                                --}}
                                @endif
                            </span>
                        </a>
                        <ul class="nav child_menu" F>
                            <li><a href="{{URL::to('/datdv')}}">Thêm Đơn Hàng</a></li>
                            <li><a href="{{URL::to('/lietke-donhang')}}">Quản Lý Đơn Hàng &nbsp;
                                @if ($donchuagiao > 0)
                                <i class="fa fa-clock-o" style="color:gray"></i>
                                {{-- <small class="label pull-right bg-red"> &nbsp; {{$donchuagiao}} &nbsp; </small>
                                --}}
                                @endif
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Khách Hàng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{URL::to('/them-khachhang')}}">Thêm Khách Hàng</a></li>
                            <li><a href="{{URL::to('/lietke-khachhang')}}">Quản Lý Khách Hàng</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-magic"></i> Dịch Vụ <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{URL::to('/them-dichvu')}}">Thêm Dịch Vụ</a></li>
                            <li><a href="{{URL::to('/lietke-dichvu')}}">Quản Lý Dịch Vụ</a></li>
                        </ul>
                    </li>
                    {{-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">General Form</a></li>
                            <li><a href="form_advanced.html">Advanced Components</a></li>
                            <li><a href="form_validation.html">Form Validation</a></li>
                            <li><a href="form_wizards.html">Form Wizard</a></li>
                            <li><a href="form_upload.html">Form Upload</a></li>
                            <li><a href="form_buttons.html">Form Buttons</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> UI Elements <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="glyphicons.html">Glyphicons</a></li>
                            <li><a href="widgets.html">Widgets</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Chart JS</a></li>
                            <li><a href="chartjs2.html">Chart JS2</a></li>
                            <li><a href="morisjs.html">Moris JS</a></li>
                            <li><a href="echarts.html">ECharts</a></li>
                            <li><a href="other_charts.html">Other Charts</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
            <div class="menu_section">
                <h3>Công Cụ</h3>
                <ul class="nav side-menu">
                    <li><a href="{{URL::to('/thongke')}}"><i class="fa fa-bar-chart"></i> Thống Kê</a>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-sitemap"></i> Mới
                        <span class="label label-success pull-right">Coming Soon</span></a>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Mới
                        <span class="label label-success pull-right">Coming Soon</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{URL::to('/logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('public/backend/images/logo.png')}}" alt="">
                        <?php
                                $name = Session::get('admin_name');
                                if($name){
                                    echo $name;
                                }
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{URL::to('/thongtintk')}}"> Tài khoản</a>
                        <a class="dropdown-item" href="{{URL::to('/logout')}}">
                            <i class="fa fa-sign-out pull-right"></i> Đăng xuất
                        </a>
                    </div>
                </li>
                <li>
                    <a target="_blank" href="https://www.facebook.com/7S-Sneaker-Spa-V%E1%BB%87-Sinh-Gi%C3%A0y-C%E1%BA%A7n-Th%C6%A1-102702507972943">
                        <i class="fa fa-facebook-square" style="font-size: 26px"></i>
                    </a>
                </li>

                {{-- <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{asset('public/backend/images/logo.png')}}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were
                                    where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{asset('public/backend/images/logo.png')}}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were
                                    where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{asset('public/backend/images/logo.png')}}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were
                                    where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{asset('public/backend/images/logo.png')}}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were
                                    where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
