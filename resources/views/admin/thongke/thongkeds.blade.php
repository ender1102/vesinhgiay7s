@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 class="animate__animated animate__slideInDown">Thống Kê Doanh Số</h3>
            </div>

            <div class="title_right">
                <form action="" method="get" role="search">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span
                                        class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- table -->
        <div class="col-md-12 col-sm-12 animate__animated animate__fadeInRight">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="animate__animated animate__flash">
                        {{-- Thông báo --}}
                        <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="fa fa-bullhorn" style="color:red">'.$message.'</span>';
                            Session::put('message',null);
                            }
                        ?>
                    </h2>
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
                    <div class="x_content">
                        {{-- content --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                                    <div class="filter">
                                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 ">
                                    <div class="demo-container" style="height:280px">
                                        <div id="chart_plot_02" class="demo-placeholder"></div>
                                    </div>
                                    <div class="tiles">
                                        <div class="col-md-4 tile">
                                        <span>Total Sessions</span>
                                        <h2>231,809</h2>
                                        <span class="sparkline11 graph" style="height: 160px;">
                                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                        </span>
                                        </div>
                                        <div class="col-md-4 tile">
                                        <span>Total Revenue</span>
                                        <h2>$231,809</h2>
                                        <span class="sparkline22 graph" style="height: 160px;">
                                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                        </span>
                                        </div>
                                        <div class="col-md-4 tile">
                                        <span>Total Sessions</span>
                                        <h2>231,809</h2>
                                        <span class="sparkline11 graph" style="height: 160px;">
                                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                        </span>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="col-md-3 col-sm-12 ">
                                    <div>
                                        <div class="x_title">
                                        <h2>Top Profiles</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                                        <ul class="list-unstyled top_profiles scroll-view">
                                        <li class="media event">
                                            <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                            </a>
                                            <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                            </a>
                                            <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-blue profile_thumb">
                                            <i class="fa fa-user blue"></i>
                                            </a>
                                            <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                            </a>
                                            <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                            </a>
                                            <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>
                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                            <p> <small>12 Sales Today</small>
                                            </p>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection