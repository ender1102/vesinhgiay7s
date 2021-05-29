@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cập Nhật Đơn Hàng</h3>
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
                        <br />
                        @foreach ($sua_donhang as $key => $sua)
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{URL::to('/capnhat-donhang/'.$sua->IdDatDV)}}" method="post">
                            {{ csrf_field() }}

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Mã Đơn <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="iddatdv" name="IdDatDV" required="required" class="form-control" disabled value="{{$sua->IdDatDV}}">
                                </div>
                                {{-- <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="full-name" required="required" class="form-control " name="TenKH">
                                </div> --}}
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Khách Hàng <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="tenkh" name="TenKH" required="required" class="form-control" disabled value="{{$sua->TenKH}}">
                                </div>
                                {{-- <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="full-name" required="required" class="form-control " name="TenKH">
                                </div> --}}
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày Gửi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="ngaygui" name="NgayGui" required="required" class="form-control" disabled value="{{Carbon\Carbon::parse($sua->NgayGui)->format('d/m/Y')}}">
                                    {{-- <input type="date" id="gui" name="NgayGui" class="date-picker form-control" value="{{$sua->NgayGui}}" disable>
                                    <script>
                                        document.getElementById('gui').value = new Date().toISOString().slice(0, 10);
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script> --}}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày Nhận <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="ngaynhan" name="NgayNhan" class="date-picker form-control" required="required" value="{{$sua->NgayNhan}}">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Tổng Tiền <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="tong" name="TongGiaTien" required="required" class="form-control" disabled value="{{number_format($sua->TongGiaTien)}} ₫">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    {{-- <button class="btn btn-danger" type="button">Huỷ bỏ</button> --}}
                                    <button class="btn btn-primary" type="reset">Điền lại</button>
                                    <button class="btn btn-success" type="submit">Cập Nhật Đơn Hàng</button>
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
