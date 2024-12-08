<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamCong extends Model
{
    use HasFactory;

    protected $table = 'cham_cong';
    protected $fillable = ['nhan_vien_id', 'ngay', 'gio_vao', 'gio_ra', 'gio_tang_ca', 'trang_thai'];

    // Quan hệ với bảng NhanVien (mỗi bản ghi chấm công thuộc về một nhân viên)
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
