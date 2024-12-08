<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    // Hiển thị danh sách tất cả nhân viên
    public function index()
    {
        $nhanViens = NhanVien::all(); // Lấy tất cả các nhân viên
        return view('nhanvien.index', compact('nhanViens')); // Trả về view với danh sách nhân viên
    }

    // Hiển thị form để tạo nhân viên mới
    public function create()
    {
        return view('nhanvien.create'); // Trả về view tạo nhân viên
    }

    // Xử lý lưu nhân viên mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi lưu
        $request->validate([
            'ten' => 'required|string|max:255', // Tên nhân viên là bắt buộc và có độ dài tối đa 255 ký tự
            'ngay_sinh' => 'required|date', // Ngày sinh là bắt buộc và phải có định dạng ngày tháng
            'email' => 'nullable|email', // Email có thể trống nhưng nếu có thì phải đúng định dạng email
            'so_dien_thoai' => 'nullable|numeric', // Số điện thoại có thể trống nhưng nếu có thì phải là số
            'dia_chi' => 'nullable|string|max:255', // Địa chỉ có thể trống và có độ dài tối đa 255 ký tự
            'phong_ban_id' => 'required|exists:phong_ban,id', // Phòng ban phải tồn tại trong bảng phòng_ban
            'chuc_vu_id' => 'required|exists:chuc_vu,id', // Chức vụ phải tồn tại trong bảng chuc_vu
        ]);

        // Tạo nhân viên mới và lưu vào cơ sở dữ liệu
        NhanVien::create($request->all());
        return redirect()->route('nhanvien.index'); // Quay lại danh sách nhân viên
    }

    // Hiển thị chi tiết thông tin nhân viên
    public function show($id)
    {
        $nhanVien = NhanVien::findOrFail($id); // Lấy nhân viên theo ID
        return view('nhanvien.show', compact('nhanVien')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa thông tin nhân viên
    public function edit($id)
    {
        $nhanVien = NhanVien::findOrFail($id); // Lấy nhân viên theo ID
        return view('nhanvien.edit', compact('nhanVien')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật thông tin nhân viên
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        $request->validate([
            'ten' => 'required|string|max:255',
            'ngay_sinh' => 'required|date',
            'email' => 'nullable|email',
            'so_dien_thoai' => 'nullable|numeric',
            'dia_chi' => 'nullable|string|max:255',
            'phong_ban_id' => 'required|exists:phong_ban,id',
            'chuc_vu_id' => 'required|exists:chuc_vu,id',
        ]);

        $nhanVien = NhanVien::findOrFail($id); // Lấy nhân viên theo ID
        $nhanVien->update($request->all()); // Cập nhật thông tin nhân viên

        return redirect()->route('nhanvien.index'); // Quay lại danh sách nhân viên
    }

    // Xử lý xóa nhân viên
    public function destroy($id)
    {
        $nhanVien = NhanVien::findOrFail($id); // Lấy nhân viên theo ID
        $nhanVien->delete(); // Xóa nhân viên
        return redirect()->route('nhanvien.index'); // Quay lại danh sách nhân viên
    }
}
