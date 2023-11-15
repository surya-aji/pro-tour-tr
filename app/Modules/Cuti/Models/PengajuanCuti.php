<?php

namespace App\Modules\Cuti\Models;

use Carbon\Carbon;
use App\Traits\LogTraits;
use App\Modules\Cuti\Models\JenisCuti;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanCuti extends Model
{
    use HasFactory, SoftDeletes;
    use LogTraits;
    protected $tagName = 'Pengajuan Cuti';


  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_surat',
        'pegawai_id',
        'jenis_cuti_id',
        'alasan',
        'tanggal_awal',
        'tanggal_akhir',
        'lama_hari',
        'alamat',
        'atasan_id',
        'status'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function jenis_cuti(){
        return $this->belongsTo(JenisCuti::class);
    }

    public function scopeSisa_cs($query, $id_peg){
        return JenisCuti::where('id', 2)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
        ->where('jenis_cuti_id', 2)
        ->where('status', "1")
        ->whereYear('tanggal_awal', Carbon::now()->year)
        ->sum('lama_hari');
    }

    public function scopeSisa_cap($query,$id_peg){
        return JenisCuti::where('id', 3)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
        ->where('jenis_cuti_id', 3)
        ->where('status', "1")
        ->whereYear('tanggal_awal', Carbon::now()->year)
        ->sum('lama_hari');

    }

    public function scopeSisa_cb($query,$id_peg){
        return JenisCuti::where('id', 4)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
        ->where('jenis_cuti_id', 4)
        ->where('status', "1")
        ->whereYear('tanggal_awal', Carbon::now()->year)
        ->sum('lama_hari');
    }

    public function scopeSisa_cm($query, $id_peg){
        return  JenisCuti::where('id', 5)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
        ->where('jenis_cuti_id', 5)
        ->where('status', "1")
        ->whereYear('tanggal_awal', Carbon::now()->year)
        ->sum('lama_hari');
    }

}
