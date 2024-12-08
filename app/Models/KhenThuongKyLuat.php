<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuongKyLuat extends Model
{
    use HasFactory;

    // Quan hệ với bảng nhân viên
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
