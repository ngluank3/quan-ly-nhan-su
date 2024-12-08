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
        Schema::create('phong_ban', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('ten_phong_ban'); // Tên phòng ban
            $table->unsignedBigInteger('truong_phong_id')->nullable(); // FK đến bảng nhan_vien (trưởng phòng)
            $table->timestamps(); // Timestamps mặc định (created_at, updated_at)
        
            // Định nghĩa khóa ngoại
            $table->foreign('truong_phong_id')->references('id')->on('nhan_vien')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_ban');
    }
};
