<?php

namespace App\Modules\Cuti\Models;

use App\Traits\LogTraits;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisCuti extends Model
{
    use HasFactory;
    use LogTraits;
    protected $tagName = 'Jenis Cuti';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'jenis_cuti',
        'max_limit_value',
    ];

    public function pegawai(){
        return $this->hasMany(Pegawai::class,'id');
    }
}
