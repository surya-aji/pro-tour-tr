<?php

namespace App\Modules\Pegawai\Models;

use App\Traits\LogTraits;
use App\Modules\Cuti\Models\JenisCuti;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Cuti\Models\PengajuanCuti;
use App\Modules\Cuti\Models\SisaCutiTahunan;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;
    use LogTraits;
    protected $tagName = 'Pegawai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'pangkat',
        'golongan',
        'nomor_telepon',
        'alamat',
        'created_by',
        'updated_by',
    ];

    public function jenis_cuti(){
        return $this->belongsTo(JenisCuti::class);
    }

    public function cuti(){
        return $this->hasMany(PengajuanCuti::class,'id');
    }

    public function sisa_cuti_tahunan(){
        return $this->hasOne(SisaCutiTahunan::class);
    }

}
