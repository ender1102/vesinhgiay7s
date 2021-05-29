@extends('admin_layout')

@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3 class="animate__animated animate__slideInDown">Quản Lý Khách Hàng</h3>
            </div>

            <div class="title_right">
            <form action="{{URL::to('/timkiem-khachhang')}}" method="get" role="search">
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
        <div class="col-md-12 col-sm-12 animate__animated animate__fadeInRight">
            <div class="x_panel">
                <div class="x_title">
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
                                {{-- <th>
                                <input type="checkbox" id="check-all" class="flat">
                                </th> --}}
                                    <th class="column-title">Họ Và Tên</th>
                                    <th class="column-title">SĐT</th>
                                    <th class="column-title">Giới Tính</th>
                                    <th class="column-title">Sinh Nhật</th>
                                    <th class="column-title">Facebook</th>
                                    <th class="column-title">Điểm Tích Luỹ</th>
                                    <th class="column-title" style="width:30px;">Sửa</th>
                                    <th class="column-title" style="width:30px;">Xoá</th>
                                <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>

                        @foreach ($lietke_khachhang as $key => $khachhang)

                            <tbody>
                                <tr class="even pointer">
                                    {{-- <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td> --}}
                                    <td>{{$khachhang->TenKH}}</td>
                                    <td>{{$khachhang->SdtKH}}</td>
                                    <td>{{$khachhang->GioiTinhKH}}</td>
                                    <td>{{ Carbon\Carbon::parse($khachhang->SinhNhatKH)->format('d/m/Y') }}</td>
                                    <td>{{$khachhang->FbKH}}</td>
                                    <td>{{$khachhang->TichLuyKH}}</td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-khachhang/'.$khachhang->IdKH)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-khachhang/'.$khachhang->IdKH)}}" class="active styling-delete" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- <tr class="odd pointer">
                                    <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td>{{$khachhang->TenKH}}</td>
                                    <td>{{$khachhang->SdtKH}}</td>
                                    <td>{{$khachhang->GioiTinhKH}}</td>
                                    <td>{{ Carbon\Carbon::parse($khachhang->SinhNhatKH)->format('d/m/Y') }}</td>
                                    <td>{{$khachhang->FbKH}}</td>
                                    <td>{{$khachhang->TichLuyKH}}</td>
                                    <td style="text-align: center">
                                        <a href="{{URL::to('/sua-khachhang/'.$khachhang->IdKH)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="{{URL::to('/xoa-khachhang/'.$khachhang->IdKH)}}" class="active styling-delete" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody> --}}

                        @endforeach

                        </table>
                        <div class="float-left">
                            Hiển thị 10 kết quả

                        </div>
                        <div class="float-right">
                            {{$lietke_khachhang->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
