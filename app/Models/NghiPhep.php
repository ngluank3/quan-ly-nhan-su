<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NghiPhep extends Model
{
    use HasFactory;

    protected $table = 'nghi_phep';
    protected $fillable = ['nhan_vien_id', 'loai_nghi_phep', 'so_ngay_nghi', 'trang_thai', 'nguoi_duyet', 'ngay_bat_dau', 'ngay_ket_thuc'];

    // Quan hệ với bảng NhanVien (mỗi bản ghi nghỉ phép thuộc về một nhân viên)
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
