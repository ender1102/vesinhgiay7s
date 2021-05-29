<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDatDV extends Model
{
    protected $table = "phieudatdv";
    protected $primaryKey = "IdDatDV";
    protected $fillable = ['IdDatDV','IdKH','NgayGui','NgayNhan','TrangThai','TongGiaTien'];
    public $timestamps = false;

    public function chitietdatdv()
    {
        return $this->hasMany('App\ChiTietDatDV','IdDatDV','IdDatDV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function khachhang() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\KhachHang','IdKH','IdKH');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
