<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Buat tabel sementara tanpa kolom email
        Schema::create('siswas_temp', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        // Copy data dari tabel lama
        DB::statement('INSERT INTO siswas_temp (id, nama, nis, kelas_id, user_id, created_at, updated_at) SELECT id, nama, nis, kelas_id, user_id, created_at, updated_at FROM siswas');

        // Hapus tabel lama & rename tabel baru
        Schema::drop('siswas');
        Schema::rename('siswas_temp', 'siswas');
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('email')->unique()->nullable();
        });
    }
};
