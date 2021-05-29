<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class KhachHang extends Model
{
    protected $table = "khachhang";
    protected $primaryKey = "IdKH";
    protected $fillable = ['IdKH','TenKH','GioiTinhKH','SdtKH','SinhNhatKH','FbKH','TichLuyKH'];
    public $timestamps = false;

    public function phieudatdv()
    {
        return $this->hasMany('App\PhieuDatDV','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
