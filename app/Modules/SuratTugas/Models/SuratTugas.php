<?php

namespace App\Modules\SuratTugas\Models;

use App\Traits\LogTraits;
use App\Modules\SuratTugas\Models\SPD;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratTugas extends Model
{
    use HasFactory,SoftDeletes;

    use LogTraits;
    protected $tagName = 'Surat Tugas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nomor_surat',
        'dasar_surat',
        'dasar_hukum',
        'maksud_surat',
        'tanggal_surat',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
        'dari',
        'kepada',
        'jenis',
        'created_by',
        'updated_by',
    ];

    public function pemberi_perintah(){
        return $this->hasOne(Pegawai::class,'id');
    }

    public function spd(){
        return $this->hasMany(SPD::class,'id');
    }
}
