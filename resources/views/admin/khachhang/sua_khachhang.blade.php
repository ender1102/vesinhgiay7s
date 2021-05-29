@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cập Nhật Khách Hàng</h3>
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

                        @foreach ($sua_khachhang as $key => $sua)

                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/capnhat-khachhang/'.$sua->IdKH)}}" method="post">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Họ & Tên <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="full-name" required="required" class="form-control " name="TenKH" value="{{$sua->TenKH}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="facebook">Facebook</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="facebook" class="form-control " name="FbKH" value="{{$sua->FbKH}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="number-phone">Số Điện Thoại <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="number-phone" name="SdtKH" required="required" class="form-control" value="{{$sua->SdtKH}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Giới Tính <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="gioi-tinh" name="GioiTinhKH" required="required" class="form-control" value="{{$sua->GioiTinhKH}}">
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
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Sinh Nhật <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="birthday" name="SinhNhatKH" class="date-picker form-control" placeholder="dd-mm-yyyy" required="required" value="{{$sua->SinhNhatKH}}">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                    {{-- <input type="date" id="birthday" name="SinhNhatKH" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script> --}}
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-danger" type="button">Huỷ bỏ</button>
                                    <button class="btn btn-success" type="submit">Cập Nhật Khách Hàng</button>
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
