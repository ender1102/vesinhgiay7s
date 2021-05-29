@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 class="animate__animated animate__slideInLeft">Thêm Đơn Hàng</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div>
            <p>Bước 1 : Thêm dịch vụ vào đơn hàng</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped animate__animated animate__fadeInLeft" role="progressbar" style="width: 50%" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 animate__animated animate__fadeInUp">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
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
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br />
                        <form>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-1">
                                        @foreach ($dichvu as $key => $item)
                                            <div class="col-md-4">
                                                <div class="launch"
                                                    style="height: 150px;padding: 10px;margin-bottom: 20px;background: #2A3F54;box-shadow: 3px 4px #888888;font-size: 17px;color:white">
                                                    {{-- <img src="{{URL::to('public/upload/monan/'. $item->HinhAnh)}}"
                                                    class="img-responsive" alt="Food"> --}}
                                                    <div class="menu-desc text-center">
                                                        <h3>{{$item->TenDichVu}}</h3>
                                                        <h2 class="white">{{number_format($item->DonGia)}} ₫</h2>
                                                        <a href="{{route('xulythemdonhang',$item->IdDichVu)}}"
                                                        style="background: none;">
                                                            <button type="button" class="btn btn-primary">Thêm</button>
                                                            {{-- <span class="badge badge-primary">Thêm</span> --}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
