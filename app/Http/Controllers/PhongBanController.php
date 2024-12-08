<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    // Hiển thị danh sách tất cả phòng ban
    public function index()
    {
        $phongBans = PhongBan::all(); // Lấy tất cả các phòng ban
        return view('phongban.index', compact('phongBans')); // Trả về view với danh sách phòng ban
    }

    // Hiển thị form để tạo phòng ban mới
    public function create()
    {
        return view('phongban.create'); // Trả về view tạo phòng ban
    }

    // Xử lý lưu phòng ban mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi lưu
        $request->validate([
            'ten_phong_ban' => 'required|string|max:255', // Tên phòng ban là bắt buộc và có độ dài tối đa 255 ký tự
        ]);

        // Tạo phòng ban mới và lưu vào cơ sở dữ liệu
        PhongBan::create($request->all());
        return redirect()->route('phongban.index'); // Quay lại danh sách phòng ban
    }

    // Hiển thị chi tiết thông tin phòng ban
    public function show($id)
    {
        $phongBan = PhongBan::findOrFail($id); // Lấy phòng ban theo ID
        return view('phongban.show', compact('phongBan')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa phòng ban
    public function edit($id)
    {
        $phongBan = PhongBan::findOrFail($id); // Lấy phòng ban theo ID
        return view('phongban.edit', compact('phongBan')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật phòng ban
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        $request->validate([
            'ten_phong_ban' => 'required|string|max:255', // Tên phòng ban là bắt buộc và có độ dài tối đa 255 ký tự
        ]);

        $phongBan = PhongBan::findOrFail($id); // Lấy phòng ban theo ID
        $phongBan->update($request->all()); // Cập nhật thông tin phòng ban

        return redirect()->route('phongban.index'); // Quay lại danh sách phòng ban
    }

    // Xử lý xóa phòng ban
    public function destroy($id)
    {
        $phongBan = PhongBan::findOrFail($id); // Lấy phòng ban theo ID
        $phongBan->delete(); // Xóa phòng ban
        return redirect()->route('phongban.index'); // Quay lại danh sách phòng ban
    }
}
