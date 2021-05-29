<?php

namespace App\Http\Controllers;

use App\Admin;
use App\PhieuDatDV;
use App\ChiTietDatDV;
use App\KhachHang;
use App\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    //Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/')->send();
        }
    }

    public function index(){

        return view('admin_login');
    }

    public function show_dashboard(){
        $this->authlogin();

        // $donchuaduyetindex = PhieuDatDV::where('TrangThai',0)->get();
        $dondathang = PhieuDatDV::where('TrangThai',1)->count();
        $tongdoanhthu = DB::table('phieudatdv')->where('TrangThai',1)->sum('TongGiaTien');
        $tongkhachhang = KhachHang::count();
        $donchuaduyetindex = DB::table('phieudatdv')
                            ->join('khachhang','khachhang.IdKH','=','phieudatdv.IdKH')
                            ->where('TrangThai',0)
                            ->get();

        return view('admin.master',compact('dondathang','tongdoanhthu','tongkhachhang','donchuaduyetindex'));
    }

    public function xacthuc(Request $request)
    {
        // Không cần $this ->authlogin();
        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admin')
        ->where('admin_username',$admin_username)
        ->where('admin_password',$admin_password)
        ->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng !');
            return Redirect::to('/');
        }
    }

    public function logout(){
        $this ->authlogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/');
    }

    public function thongtintk(){
        $this ->authlogin();
        $admin_id = Session::get('admin_id');
        $thongtintk = DB::table('admin')->where('admin_id',$admin_id)->first();
        return view('admin.taikhoan.thongtintk',compact('thongtintk'));
    }

    public function capnhattk(Request $request){
        $this ->authlogin();
        $admin_name = $request->admin_name;
        $admin_phone = $request->admin_phone;
        ///$GioiTinhKH = $request->GioiTinhKH;
        $admin_password = md5($request->admin_password);

        $admin_id = Session::get('admin_id');
        $update = DB::table('admin')->where('admin_id',$admin_id)->update(
            [
                'admin_name' => $admin_name,
                'admin_phone' => $admin_phone,
                'admin_password' => $admin_password
            ]
        );

        $request->session()->flash('message', 'Cập nhật thông tin thành công');

        return redirect()->back();
    }
}
