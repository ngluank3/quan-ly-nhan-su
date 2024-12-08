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
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('nhan_vien_id')->nullable(); // FK đến bảng nhan_vien
            $table->string('email')->unique(); // Email
            $table->string('mat_khau'); // Mật khẩu
            $table->string('ten_nguoi_dung'); // Tên người dùng
            $table->enum('quyen', ['Admin', 'User']); // Quyền hạn
            $table->enum('trang_thai', ['Hoạt động', 'Khoá']); // Trạng thái tài khoản
            $table->timestamps(); // Timestamps (created_at, updated_at)
        
            // Định nghĩa khóa ngoại
            $table->foreign('nhan_vien_id')->references('id')->on('nhan_vien')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dung');
    }
};
