@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row animate__animated animate__backInRight" style="display: inline-block; width:100%">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count" >
                <span class="count_top"><i class="fa fa-edit"></i> Tổng Đơn Hàng</span>
                {{-- các biến được lấy từ AppServiceProvider.php (Biến global) --}}
                <div class="count green">{{$dondathang}} <span> đơn</span></div>
                {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Chưa Xử Lý</span>
                {{-- các biến được lấy từ AppServiceProvider.php (Biến global) --}}
                <div class="count">{{$donchuagiao}} <span> đơn</span></div>
                {{-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> --}}
            </div>
            <div class="col-md-4 col-sm-8  tile_stats_count">
                <span class="count_top"><i class="fa fa-dollar"></i> Tổng Doanh Thu</span>
                {{-- các biến được lấy từ AppServiceProvider.php (Biến global) --}}
                <div class="count green">{{number_format($tongdoanhthu)}} ₫</div>
                {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng Khách Hàng</span>
                {{-- các biến được lấy từ AppServiceProvider.php (Biến global) --}}
                <div class="count">{{$tongkhachhang}} <span> khách</span></div>
                {{-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> --}}
            </div>
            {{-- <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                <div class="count">2,315</div>
            </div> --}}
            {{-- <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                <div class="count">7,325</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> --}}
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row animate__animated animate__zoomIn">
        <div class="col-md-6 col-sm-6 ">
            <img src="{{asset('public/backend/images/1.jpg')}}" alt="7S Sneaker Spa" style="width:100%;height:500px;">
        </div>
        <div class="col-md-6 col-sm-6 ">
            <img src="{{asset('public/backend/images/2.jpg')}}" alt="7S Sneaker Spa" style="width:100%;height:500px;">
        </div>
    </div>
    <br />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Đơn Hàng Chưa Giao <small>Đang chờ xử lý</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <thead>
                            <tr class="headings">
                                <th>Mã Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Gửi</th>
                                <th>Ngày Nhận</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <th>Chi Tiết</th>
                                <th style="width:30px;">Sửa</th>
                                <th style="width:30px;">Xoá</th>
                            </tr>

                            @foreach ($donchuaduyetindex as $key => $dcd)
                        <tbody>
                            <tr>
                                <td scope="row">{{$dcd->IdDatDV}}</td>
                                <td>{{$dcd->TenKH}}</td>
                                <td>{{Carbon\Carbon::parse($dcd->NgayGui)->format('d/m/Y')}}</td>
                                <td>{{Carbon\Carbon::parse($dcd->NgayNhan)->format('d/m/Y')}}</td>
                                <td>
                                    @if ($dcd->TrangThai == 0)
                                    <span class="badge badge-warning">Chờ xử lý</span>
                                    @elseif ($dcd->TrangThai == 1)
                                    <span class="badge badge-primary">Đã giao</span>
                                    @else
                                    <span class="badge badge-danger">Đã huỷ</span>
                                    @endif
                                </td>
                                <td>{{number_format($dcd->TongGiaTien)}} ₫</td>
                                <td>
                                    <a href="{{URL::to('/chitiet-donhang/'.$dcd->IdDatDV)}}">Xem</a>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{URL::to('/sua-donhang/'.$dcd->IdDatDV)}}" class="active styling-edit"
                                        ui-toggle-class="" title="Click để cập nhật ngày nhận">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a onclick="return confirm('Bạn có chắc chắn xoá không?')"
                                        href="{{URL::to('/xoa-donhang/'.$dcd->IdDatDV)}}" class="active styling-delete"
                                        ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
                <div class="x_title">
                    <a href={{URL::to('/them-donhang')}}>
                    <button class="btn btn-success" type="submit">Thêm đơn hàng mới</button>
                    </a>

                    <a href={{URL::to('/lietke-donhang')}} class="nav navbar-right panel_toolbox">
                        <button class="btn btn-primary" type="submit">Đến trang duyệt đơn</button>
                        </a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Recent Activities <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-8 ">



            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Visitors location <small>geo-presentation</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <div class="col-md-4 hidden-small">
                                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                                    <table class="countries_list">
                                        <tbody>
                                            <tr>
                                                <td>United States</td>
                                                <td class="fs15 fw700 text-right">33%</td>
                                            </tr>
                                            <tr>
                                                <td>France</td>
                                                <td class="fs15 fw700 text-right">27%</td>
                                            </tr>
                                            <tr>
                                                <td>Germany</td>
                                                <td class="fs15 fw700 text-right">16%</td>
                                            </tr>
                                            <tr>
                                                <td>Spain</td>
                                                <td class="fs15 fw700 text-right">11%</td>
                                            </tr>
                                            <tr>
                                                <td>Britain</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">


                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>To Do List <small>Sample tasks</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="">
                                <ul class="to_do">
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End to do list -->

                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daily active users <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="temperature"><b>Monday</b>, 07:30 AM
                                        <span>F</span>
                                        <span><b>C</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="weather-icon">
                                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="weather-text">
                                        <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="weather-text pull-right">
                                    <h3 class="degrees">23</h3>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row weather-days">
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Mon</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas id="clear-day" width="32" height="32"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Tue</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas height="32" width="32" id="rain"></canvas>
                                        <h5>12 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Wed</h2>
                                        <h3 class="degrees">27</h3>
                                        <canvas height="32" width="32" id="snow"></canvas>
                                        <h5>14 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Thu</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="sleet"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Fri</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="wind"></canvas>
                                        <h5>11 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Sat</h2>
                                        <h3 class="degrees">26</h3>
                                        <canvas height="32" width="32" id="cloudy"></canvas>
                                        <h5>10 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end of weather widget -->


            </div>
        </div>
    </div> --}}
</div>
<!-- /page content -->
@endsection
