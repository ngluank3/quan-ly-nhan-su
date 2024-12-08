<?php

namespace App\Http\Controllers;

use App\Models\Luong;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    // Hiển thị danh sách tất cả lương
    public function index()
    {
        $luongs = Luong::all(); // Lấy tất cả thông tin lương
        return view('luong.index', compact('luongs')); // Trả về view với danh sách lương
    }

    // Hiển thị form để tạo lương mới
    public function create()
    {
        return view('luong.create'); // Trả về view tạo lương
    }

    // Xử lý lưu lương mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi lưu
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id', // Nhân viên phải tồn tại trong bảng nhân viên
            'luong_co_ban' => 'required|numeric', // Lương cơ bản phải là số
            'thu_tncn' => 'nullable|numeric', // Thuế TNCN (nếu có)
            'bao_hiem_xa_hoi' => 'nullable|numeric', // Bảo hiểm xã hội (nếu có)
            'luong_nhan_duoc' => 'required|numeric', // Lương nhận được phải là số
        ]);

        // Tạo lương mới và lưu vào cơ sở dữ liệu
        Luong::create($request->all());
        return redirect()->route('luong.index'); // Quay lại danh sách lương
    }

    // Hiển thị chi tiết thông tin lương
    public function show($id)
    {
        $luong = Luong::findOrFail($id); // Lấy lương theo ID
        return view('luong.show', compact('luong')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa lương
    public function edit($id)
    {
        $luong = Luong::findOrFail($id); // Lấy lương theo ID
        return view('luong.edit', compact('luong')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật lương
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id', // Nhân viên phải tồn tại trong bảng nhân viên
            'luong_co_ban' => 'required|numeric', // Lương cơ bản phải là số
            'thu_tncn' => 'nullable|numeric', // Thuế TNCN (nếu có)
            'bao_hiem_xa_hoi' => 'nullable|numeric', // Bảo hiểm xã hội (nếu có)
            'luong_nhan_duoc' => 'required|numeric', // Lương nhận được phải là số
        ]);

        $luong = Luong::findOrFail($id); // Lấy lương theo ID
        $luong->update($request->all()); // Cập nhật thông tin lương

        return redirect()->route('luong.index'); // Quay lại danh sách lương
    }

    // Xử lý xóa lương
    public function destroy($id)
    {
        $luong = Luong::findOrFail($id); // Lấy lương theo ID
        $luong->delete(); // Xóa lương
        return redirect()->route('luong.index'); // Quay lại danh sách lương
    }
}
