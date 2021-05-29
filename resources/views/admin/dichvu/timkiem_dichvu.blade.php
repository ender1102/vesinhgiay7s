@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Tìm Kiếm Dịch Vụ</h3>
            </div>

            <div class="title_right">
                <form action="{{URL::to('/timkiem-dichvu')}}" method="get" role="search">
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
                        <span class="fa fa-bullhorn" style="color:red"> Tìm thấy {{count($timkiem_dichvu)}} kết quả</span>
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
                                {{-- <th>
                                <input type="checkbox" id="check-all" class="flat">
                                </th> --}}
                                    <th class="column-title">Tên Dịch Vụ</th>
                                    <th class="column-title">Đơn Giá</th>
                                    <th class="column-title" style="width:30px;">Sửa</th>
                                    <th class="column-title" style="width:30px;">Xoá</th>
                                <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>

                        @foreach ($timkiem_dichvu as $key => $timkiem)

                            <tbody>
                                <tr class="even pointer">
                                    {{-- <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td> --}}
                                    <td>{{$timkiem->TenDichVu}}</td>
                                    <td>{{number_format($timkiem->DonGia)}} ₫</td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-dichvu/'.$timkiem->IdDichVu)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-dichvu/'.$timkiem->IdDichVu)}}" class="active styling-delete" ui-toggle-class="">
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
