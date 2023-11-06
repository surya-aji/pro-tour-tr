<?php

namespace App\Modules\SuratTugas\Models;

use App\Traits\LogTraits;
use Illuminate\Support\Str;
use App\Modules\Pegawai\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use App\Modules\SuratTugas\Models\SuratTugas;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SPD extends Model
{
    use HasFactory, SoftDeletes;
    
    use LogTraits;
    protected $primaryKey = 'id';
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
        'kota_tujuan',
        'instansi',
        'akun',
        'created_by',
        'updated_by',
    ];

     /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function surat_tugas(){
        return $this->belongsTo(SuratTugas::class);
    }

    
}
