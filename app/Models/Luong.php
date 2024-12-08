<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;

    protected $table = 'luong';
    protected $fillable = ['nhan_vien_id', 'luong_co_ban', 'thu_tncn', 'bao_hiem_xa_hoi', 'luong_nhan_duoc', 'ngay_cap_nhat'];

    // Quan hệ với bảng NhanVien (mỗi bản ghi lương thuộc về một nhân viên)
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
