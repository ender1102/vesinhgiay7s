@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Tìm Kiếm Đơn Hàng</h3>
            </div>

            <div class="title_right">
                <form action="{{URL::to('/timkiem-donhang')}}" method="get" role="search">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
                    </span>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- table -->
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        {{-- Thông báo --}}
                        <span class="fa fa-bullhorn" style="color:red"> Tìm thấy {{count($timkiem_donhang)}} kết quả</span>
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
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Mã Đơn</th>
                                <th class="column-title">Tên Khách Hàng</th>
                                <th class="column-title">Ngày Gửi</th>
                                <th class="column-title">Ngày Nhận</th>
                                <th class="column-title">Trạng Thái</th>
                                <th class="column-title">Tổng Tiền</th>
                                <th class="column-title">Chi Tiết</th>
                                <th class="column-title" style="width:30px;">Sửa</th>
                                <th class="column-title" style="width:30px;">Xoá</th>
                            </tr>
                            </thead>

                        @foreach ($timkiem_donhang as $key => $timkiem)

                            <tbody>
                                <tr class="even pointer">
                                    <td>{{$timkiem->IdDatDV}}</td>
                                    <td>{{$timkiem->TenKH}}</td>
                                    <td>{{Carbon\Carbon::parse($timkiem->NgayGui)->format('d/m/Y')}}</td>
                                    <td>{{Carbon\Carbon::parse($timkiem->NgayNhan)->format('d/m/Y')}}</td>
                                    <td>
                                        @if ($timkiem->TrangThai == 0)
                                        <a onclick="return confirm('Chuyển trạng thái thành Đã giao?')" href="{{ route('Admin.donhang', ['IdDatDV'=>$timkiem->IdDatDV]) }}" title="Click để chuyển trạng thái đã giao"><span class="badge badge-warning">Chờ giao</span></a>
                                        <a onclick="return confirm('Bạn có chắc chắn huỷ đơn?')" href="{{ route('Admin.donhang3', ['IdDatDV'=>$timkiem->IdDatDV]) }}" title="Click để huỷ đơn"><span style="color:red"><small>Huỷ đơn</small></span></a>
                                        @elseif ($timkiem->TrangThai == 1)
                                            <span class="badge badge-primary">Đã giao</span>
                                        @else
                                            <span class="badge badge-danger">Đã huỷ</span>
                                        @endif
                                    </td>
                                    <td>{{number_format($timkiem->TongGiaTien)}} ₫</td>
                                    <td>
                                        <a href="{{URL::to('/chitiet-donhang/'.$timkiem->IdDatDV)}}">Xem</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-donhang/'.$timkiem->IdDatDV)}}" class="active styling-edit" ui-toggle-class="" title="Click để cập nhật ngày nhận">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-donhang/'.$timkiem->IdDatDV)}}" class="active styling-delete" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
