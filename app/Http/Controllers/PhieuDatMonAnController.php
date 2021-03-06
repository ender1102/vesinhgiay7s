<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PhieuDatMonAnController extends Controller
{

    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    // Thêm phiếu đặt món ăn
    public function them_phieudatmonan(){
        $this->authlogin();
        return view('admin.phieudatmonan.them_phieudatmonan');
    }

    // Xem phiếu đặt món ăn
    // public function lietke_phieudatmonan(){
    //     $this->authlogin();
    //     //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
    //     $lietke_phieudatmonan = DB::table('phieudatmonan')
    //     ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
    //     ->join('chitietdatmon','chitietdatmon.IdDatMon','=','phieudatmonan.IdDatMon')
    //     ->join('monan','monan.IdMonAn','=','chitietdatmon.IdMonAn')
    //     ->get();

    //     $quanly_phieudatmonan = view('admin.phieudatmonan.lietke_phieudatmonan')->with('lietke_phieudatmonan',$lietke_phieudatmonan);

    //     return view('admin_layout')->with('admin.phieudatmonan.lietke_phieudatmonan',$quanly_phieudatmonan);
    // }
    public function lietke_phieudatmonan(){
        $this->authlogin();
        //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
        $lietke_phieudatmonan = DB::table('phieudatmonan')
        ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
        ->join('nhahang','nhahang.IdNhaHang','=','phieudatmonan.IdNhaHang')
        ->orderBy('TrangThai','asc')
        ->paginate(5);

        $quanly_phieudatmonan = view('admin.phieudatmonan.lietke_phieudatmonan')->with('lietke_phieudatmonan',$lietke_phieudatmonan);

        return view('admin_layout')->with('admin.phieudatmonan.lietke_phieudatmonan',$quanly_phieudatmonan);
    }

    // Lưu phiếu đặt món ăn
    public function luu_phieudatmonan(Request $request){
        $data = array();
        $data['IdDatMon'] = $request->IdDatMon;
        $data['IdBan'] = $request->IdBan;
        $data['TenMonDat'] = $request->TenMonDat;

        DB::table('phieudatmonan')->insert($data);
        Session::put('message','Thêm phiếu đặt món ăn thành công');
        return Redirect::to('them-phieudatmonan');
    }

    // Sửa phiếu đặt món ăn
    public function sua_phieudatmonan($IdDatMon){
        $this->authlogin();
        $sua_phieudatmonan = DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->get();
        $quanly_phieudatmonan = view('admin.phieudatmonan.sua_phieudatmonan')->with('sua_phieudatmonan',$sua_phieudatmonan);

        return view('admin_layout')->with('admin.phieudatmonan.sua_phieudatmonan',$quanly_phieudatmonan);
    }

    public function ChiTietPhieu($IdDatMon){
        $this->authlogin();
            //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatmonan theo IdBan
            $lietke_phieudatmonan = DB::table('phieudatmonan')
            ->join('khachhang','khachhang.IdKH','=','phieudatmonan.IdKH')
            ->join('chitietdatmon','chitietdatmon.IdDatMon','=','phieudatmonan.IdDatMon')
            ->join('monan','monan.IdMonAn','=','chitietdatmon.IdMonAn')
            ->where('chitietdatmon.IdDatMon',$IdDatMon)
            ->get();
            // dd($lietke_phieudatmonan);

        return view('admin.phieudatmonan.index',compact('lietke_phieudatmonan','IdDatMon'));
    }

    public function capnhat_phieudatmonan(Request $request, $IdDatMon){
        $data = array();
        $data['IdDatMon'] = $request->IdDatMon;
        $data['IdBan'] = $request->IdBan;
        $data['TenMonDat'] = $request->TenMonDat;

        DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->update($data);
        Session::put('message','Cập nhật phiếu đặt món ăn thành công');
        return Redirect::to('lietke-phieudatmonan');
    }


    public function DuyetMonAn($id){
       DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
           'TrangThai'=>1
       ]);
       return redirect()->back();
    }

    public function DuyetMonAn2($id){
        DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
            'TrangThai'=>2
        ]);
        return redirect()->back();
     }

     public function DuyetMonAn3($id){
        DB::table('phieudatmonan')->where('IdDatMon',$id)->update([
            'TrangThai'=>3
        ]);
        return redirect()->back();
     }


    public function xoa_phieudatmonan($IdDatMon){
        $this->authlogin();
        DB::table('phieudatmonan')->where('IdDatMon',$IdDatMon)->delete();
        Session::put('message','Xoá phiếu đặt món ăn thành công');
        return Redirect::to('lietke-phieudatmonan');
    }
}
