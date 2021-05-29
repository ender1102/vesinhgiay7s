@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3 class="animate__animated animate__slideInDown">Quản Lý Đơn Hàng</h3>
            </div>

            <div class="title_right">
            <form action="{{URL::to('/timkiem-donhang')}}" method="get" role="search">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search" required>
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
        <div class="col-md-12 col-sm-12 animate__animated animate__fadeInRight">
            <div class="x_panel">
                <div class="x_title" >
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
                                {{-- <th><input type="checkbox" id="check-all" class="flat"></th> --}}
                                <th class="column-title">Mã Đơn</th>
                                <th class="column-title">Tên Khách Hàng</th>
                                <th class="column-title">Ngày Gửi</th>
                                <th class="column-title">Ngày Nhận</th>
                                <th class="column-title">Trạng Thái</th>
                                <th class="column-title">Tổng Tiền</th>
                                <th class="column-title">Chi Tiết</th>
                                <th class="column-title" style="width:30px;">Sửa</th>
                                <th class="column-title" style="width:30px;">Xoá</th>
                                {{-- <th class="bulk-actions" colspan="9">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th> --}}
                            </tr>
                            </thead>

                        @foreach ($lietke_donhang as $key => $phieudatdv)

                            <tbody>
                                <tr class="even pointer">
                                    {{-- <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td> --}}
                                    <td>{{$phieudatdv->IdDatDV}}</td>
                                    <td>{{$phieudatdv->TenKH}}</td>
                                    <td>{{Carbon\Carbon::parse($phieudatdv->NgayGui)->format('d/m/Y')}}</td>
                                    <td>{{Carbon\Carbon::parse($phieudatdv->NgayNhan)->format('d/m/Y')}}</td>
                                    <td>
                                        @if ($phieudatdv->TrangThai == 0)
                                        <a onclick="return confirm('Chuyển trạng thái thành Đã giao?')" href="{{ route('Admin.donhang', ['IdDatDV'=>$phieudatdv->IdDatDV]) }}" title="Click để chuyển trạng thái đã giao"><span class="badge badge-warning">Chờ giao</span></a>
                                        <a onclick="return confirm('Bạn có chắc chắn huỷ đơn?')" href="{{ route('Admin.donhang3', ['IdDatDV'=>$phieudatdv->IdDatDV]) }}" title="Click để huỷ đơn"><span style="color:red"><small>Huỷ đơn</small></span></a>
                                        @elseif ($phieudatdv->TrangThai == 1)
                                            <span class="badge badge-primary">Đã giao</span>
                                        @else
                                            <span class="badge badge-danger">Đã huỷ</span>
                                        @endif
                                    </td>
                                    <td>{{number_format($phieudatdv->TongGiaTien)}} ₫</td>
                                    <td>
                                        <a href="{{URL::to('/chitiet-donhang/'.$phieudatdv->IdDatDV)}}">Xem</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-donhang/'.$phieudatdv->IdDatDV)}}" class="active styling-edit" ui-toggle-class="" title="Click để cập nhật đơn hàng">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-donhang/'.$phieudatdv->IdDatDV)}}" class="active styling-delete" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- <tr class="odd pointer">
                                    <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td>{{$phieudatdv->TenKH}}</td>
                                    <td>{{$phieudatdv->SdtKH}}</td>
                                    <td>{{$phieudatdv->GioiTinhKH}}</td>
                                    <td>{{ Carbon\Carbon::parse($phieudatdv->SinhNhatKH)->format('d/m/Y') }}</td>
                                    <td>{{$phieudatdv->FbKH}}</td>
                                    <td>{{$phieudatdv->TichLuyKH}}</td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-phieudatdv/'.$phieudatdv->IdKH)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-phieudatdv/'.$phieudatdv->IdKH)}}" class="active styling-delete" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>--}}
                                @endforeach
                            </tbody>



                        </table>
                        <div class="float-left">
                            Hiển thị 10 kết quả

                        </div>
                        <div class="float-right">
                            {{$lietke_donhang->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
