<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hop_dong', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->string('loai_hop_dong'); // Loại hợp đồng (VD: Chính thức, Thực tập, Thời vụ)
            $table->date('ngay_bat_dau'); // Ngày bắt đầu hợp đồng
            $table->date('ngay_ket_thuc')->nullable(); // Ngày kết thúc hợp đồng (có thể để trống)
            $table->string('trang_thai')->default('Đang hoạt động'); // Trạng thái hợp đồng (VD: "Đang hoạt động", "Hết hạn")
            $table->timestamps(); // Timestamps (created_at, updated_at)

            // Định nghĩa khóa ngoại
            $table->foreign('nhan_vien_id')->references('id')->on('nhan_vien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hop_dong');
    }
};
