<?php

namespace App\Http\Controllers;

use App\Models\HopDong;
use Illuminate\Http\Request;

class HopDongController extends Controller
{
    // Hiển thị danh sách tất cả hợp đồng
    public function index()
    {
        $hopDongs = HopDong::all(); // Lấy tất cả các hợp đồng
        return view('hopdong.index', compact('hopDongs')); // Trả về view với danh sách hợp đồng
    }

    // Hiển thị form để tạo hợp đồng mới
    public function create()
    {
        return view('hopdong.create'); // Trả về view tạo hợp đồng
    }

    // Xử lý lưu hợp đồng mới
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi lưu
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id', // Nhân viên phải tồn tại trong bảng nhân viên
            'ngay_bat_dau' => 'required|date', // Ngày bắt đầu phải có định dạng ngày tháng
            'ngay_ket_thuc' => 'nullable|date', // Ngày kết thúc có thể trống nhưng nếu có thì phải có định dạng ngày tháng
            'loai_hop_dong' => 'required|string|max:255', // Loại hợp đồng là bắt buộc và có độ dài tối đa 255 ký tự
            'luong_thoa_thuan' => 'required|numeric', // Lương thỏa thuận phải là số
        ]);

        // Tạo hợp đồng mới và lưu vào cơ sở dữ liệu
        HopDong::create($request->all());
        return redirect()->route('hopdong.index'); // Quay lại danh sách hợp đồng
    }

    // Hiển thị chi tiết thông tin hợp đồng
    public function show($id)
    {
        $hopDong = HopDong::findOrFail($id); // Lấy hợp đồng theo ID
        return view('hopdong.show', compact('hopDong')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa hợp đồng
    public function edit($id)
    {
        $hopDong = HopDong::findOrFail($id); // Lấy hợp đồng theo ID
        return view('hopdong.edit', compact('hopDong')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật hợp đồng
    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'nullable|date',
            'loai_hop_dong' => 'required|string|max:255',
            'luong_thoa_thuan' => 'required|numeric',
        ]);

        $hopDong = HopDong::findOrFail($id); // Lấy hợp đồng theo ID
        $hopDong->update($request->all()); // Cập nhật thông tin hợp đồng

        return redirect()->route('hopdong.index'); // Quay lại danh sách hợp đồng
    }

    // Xử lý xóa hợp đồng
    public function destroy($id)
    {
        $hopDong = HopDong::findOrFail($id); // Lấy hợp đồng theo ID
        $hopDong->delete(); // Xóa hợp đồng
        return redirect()->route('hopdong.index'); // Quay lại danh sách hợp đồng
    }
}
