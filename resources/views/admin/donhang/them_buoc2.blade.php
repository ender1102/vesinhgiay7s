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
            <p>Bước 2 : Thêm thông tin người đặt và số lượng dịch vụ</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped animate__animated animate__fadeInLeft" role="progressbar" style="width: 100%"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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

                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table">
                                <tr>
                                    <th class="column-title" width="40%">
                                        Dịch vụ
                                    </th>
                                    <th class="column-title">
                                        Đơn giá
                                    </th>
                                    <th class="column-title" width="15%">
                                        Số lượng
                                    </th>
                                    <th class="column-title text-right">
                                        Tổng tiền
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    @if(session()->exists('giohang'))
                                    @foreach (session()->get('giohang') as $key=>$giohang)
                                    <td>
                                        {{$giohang['TenDichVu']}}
                                    </td>
                                    <td>
                                        <p> {{number_format($giohang['DonGia']).' '.'$'}} </p>
                                    </td>
                                    <td>
                                        <div class="cart_quantity_buntton">
                                            <input class="cart_quantity_input quantity" type="number"
                                                name="SoLuongDV" value="{{$giohang['SoLuongDV']}}" min="1"
                                                autocomplete="off" size="2" data-id="{{$key}}"
                                                data-price="{{$giohang['DonGia']}}"
                                                onKeyUp="if(this.value>100){this.value='100';}else if(this.value<1){this.value='1';}" />
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <p class="cart_total_price" id="subtotal{{$key}}">
                                            <?php
                                                $subtotal = $giohang['DonGia'] * intval($giohang['SoLuongDV']);
                                                echo number_format($subtotal).' '.'₫';
                                            ?>
                                        </p>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{url('xoa-item',$key)}}">
                                            <i class="fa fa-trash-o" style="font-size: 20px"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                                {{-- <tr>
                                    <td>Mã giảm giá</td>
                                    <td>
                                        <form action="{{route('mgg')}}" method="post">
                                @csrf
                                <input type="text" name="MGG" id="" @if (session()->exists('mgg'))
                                value='{{session()->get('mgg')[0]['Ma']}}'
                                @endif>

                                <button type="submit">Đồng ý</button>
                                </form>
                                </td>
                                <td colspan="4"></td>
                                </tr> --}}
                                <tr>
                                    <td>
                                        <h4>Thành tiền</h4>
                                    </td>
                                    <td colspan="2"></td>
                                    <td class="text-right" id="total_price" style='color:green'>
                                        {{number_format($TongGiaTien)}} ₫
                                    </td>
                                    <td></td>
                                </tr>
                                {{-- <tr>
                                    <td>
                                        <h4 >Tổng tiền (Đã Giảm Giá)</h4>
                                    </td>
                                    <td colspan="3"></td>
                                    <td class="text-right" id="sau_giam">{{number_format($SauGiam)}} ₫</td>

                                </tr> --}}
                            </table>
                            <a href="{{url('/datdv')}}">
                            <button type="button" class="btn btn-primary">
                            Đặt thêm dịch vụ</button></a>

                        </div>
                        <br>
                        <div class="container">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                action="{{URL::to('/luu-donhang')}}" method="post">
                                {{ csrf_field() }}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Khách
                                        Hàng
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="IdKH" class="form-control input-md" required>
                                            <option value="" disabled selected>---Chọn khách hàng---</option>
                                            @foreach($khachhang as $key => $kh)
                                            <option value={{($kh->IdKH)}}> {{($kh->TenKH)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="full-name" required="required" class="form-control " name="TenKH">
                                </div> --}}
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày Gửi <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="gui" name="NgayGui" class="date-picker form-control">
                                        <script>
                                            document.getElementById('gui').value = new Date().toISOString().slice(0, 10);
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày Nhận </span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="nhan" name="NgayNhan" class="date-picker form-control">
                                        <script>
                                            // document.getElementById('nhan').value = new Date(now.getDate() + 3).toISOString().slice(0, 10);
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                        </script>
                                    </div>
                                </div>
                                <br>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-5">
                                        {{-- <button class="btn btn-danger" type="button">Huỷ bỏ</button> --}}
                                        {{-- <button class="btn btn-primary" type="reset">Điền lại</button> --}}
                                        <button class="btn btn-success" type="submit">Thêm Đơn Hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>


</script>
@endpush

@endsection
