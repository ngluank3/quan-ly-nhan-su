<?php

namespace App\Http\Controllers;

use App\Models\BaoHiem;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class BaoHiemController extends Controller
{
    // Hiển thị danh sách tất cả bảo hiểm
    public function index()
    {
        $baoHiems = BaoHiem::with('nhanVien')->get(); // Lấy tất cả bảo hiểm kèm theo thông tin nhân viên
        return view('baoHiem.index', compact('baoHiems'));
    }

    // Hiển thị form để tạo bảo hiểm mới
    public function create()
    {
        $nhanViens = NhanVien::all(); // Lấy tất cả nhân viên để hiển thị trong dropdown
        return view('baoHiem.create', compact('nhanViens')); // Trả về view tạo bảo hiểm
    }

    // Xử lý lưu bảo hiểm mới
    public function store(Request $request)
    {
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id', // Kiểm tra nhân viên có tồn tại trong bảng nhân viên
            'loai_bao_hiem' => 'required|string|max:255', // Loại bảo hiểm
            'so_tien_bao_hiem' => 'required|numeric|min:0', // Số tiền bảo hiểm
        ]);

        BaoHiem::create($request->all()); // Lưu bảo hiểm mới
        return redirect()->route('baoHiem.index'); // Quay lại danh sách bảo hiểm
    }

    // Hiển thị chi tiết thông tin bảo hiểm
    public function show($id)
    {
        $baoHiem = BaoHiem::with('nhanVien')->findOrFail($id); // Lấy thông tin bảo hiểm cùng thông tin nhân viên
        return view('baoHiem.show', compact('baoHiem')); // Trả về view với thông tin chi tiết
    }

    // Hiển thị form để chỉnh sửa bảo hiểm
    public function edit($id)
    {
        $baoHiem = BaoHiem::findOrFail($id); // Lấy bảo hiểm theo ID
        $nhanViens = NhanVien::all(); // Lấy danh sách nhân viên
        return view('baoHiem.edit', compact('baoHiem', 'nhanViens')); // Trả về view chỉnh sửa
    }

    // Xử lý cập nhật bảo hiểm
    public function update(Request $request, $id)
    {
        $request->validate([
            'nhan_vien_id' => 'required|exists:nhan_vien,id',
            'loai_bao_hiem' => 'required|string|max:255',
            'so_tien_bao_hiem' => 'required|numeric|min:0',
        ]);

        $baoHiem = BaoHiem::findOrFail($id); // Lấy bảo hiểm theo ID
        $baoHiem->update($request->all()); // Cập nhật thông tin bảo hiểm

        return redirect()->route('baoHiem.index'); // Quay lại danh sách bảo hiểm
    }

    // Xử lý xóa bảo hiểm
    public function destroy($id)
    {
        $baoHiem = BaoHiem::findOrFail($id); // Lấy bảo hiểm theo ID
        $baoHiem->delete(); // Xóa bảo hiểm

        return redirect()->route('baoHiem.index'); // Quay lại danh sách bảo hiểm
    }
}
