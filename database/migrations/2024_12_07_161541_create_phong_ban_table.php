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
            $table->timestamps(); // Timestamps mặc định (created_at, updated_at)
            $table->engine = 'InnoDB'; // Đảm bảo sử dụng InnoDB
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
