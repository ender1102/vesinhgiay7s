<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = "dichvu";
    protected $primaryKey = "IdDichVu";
    protected $fillable = ['IdDichVu','TenDichVu','DonGia'];
    public $timestamps = false;


    public function chitietdatdv()
    {
        return $this->hasMany('App\ChiTietDatDV','IdDichVu','IdDichVu');
        // từ sản phẩm cha ra con xài hasone
        // (tên đường dẫn, 'khoa ngoại', khóa chính)
    }
}
