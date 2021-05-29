@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thông Tin Tài Khoản</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <?php
                                $message = Session::get('message');
                                if($message){
                                echo '<span class="fa fa-bullhorn" style="color:red"> '.$message.'</span>';
                                Session::put('message',null);
                                }
                            ?>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/capnhattk')}}" method="post">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="taikhoan">Tài Khoản
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="taikhoan" disabled class="form-control " name="admin_username" value="{{$thongtintk->admin_username}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ten">Tên Hiển Thị
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="ten" class="form-control " name="admin_name" value="{{$thongtintk->admin_name}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="number-phone">Số Điện Thoại
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="number-phone" name="admin_phone" class="form-control" value="{{$thongtintk->admin_phone}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Mật Khẩu
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="matkhau" name="admin_password" class="form-control" placeholder="Đổi mật khẩu">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href={{URL::to('/dashboard')}}>
                                    <button class="btn btn-danger" type="button">Huỷ bỏ</button>
                                    </a>
                                    <button class="btn btn-success" type="submit">Cập Nhật Thông Tin</button>
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
