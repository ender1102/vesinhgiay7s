@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cập Nhật Dịch Vụ</h3>
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
                                echo '<span class="fa fa-bullhorn" style="color:red">'.$message.'</span>';
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

                        @foreach ($sua_dichvu as $key => $sua)

                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/capnhat-dichvu/'.$sua->IdDichVu)}}" method="post">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Tên Dịch Vụ <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="full-name" required="required" class="form-control " name="TenDichVu" value="{{$sua->TenDichVu}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="facebook">Đơn Giá <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" min="0" id="facebook" class="form-control " name="DonGia" value="{{$sua->DonGia}}">
                                </div>
                            </div>

                            {{-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Giới Tính</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="GioiTinhKH" value="Nam" class="join-btn" value="{{$sua->GioiTinhKH}}"> &nbsp; Nam &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="GioiTinhKH" value="Nữ" class="join-btn" value="{{$sua->GioiTinhKH}}"> Nữ
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-danger" type="button">Huỷ bỏ</button>
                                    <button class="btn btn-success" type="submit">Cập Nhật Dịch Vụ</button>
                                </div>
                            </div>

                            @endforeach

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
