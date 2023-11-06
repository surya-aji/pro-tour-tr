<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('s_p_d_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('pegawai_id')->constrained(table: 'pegawais', indexName: 'pegawai_id');
            $table->foreignId('surat_tugas_id')->constrained(table: 'surat_tugas', indexName: 'surat_tugas');
            $table->string('tingkat_biaya');
            $table->string('angkutan');
            $table->integer('lama_dinas');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang');
            $table->string('kota_tujuan');
            $table->string('instansi');
            $table->string('akun');
            $table->string('created_by');
            $table->string('updated_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_p_d_s');
    }
};
