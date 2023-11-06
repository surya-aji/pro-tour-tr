<?php

namespace App\Modules\Cuti\Models;

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
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function jenis_cuti(){
        return $this->belongsTo(JenisCuti::class);
    }

    public function scopeCatatanCutiTahunan($query, $id_pegawai){
        
    }


}
