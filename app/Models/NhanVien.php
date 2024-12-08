<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien';
    protected $fillable = ['ho_ten', 'ngay_sinh', 'gioi_tinh', 'dia_chi', 'sdt', 'email', 'phong_ban_id', 'chuc_vu_id', 'ngay_tuyen_dung', 'hinh_anh', 'trang_thai'];

    // Quan hệ với bảng PhongBan (mỗi nhân viên chỉ thuộc một phòng ban)
    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'phong_ban_id');
    }

    // Quan hệ với bảng ChucVu (mỗi nhân viên chỉ có một chức vụ)
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chuc_vu_id');
    }

    // Quan hệ với bảng Luong (mỗi nhân viên có thể có nhiều lương)
    public function luong()
    {
        return $this->hasMany(Luong::class);
    }

    // Quan hệ với bảng ChamCong (mỗi nhân viên có thể có nhiều chấm công)
    public function chamCong()
    {
        return $this->hasMany(ChamCong::class);
    }

    // Quan hệ với bảng NghiPhep (mỗi nhân viên có thể có nhiều nghỉ phép)
    public function nghiPhep()
    {
        return $this->hasMany(NghiPhep::class);
    }

    // Quan hệ với bảng HopDong (mỗi nhân viên có thể có nhiều hợp đồng)
    public function hopDong()
    {
        return $this->hasMany(HopDong::class);
    }

    // Quan hệ với bảng BaoHiem (mỗi nhân viên có thể có nhiều bảo hiểm)
    public function baoHiem()
    {
        return $this->hasMany(BaoHiem::class);
    }

    // Quan hệ với bảng PhuCap (mỗi nhân viên có thể có nhiều phụ cấp)
    public function phuCap()
    {
        return $this->hasMany(PhuCap::class);
    }

    // Quan hệ với bảng KhenThuongKyLuat (mỗi nhân viên có thể có nhiều khen thưởng/kỷ luật)
    public function khenThuongKyLuat()
    {
        return $this->hasMany(KhenThuongKyLuat::class);
    }

    // Quan hệ với bảng UngLuong (mỗi nhân viên có thể có nhiều ứng lương)
    public function ungLuong()
    {
        return $this->hasMany(UngLuong::class);
    }

    // Quan hệ một-một với người dùng
    public function nguoiDung()
    {
        return $this->hasOne(NguoiDung::class, 'nhan_vien_id');
    }
}
