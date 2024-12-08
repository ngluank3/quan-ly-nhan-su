<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    protected $table = 'phong_ban';
    protected $fillable = ['ten_phong_ban'];

    // Quan hệ với bảng NhanVien (mỗi phòng ban có thể có nhiều nhân viên)
    public function nhanVien()
    {
        return $this->hasMany(NhanVien::class);
    }
}
