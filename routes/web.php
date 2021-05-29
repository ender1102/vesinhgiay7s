<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// front-end
// Route::get('/','HomeController@index');

// Route::get('/home','HomeController@index');

// Route::get('/monan','HomeController@monan');


//back-end
Route::get('/','AdminController@index');

Route::get('/dashboard','AdminController@show_dashboard')->name('dashboard');

Route::get('/logout','AdminController@logout');

Route::get('/thongtintk','AdminController@thongtintk');

Route::post('/capnhattk','AdminController@capnhattk');

Route::post('/xacthuc','AdminController@xacthuc');



// khách hàng
    Route::get('/them-khachhang','KhachHangController@them_khachhang');

    Route::get('/sua-khachhang/{IdKH}','KhachHangController@sua_khachhang');

    Route::get('/xoa-khachhang/{IdKH}','KhachHangController@xoa_khachhang');

    Route::get('/lietke-khachhang','KhachHangController@lietke_khachhang');

    Route::get('/timkiem-khachhang','KhachHangController@timkiem_khachhang')->name('timkiem-kh');


    // show
    Route::post('/luu-khachhang','KhachHangController@luu_khachhang');

    Route::post('/capnhat-khachhang/{IdKH}','KhachHangController@capnhat_khachhang');


// dịch vụ
    Route::get('/them-dichvu','DichVuController@them_dichvu');

    Route::get('/sua-dichvu/{IdDichVu}','DichVuController@sua_dichvu');

    Route::get('/xoa-dichvu/{IdDichVu}','DichVuController@xoa_dichvu');

    Route::get('/lietke-dichvu','DichVuController@lietke_dichvu');

    Route::get('/timkiem-dichvu','DichVuController@timkiem_dichvu')->name('timkiem-dv');


    Route::post('/luu-dichvu','DichVuController@luu_dichvu');

    Route::post('/capnhat-dichvu/{IdKH}','DichVuController@capnhat_dichvu');


// Phiếu đặt dịch vụ

    Route::get('/sua-donhang/{IdDatDV}','DonHangController@sua_donhang');

    Route::get('/xoa-donhang/{IdDatDV}','DonHangController@xoa_donhang');

    Route::get('/lietke-donhang','DonHangController@lietke_donhang')->name('lietke-donhang');

    Route::get('/timkiem-donhang','DonHangController@timkiem_donhang')->name('timkiem-donhang');


    Route::get('/duyet-donhang/{IdDatDV}','DonHangController@duyetdonhang')->name('Admin.donhang');
    // Route::get('/duyet-donhang2/{IdDatDV}','DonHangController@duyetdonhang2')->name('Admin.donhang2');
    Route::get('/duyet-donhang3/{IdDatDV}','DonHangController@duyetdonhang3')->name('Admin.donhang3');

    Route::get('/chitiet-donhang/{IdDatDV}','DonHangController@chitietdon')->name('Admin.chitietdon');


    Route::post('/capnhat-donhang/{IdDatDV}','DonHangController@capnhat_donhang');


    // Thêm đơn hàng
        Route::get('/datdv','DonHangController@datdv');

        Route::get('/them-donhang','DonHangController@them_donhang')->name('them_donhang');

        Route::get('/xulythemdonhang/{IdDichVu}','DonHangController@xulythemdonhang')->name('xulythemdonhang');

        Route::get('/xoa-item/{IdDichVu}', 'DonHangController@xoa_item')->name('xoa_item');

        Route::get('/soluong', 'DonHangController@soluong')->name('soluong');

        Route::get('tonggiatien', 'DonHangController@tonggiatien')->name('tonggiatien');

        Route::post('/luu-donhang','DonHangController@luu_donhang');

// Thống kê

    Route::get('/thongke','ThongKeController@thongke');
