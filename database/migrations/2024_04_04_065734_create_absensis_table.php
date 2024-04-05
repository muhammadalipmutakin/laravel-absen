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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('time_masuk');
            $table->string('foto_masuk');
            $table->string('kegiatan');
            $table->timestamp('time_pulang')->nullable();
            $table->string('foto_pulang')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['belum-terkonfirmasi', 'terkonfirmasi'])->default('belum-terkonfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
