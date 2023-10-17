<?php

namespace App\Modules\Pegawai\Models;

use App\Traits\LogTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
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
        'pangkat_golongan',
        'created_by',
        'updated_by',
    ];

}
