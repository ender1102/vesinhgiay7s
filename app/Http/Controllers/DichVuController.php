<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DichVuController extends Controller
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

    // Thêm dịch vụ
    public function them_dichvu(){
        $this->authlogin();
        return view('admin.dichvu.them_dichvu');
    }

    // Xem dịch vụ
    public function lietke_dichvu(){
        $this->authlogin();
        $lietke_dichvu = DB::table('dichvu')->paginate(10);
        $quanly_dichvu = view('admin.dichvu.lietke_dichvu')->with('lietke_dichvu',$lietke_dichvu);

        return view('admin_layout')->with('admin.dichvu.lietke_dichvu',$quanly_dichvu);

    }


    // Lưu dịch vụ
    public function luu_dichvu(Request $request){
        $data = array();
        $data['TenDichVu'] = $request->TenDichVu;
        $data['DonGia'] = $request->DonGia;
        //dd($data);
        DB::table('dichvu')->insert($data);
        Session::put('message',' Thêm dịch vụ thành công');
        return Redirect::to('them-dichvu');
    }

    // Sửa dịch vụ
    public function sua_dichvu($IdDichVu){
        $this->authlogin();
        $sua_dichvu = DB::table('dichvu')->where('IdDichVu',$IdDichVu)->get();
        $quanly_dichvu = view('admin.dichvu.sua_dichvu')->with('sua_dichvu',$sua_dichvu);

        return view('admin_layout')->with('admin.dichvu.sua_dichvu',$quanly_dichvu);
    }

    public function capnhat_dichvu(Request $request, $IdDichVu){
        $data = array();
        $data['TenDichVu'] = $request->TenDichVu;
        $data['DonGia'] = $request->DonGia;

        DB::table('dichvu')->where('IdDichVu',$IdDichVu)->update($data);
        Session::put('message',' Cập nhật dịch vụ thành công');
        return Redirect::to('lietke-dichvu');
    }


    public function xoa_dichvu($IdDichVu){
        $this->authlogin();
        DB::table('dichvu')->where('IdDichVu',$IdDichVu)->delete();
        Session::put('message',' Xoá dịch vụ thành công');
        return Redirect::to('lietke-dichvu');
    }

    public function timkiem_dichvu(Request $request){
        $this->authlogin();
        $timkiem_dichvu = DB::table('dichvu')->where('TenDichVu','like','%'. $request->search .'%')
                                    ->orWhere('DonGia',$request->search)
                                    ->get();
        //dd($timkiem_dichvu);
        //return view('admin_layout')->with('admin.dichvu.timkiem_dichvu',$timkiem_dichvu);
        return view('admin.dichvu.timkiem_dichvu',compact('timkiem_dichvu'));
    }
}
