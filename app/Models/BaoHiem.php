<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoHiem extends Model
{
    use HasFactory;

    protected $table = 'bao_hiem'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'nhan_vien_id', // ID của nhân viên
        'loai_bao_hiem', // Loại bảo hiểm
        'so_tien_bao_hiem', // Số tiền bảo hiểm
    ];
    
    // Quan hệ với bảng nhân viên
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
