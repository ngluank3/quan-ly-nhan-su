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
        Schema::create('phu_cap', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('nhan_vien_id'); // FK đến bảng nhan_vien
            $table->string('loai_phu_cap'); // Loại phụ cấp
            $table->decimal('so_tien_phu_cap', 15, 2); // Số tiền phụ cấp
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
        Schema::dropIfExists('phu_cap');
    }
};
