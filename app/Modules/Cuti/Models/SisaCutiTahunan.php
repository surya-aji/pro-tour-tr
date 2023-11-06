<?php

namespace App\Modules\Cuti\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SisaCutiTahunan extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pegawai_id',
        'tahun_satu',
        'tahun_dua',
        'tahun_tiga',
    ];
}
