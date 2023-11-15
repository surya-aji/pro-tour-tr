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
        Schema::create('pengajuan_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->string('alasan');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->integer('lama_hari');
            $table->text('alamat');
            $table->unsignedBigInteger('atasan_id');
            $table->foreign('jenis_cuti_id')->references('id')->on('jenis_cutis')->onDelete('cascade');
            $table->foreign('atasan_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->enum('status', [ 0 , 1 , 2])->comment('0 = Menunggu Status, 1 = DiSetujui, 2 = Ditolak');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_cutis');
    }
};
