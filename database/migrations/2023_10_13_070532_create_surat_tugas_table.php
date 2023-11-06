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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->text('dasar_surat');
            $table->text('dasar_hukum');
            $table->text('maksud_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->foreignId('dari')->constrained(table: 'pegawais', indexName: 'dari');
            $table->json('kepada');
            $table->boolean('jenis')->comment('0 = Surat Tugas Dalam Kota, 1 = Surat Tugas Luar Kota');
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
        Schema::dropIfExists('surat_tugas');
    }
};
