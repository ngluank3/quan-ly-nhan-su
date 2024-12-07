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
        Schema::create('bao_hiem', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->string('loai_bao_hiem'); // Loại bảo hiểm (VD: "Xã hội", "Y tế", "Thất nghiệp", "Tài nạn lao động", "Nhân thọ")
            $table->decimal('so_tien_bao_hiem', 15, 2); // Số tiền bảo hiểm đóng hàng tháng
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
        Schema::dropIfExists('bao_hiem');
    }
};
