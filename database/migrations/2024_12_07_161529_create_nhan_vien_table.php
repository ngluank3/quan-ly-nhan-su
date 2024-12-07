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
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('ho_ten'); // Tên nhân viên
            $table->date('ngay_sinh')->nullable(); // Ngày sinh
            $table->string('gioi_tinh', 10)->nullable(); // Giới tính
            $table->string('dia_chi')->nullable(); // Địa chỉ
            $table->string('sdt', 15)->nullable(); // Số điện thoại
            $table->string('email')->unique(); // Email (unique)
            $table->unsignedBigInteger('phong_ban_id'); // FK đến bảng phong_ban
            $table->unsignedBigInteger('chuc_vu_id'); // FK đến bảng chuc_vu
            $table->date('ngay_tuyen_dung')->nullable(); // Ngày tuyển dụng
            $table->string('hinh_anh')->nullable(); // Đường dẫn ảnh đại diện
            $table->string('trang_thai')->default('Đang làm việc'); // Trạng thái nhân viên
            $table->timestamps(); // Timestamps mặc định (created_at, updated_at)

            // Định nghĩa khóa ngoại
            $table->foreign('phong_ban_id')->references('id')->on('phong_ban')->onDelete('cascade');
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
