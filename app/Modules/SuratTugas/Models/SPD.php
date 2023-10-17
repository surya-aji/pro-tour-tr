<?php

namespace App\Modules\SuratTugas\Models;

use App\Traits\LogTraits;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use App\Modules\SuratTugas\Models\SuratTugas;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SPD extends Model
{
    use HasFactory;
    
    use LogTraits;
    protected $tagName = 'SPD';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pembuat_komitmen',
        'pegawai_id',
        'surat_tugas_id',
        'tingkat_biaya',
        'angkutan',
        'lama_dinas',
        'tanggal_berangkat',
        'tanggal_pulang',
        'anggaran',
        'instansi',
        'akun',
        'created_by',
        'updated_by',
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function surat_tugas(){
        return $this->belongsTo(SuratTugas::class);
    }

    
}
