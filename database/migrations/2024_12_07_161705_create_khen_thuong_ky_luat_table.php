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
        Schema::create('khen_thuong_ky_luat', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->enum('loai', ['Khen thưởng', 'Kỷ luật']); // Loại khen thưởng hoặc kỷ luật
            $table->text('noi_dung'); // Mô tả chi tiết về khen thưởng hoặc kỷ luật
            $table->date('ngay_xu_ly'); // Ngày xử lý khen thưởng/kỷ luật
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
        Schema::dropIfExists('khen_thuong_ky_luat');
    }
};
