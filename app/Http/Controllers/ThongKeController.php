<?php

namespace App\Http\Controllers;

use App\PhieuDatDV;
use App\ChiTietDatDV;
use App\KhachHang;
use App\DichVu;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ThongKeController extends Controller
{
    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/')->send();
        }
    }


    public function thongke(){
        $this->authlogin();
        return view('admin.thongke.thongkeds');
    }
}
