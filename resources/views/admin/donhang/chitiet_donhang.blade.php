@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Chi Tiết Đơn Hàng Số {{$IdDatDV}}</h3>
            <h5> Tên Khách Hàng : {{$TenKH}}</h5>
            <ul>
                <li>Sdt : {{$SdtKH}}</li>
                <li>Ngày gửi : {{Carbon\Carbon::parse($NgayGui)->format('d/m/Y')}}</li>
            </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- table -->
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
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

                <div class="x_content">

                    {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}

                    {{-- id="datatable-buttons" --}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead> <?php $i=1?>
                            <tr class="headings">
                                {{-- <th>
                                <input type="checkbox" id="check-all" class="flat">
                                </th> --}}
                                    <th class="column-title">STT</th>
                                    <th class="column-title">Dịch Vụ</th>
                                    <th class="column-title">Số Lượng</th>
                                    <th class="column-title">Đơn Giá</th>
                                <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>

                        @foreach ($lietke_chitietdatdv as $key => $chitiet)

                            <tbody>
                                <tr class="even pointer">
                                    <td>{{$i++}}</td>
                                    <td>{{$chitiet->TenDichVu}}</td>
                                    <td>{{$chitiet->SoLuongDV}}</td>
                                    <td>{{number_format($chitiet->DonGiaDV * $chitiet->SoLuongDV)}} ₫</td>
                                </tr>

                                @endforeach
                            </tbody>
                        <tr style="background-color: cornsilk">
                            <td><b>Tổng số tiền</b></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" style='color:green'> <b> {{number_format($chitiet->TongGiaTien)}} ₫ </b></td>
                        </tr>


                        </table>
                        <div>
                            <a href="{{URL::to('/lietke-donhang')}}"> ⇦ Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
