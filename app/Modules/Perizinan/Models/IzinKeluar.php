<?php

namespace App\Modules\Perizinan\Models;

use App\Traits\LogTraits;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinKeluar extends Model
{
    use HasFactory, SoftDeletes;
    use LogTraits;
    protected $tagName = 'Surat Izin Keluar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pemberi_perintah_id',
        'pegawai_id',
        'tanggal',
        'jam_awal',
        'jam_akhir',
        'lama_hari',
        'keperluan',
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
