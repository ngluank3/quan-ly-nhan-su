<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'chuc_vu';
    protected $fillable = ['ten_chuc_vu'];

    // Quan hệ với bảng NhanVien (mỗi chức vụ có thể có nhiều nhân viên)
    public function nhanVien()
    {
        return $this->hasMany(NhanVien::class);
    }
}
