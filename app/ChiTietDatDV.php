<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatDV extends Model
{
    protected $table = "chitietdatdv";
    protected $foreignKey = ["IdDichVu","IdDatDV"];
    protected $fillable = ['IdDichVu','IdDatDV','SoLuongDV','DonGiaDV'];
    public $timestamps = false;

    public function dichvu() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\DichVu','IdDichVu','IdDichVu');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }

    public function phieudatdv() // phải viêt liền ko được cách ra hoặc _
    {
        return $this->belongsTo('App\PhieuDatDV','IdDatDV','IdDatDV');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
