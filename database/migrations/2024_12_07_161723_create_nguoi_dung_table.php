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
            $table->id(); // Khóa chính tự tăng
            $table->string('email')->unique(); // Email (phải duy nhất)
            $table->string('mat_khau'); // Mật khẩu người dùng
            $table->string('ten_nguoi_dung'); // Tên người dùng
            $table->enum('quyen', ['Admin', 'User']); // Quyền hạn người dùng: Admin hoặc User
            $table->enum('trang_thai', ['Hoạt động', 'Khoá']); // Trạng thái tài khoản
            $table->timestamps(); // Timestamps (created_at, updated_at)
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
