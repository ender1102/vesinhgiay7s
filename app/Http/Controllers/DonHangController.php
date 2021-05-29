<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PhieuDatDV;
use App\ChiTietDatDV;
use App\KhachHang;
use App\DichVu;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class DonHangController extends Controller
{
    // Hàm kiểm tra có admin id không (đã đăng nhập)
    public function authlogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/')->send();
        }
    }



    // Xem đơn hàng
    public function lietke_donhang()
    {
        $this->authlogin();
        $lietke_donhang = DB::table('phieudatdv')
            ->join('khachhang', 'khachhang.IdKH', '=', 'phieudatdv.IdKH')
            ->orderBy('TrangThai', 'asc')
            ->paginate(10);

        $quanly_phieudatdv = view('admin.donhang.lietke_donhang')->with('lietke_donhang', $lietke_donhang);

        return view('admin_layout')->with('admin.donhang.lietke_donhang', $quanly_phieudatdv);
    }



    // Sửa đơn hàng
    public function sua_donhang($IdDatDV)
    {
        $this->authlogin();
        $sua_donhang = DB::table('phieudatdv')
            ->join('khachhang', 'khachhang.IdKH', '=', 'phieudatdv.IdKH')
            ->where('IdDatDV', $IdDatDV)->get();
        $quanly_donhang = view('admin.donhang.sua_donhang')->with('sua_donhang', $sua_donhang);

        return view('admin_layout')->with('admin.donhang.sua_donhang', $quanly_donhang);
    }


    public function capnhat_donhang(Request $request, $IdDatDV)
    {
        $this->authlogin();
        $data = array();
        //$data['TenKH'] = $request->TenKH;
        //$data['NgayGui'] = $request->GioiTinhKH;
        $data['NgayNhan'] = $request->NgayNhan;
        //$data['SinhNhatKH'] = $request->SinhNhatKH;
        //$data['FbKH'] = $request->FbKH;

        DB::table('phieudatdv')->where('IdDatDV', $IdDatDV)->update($data);
        Session::put('message', ' Cập nhật đơn hàng thành công');
        return Redirect::to('lietke-donhang');
    }


    public function xoa_donhang($IdDatDV)
    {
        $this->authlogin();
        DB::table('phieudatdv')->where('IdDatDV', $IdDatDV)->delete();
        Session::put('message', ' Xoá đơn hàng thành công');
        return Redirect::to('lietke-donhang');
    }

    public function chitietdon($IdDatDV)
    {
        $this->authlogin();
        //Lấy dữ liệu từ bảng ban tham gia vào bảng phieudatdv theo IdBan
        $lietke_chitietdatdv = DB::table('phieudatdv')
            ->join('khachhang', 'khachhang.IdKH', '=', 'phieudatdv.IdKH')
            ->join('chitietdatdv', 'chitietdatdv.IdDatDV', '=', 'phieudatdv.IdDatDV')
            ->join('dichvu', 'dichvu.IdDichVu', '=', 'chitietdatdv.IdDichVu')
            ->where('chitietdatdv.IdDatDV', $IdDatDV)
            ->get();
        //dd($lietke_chitietdatdv);
        foreach ($lietke_chitietdatdv as $key => $item) {
            $TenKH = $item->TenKH;
            $SdtKH = $item->SdtKH;
            $NgayGui = $item->NgayGui;
        }

        return view('admin.donhang.chitiet_donhang', compact('lietke_chitietdatdv', 'IdDatDV', 'TenKH', 'SdtKH', 'NgayGui'));
    }

    public function timkiem_donhang(Request $request)
    {
        $this->authlogin();
        $timkiem_donhang = DB::table('phieudatdv')->join('khachhang', 'khachhang.IdKH', '=', 'phieudatdv.IdKH')
            ->where('TenKH', 'like', '%' . $request->search . '%')
            ->orWhere('TongGiaTien', '%' . $request->search . '%')
            ->orWhere('IdDatDV', '%' . $request->search . '%')
            ->orWhere('NgayGui', 'like', '%' . $request->search . '%')
            ->get();
        //dd($timkiem_donhang);
        //return view('admin_layout')->with('admin.donhang.timkiem_donhang',$timkiem_donhang);
        return view('admin.donhang.timkiem_donhang', compact('timkiem_donhang'));
    }


    public function duyetdonhang($IdDatDV)
    {
        $this->authlogin();
        DB::table('phieudatdv')->where('IdDatDV', $IdDatDV)->update([
            'TrangThai' => 1
        ]);

        $khachhang = DB::table('phieudatdv')
            ->join('khachhang', 'khachhang.IdKH', '=', 'phieudatdv.IdKH')
            ->where('IdDatDV', $IdDatDV)
            ->first();

        $IdKH = $khachhang->IdKH;

        // foreach ($khachhang as $key => $item)
        // dd($item->IdKH);

        $TichLuyKH = (int) $khachhang->TongGiaTien / 10000;

        $update = KhachHang::where("IdKH", '=', $IdKH)->update([
            'TichLuyKH' => $khachhang->TichLuyKH + $TichLuyKH
        ]);

        //DB::table('khachhang')->where('IdKH',$IdKH)->update($update);
        Session::put('message', ' Khách hàng ' . $khachhang->TenKH . ' tích luỹ được ' . ($khachhang->TichLuyKH + $TichLuyKH) . ' điểm');
        return redirect()->back();
    }

    public function duyetdonhang3($IdDatDV)
    {
        $this->authlogin();
        DB::table('phieudatdv')->where('IdDatDV', $IdDatDV)->update([
            'TrangThai' => 3
        ]);
        Session::put('message', ' Bạn đã huỷ đơn số ' . $IdDatDV . ' thành công');
        return redirect()->back();
    }


    //Lấy món ăn và số lượng ở home đem qua đặt món
    public function datdv()
    {
        $this->authlogin();
        $dichvu = DB::table('dichvu')->get();

        return view('admin.donhang.them_buoc1', compact('dichvu'));
    }

    public function xulythemdonhang($IdDichVu)
    {
        $this->authlogin();
        $session = Session::get('giohang');
        if($session!=null){
            foreach ($session as $key => $value) {
                if ($IdDichVu == $value['IdDichVu']) {
                    $session[$key]['SoLuongDV']++;

                    Session::forget('giohang');
                    foreach ($session as $key => $value) {
                        Session::push('giohang', $value);
                    }

                    return redirect()->route('them_donhang');
                }
            }
        }
        $DichVu = DB::table('dichvu')
            ->where('IdDichVu', $IdDichVu)
            ->first();


        $data['IdDichVu'] = $DichVu->IdDichVu;
        $data['SoLuongDV'] = 1;
        $data['TenDichVu'] = $DichVu->TenDichVu;
        $data['DonGia'] = $DichVu->DonGia;

        // if(Session::get('giohang')==null){

        //     Session::push('giohang', $data);
        // }
        // //dd(Session::get('giohang'));
        // elseif(session()->exists('giohang')){
        //     $giohang = Session::get('giohang', []);
        //     foreach ($giohang as $gh){
        //         if($gh['IdDichVu']==$data['IdDichVu']){
        //             $gh['SoLuongDV']++;
        //         }
        //     }
        //     Session::set('giohang', $giohang);
        // }
        Session::push('giohang', $data);
        return redirect()->route('them_donhang');
    }

    public function xoa_item($IdDichVu)
    {
        $this->authlogin();
        session()->forget('giohang.' . $IdDichVu);
        return redirect()->route('them_donhang');
    }

    // Thêm đơn hàng
    public function them_donhang(Request $request)
    {
        $this->authlogin();
        $TongGiaTien = 0;
        //$SauGiam=0;
        $khachhang = DB::table('khachhang')->orderBy('TenKH', 'asc')->get();

        if (session()->exists('giohang')) {

            foreach (session()->get('giohang') as $giohang) {
                $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongDV']);
            }
        }

        // if(session()->exists('mgg')){
        //     $SauGiam=$TongGiaTien*(100-(session()->get('mgg')[0]['PhanTram']))/100;
        // }

        return view('admin.donhang.them_buoc2', compact('khachhang', 'TongGiaTien'));
    }

    // Lưu đơn hàng
    // public function luu_donhang(Request $request){
    //     $input = $request->all();

    //     $DonGiaDV = DB::table('dichvu')->where('IdDichVu','=',$input['IdDichVu'])->value('DonGia');

    //     $TongGiaTien = (int) $DonGiaDV * (int) $input['SoLuongDV'];

    //     $create = PhieuDatDV::create([
    //         'IdKH' => $input['IdKH'],
    //         'NgayGui' => $input['NgayGui'],
    //         'NgayNhan' => $input['NgayNhan'],
    //         'TrangThai' => 0,
    //         'TongGiaTien' => $TongGiaTien,
    //     ]);
    //     //dd($create->IdDatDV);
    //     $inputChiTiet['IdDichVu'] = $input['IdDichVu'];
    //     $inputChiTiet['IdDatDV'] = $create->IdDatDV;
    //     $inputChiTiet['SoLuongDV'] = $input['SoLuongDV'];
    //     $inputChiTiet['DonGiaDV'] = $DonGiaDV;

    //     $create = DB::table('chitietdatdv')->insert($inputChiTiet);

    //     Session::put('message',' Thêm đơn hàng thành công');
    //     return Redirect::to('them-donhang');
    // }

    public function soluong(Request $request)
    {
        $temp = session()->pull('giohang');
        $temp[$request->id]['SoLuongDV'] = $request->value;
        session()->put('giohang', $temp);
    }

    public function tonggiatien()
    {
        $TongGiaTien = 0;
        if (session()->exists('giohang')) {

            foreach (session()->get('giohang') as $giohang) {
                $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongDV']);
            }
        }
        // if(session()->exists('mgg')){
        //     $SauGiam=$TongGiaTien*(100-(session()->get('mgg')[0]['PhanTram']))/100;
        // }
        //,'SauGiam'=>$SauGiam
        return response()->json(['TongGiaTien' => $TongGiaTien], 200);
    }

    // Lưu đơn hàng
    public function luu_donhang(Request $request)
    {
        $TongGiaTien = 0;
        $input = $request->all();
        foreach (session()->get('giohang') as $giohang) {
            $TongGiaTien += $giohang['DonGia'] * intval($giohang['SoLuongDV']);
        }
        $IdDatDV = DB::table('phieudatdv')->insertGetId([
            'IdKH' => $input['IdKH'],
            'NgayGui' => $input['NgayGui'],
            'NgayNhan' => $input['NgayNhan'],
            'TrangThai' => 0,
            'TongGiaTien' => $TongGiaTien,
        ]);
        foreach (session()->get('giohang') as $giohang) {
            // $chitietdatdv=DB::table('chitietdatdv')
            // ->where('IdDichVu',$giohang['IdDichVu'])
            // ->where('IdDatDV',$giohang['IdDatDV'])
            // ->first();
            // $chitietdatdv
            // ?
            // $chitietdatdv->increment('SoLuongDV',1)
            // :
            DB::table('chitietdatdv')->insertGetId([
                'IdDatDV' => $IdDatDV,
                'IdDichVu' => $giohang['IdDichVu'],
                'SoLuongDV' => $giohang['SoLuongDV'],
                'DonGiaDV' => $giohang['DonGia'],
            ]);
        }
        session()->pull('giohang', 'default');
        return redirect()->route('lietke-donhang')->with('message', ' Thêm đơn hàng thành công!');
    }
}
