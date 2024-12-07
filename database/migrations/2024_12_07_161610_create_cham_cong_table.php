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
        Schema::create('cham_cong', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->date('ngay'); // Ngày chấm công
            $table->time('gio_vao')->nullable(); // Giờ vào
            $table->time('gio_ra')->nullable(); // Giờ ra
            $table->integer('gio_tang_ca')->default(0); // Số giờ làm tăng ca (giá trị mặc định là 0)
            $table->string('trang_thai')->default('Chưa chấm công'); // Trạng thái chấm công
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
        Schema::dropIfExists('cham_cong');
    }
};
