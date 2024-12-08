<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    // Hiển thị danh sách tất cả chức vụ
    public function index()
    {
        $chucVus = ChucVu::all(); // Lấy tất cả các chức vụ
        return view('chucvu.index', compact('chucVus')); // Trả về view với danh sách chức vụ
    }

    // Hiển thị form để tạo chức vụ mới
    public function create()
    {
        return view('chucvu.create'); // Trả về view tạo chức vụ
    }

    // Xử lý lưu chức vụ mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi lưu
        $request->validate([
            'ten_chuc_vu' => 'required|string|max:255', // Tên chức vụ là bắt buộc và có độ dài tối đa 255 ký tự
        ]);

        // Tạo chức vụ mới và lưu vào cơ sở dữ liệu
        ChucVu::create($request->all());
        return redirect()->route('chucvu.index'); // Quay lại danh sách chức vụ
    }

    // Hiển thị chi tiết thông tin chức vụ
    public function show($id)
    {
        $chucVu = ChucVu::findOrFail($id); // Lấy chức vụ theo ID
        return view('chucvu.show', compact('chucVu')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa chức vụ
    public function edit($id)
    {
        $chucVu = ChucVu::findOrFail($id); // Lấy chức vụ theo ID
        return view('chucvu.edit', compact('chucVu')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật chức vụ
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        $request->validate([
            'ten_chuc_vu' => 'required|string|max:255', // Tên chức vụ là bắt buộc và có độ dài tối đa 255 ký tự
        ]);

        $chucVu = ChucVu::findOrFail($id); // Lấy chức vụ theo ID
        $chucVu->update($request->all()); // Cập nhật thông tin chức vụ

        return redirect()->route('chucvu.index'); // Quay lại danh sách chức vụ
    }

    // Xử lý xóa chức vụ
    public function destroy($id)
    {
        $chucVu = ChucVu::findOrFail($id); // Lấy chức vụ theo ID
        $chucVu->delete(); // Xóa chức vụ
        return redirect()->route('chucvu.index'); // Quay lại danh sách chức vụ
    }
}
