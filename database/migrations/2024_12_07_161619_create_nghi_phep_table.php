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
        Schema::create('nghi_phep', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->string('loai_nghi_phep'); // Loại nghỉ phép (VD: "Năm", "Ốm", "Kết hôn")
            $table->integer('so_ngay_nghi'); // Số ngày nghỉ
            $table->string('trang_thai')->default('Chờ duyệt'); // Trạng thái duyệt (VD: "Chờ duyệt", "Đã duyệt", "Từ chối")
            $table->string('nguoi_duyet')->nullable(); // Người duyệt nghỉ phép (có thể để trống)
            $table->date('ngay_bat_dau'); // Ngày bắt đầu nghỉ phép
            $table->date('ngay_ket_thuc')->nullable(); // Ngày kết thúc nghỉ phép
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
        Schema::dropIfExists('nghi_phep');
    }
};
