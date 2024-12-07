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
        Schema::create('ung_luong', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('nhan_vien_id'); // FK liên kết với bảng nhan_vien
            $table->decimal('so_tien_ung', 15, 2); // Số tiền ứng lương
            $table->text('ly_do'); // Lý do ứng lương
            $table->date('ngay_ung'); // Ngày ứng lương
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
        Schema::dropIfExists('ung_luong');
    }
};
