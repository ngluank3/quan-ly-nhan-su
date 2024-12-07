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
        Schema::create('luong', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->decimal('luong_co_ban', 15, 2); // Lương cơ bản
            $table->decimal('thu_tncn', 15, 2)->default(0); // Thuế thu nhập cá nhân
            $table->decimal('bao_hiem_xa_hoi', 15, 2)->default(0); // Phí bảo hiểm xã hội
            $table->decimal('luong_nhan_duoc', 15, 2); // Lương nhận được sau thuế và bảo hiểm
            $table->date('ngay_cap_nhat')->nullable(); // Ngày cập nhật lương
            $table->timestamps(); // Timestamps mặc định (created_at, updated_at)

            // Định nghĩa khóa ngoại
            $table->foreign('nhan_vien_id')->references('id')->on('nhan_vien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luong');
    }
};
