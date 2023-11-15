<?php

namespace App\Modules\Pegawai\Models;

use App\Traits\LogTraits;
use Illuminate\Support\Facades\DB;
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
    
    /**
     * Query Rekap Cuti
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeKendali_cuti($query){
        $currentYear = date('Y');
        return Pegawai::select(
            'pegawais.nama',
            'pegawais.nip',
            'sisa_cuti_tahunans.tahun_satu',  
            'sisa_cuti_tahunans.tahun_dua',  
            'sisa_cuti_tahunans.tahun_tiga',   
            DB::raw('
                180 - SUM(CASE WHEN pengajuan_cutis.jenis_cuti_id = 2 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as CS,
                30 - SUM(CASE WHEN pengajuan_cutis.jenis_cuti_id = 3 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as CAP,
                180 - SUM(CASE WHEN pengajuan_cutis.jenis_cuti_id = 4 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as CB,
                90 - SUM(CASE WHEN pengajuan_cutis.jenis_cuti_id = 5 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as CM,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 1 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as jan,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 2 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as feb,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 3 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as mar,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 4 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as apr,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 5 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as mei,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 6 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as jun,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 7 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as jul,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 8 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as agu,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 9 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as sep,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 10 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as okt,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 11 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as nov,
                SUM(CASE WHEN MONTH(pengajuan_cutis.tanggal_awal) = 12 AND pengajuan_cutis.status = "1" AND YEAR(pengajuan_cutis.tanggal_awal) = ' . $currentYear . ' THEN pengajuan_cutis.lama_hari ELSE 0 END) as des
            '),
        )
        ->leftJoin('pengajuan_cutis', 'pegawais.id', '=', 'pengajuan_cutis.pegawai_id')
        ->leftJoin('sisa_cuti_tahunans', 'pegawais.id', '=', 'sisa_cuti_tahunans.pegawai_id')
        ->groupBy('pegawais.nama', 'pegawais.nip', 'sisa_cuti_tahunans.tahun_satu','sisa_cuti_tahunans.tahun_dua','sisa_cuti_tahunans.tahun_tiga')
        ->get();
    }

}
