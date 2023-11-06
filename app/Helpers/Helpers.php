<?php
namespace App\Helpers;

use Carbon\Carbon;
use PhpOffice\PhpWord\Settings;
use App\Modules\SuratTugas\Models\SPD;
use App\Modules\Pegawai\Models\Pegawai;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Modules\SuratTugas\Models\SuratTugas;
use App\Modules\Settings\Models\Settings as SettingTable;

class Helpers{  
  /**
   * simpan surat tugas
   *
   * @return void
   */
  public static function save_surat_tugas($id_surat_tugas){
      $data = SuratTugas::where('id', $id_surat_tugas)->first();
      $dari = Pegawai::where('id',$data->dari)->first();
      $kepada = Pegawai::whereIn('id', json_decode($data->kepada))->get()->map(function($pegawai, $index) {
        $pegawai['index'] = $index + 1;
        return $pegawai;
      })->toArray();

      $template = new TemplateProcessor(storage_path('template_ST.docx') );
      $template->setValue('nomor_surat', $data->nomor_surat);
      $template->setValue('dasar_surat', $data->dasar_surat);
      $template->setValue('dasar_hukum', $data->dasar_hukum);
      $template->setValue('maksud_surat', $data->maksud_surat);
      $template->setValue('tanggal_pelaksanaan', Carbon::parse($data->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y'));
      $template->setValue('tempat_pelaksanaan', $data->tempat_pelaksanaan);
      $template->setValue('tanggal_surat',Carbon::parse($data->tanggal_surat)->isoFormat('dddd, D MMMM Y'));
      $template->setValue('jabatan_pemberi_perintah', $dari->jabatan);
      $template->setValue('nama_pemberi_perintah', $dari->nama);
      $template->setValue('nip_pemberi_perintah', $dari->nip);
      $template->cloneRowAndSetValues('index', $kepada);



      $file_name = $data->id . ".docx";
      $template->saveAs(storage_path("temp/surat_tugas/{$file_name}"));
  }
  
  /**
   * cetak_surat_tugas
   *
   * @param  mixed $id_surat_tugas
   * @return void
   */
  public static function cetak_surat_tugas($id_surat_tugas){
    
    Settings::setPdfRendererPath("../vendor/dompdf/dompdf");
    Settings::setPdfRendererName("DomPDF");
    $t = SettingTable::where('key','TemplateSuratTugas')->first();
    $td = SettingTable::where('key','TemplateSuratTugasDalKot')->first();    
    $data = SuratTugas::where('id', $id_surat_tugas)->first();

    $tvalue = $data->jenis == 1 ? $t->value : $td->value;
    $dari = Pegawai::where('id',$data->dari)->first();
    $kepada = Pegawai::whereIn('id', json_decode($data->kepada))->get()->map(function($pegawai, $index) {
      $pegawai['index'] = $index + 1;
      return $pegawai;
    })->toArray();

   
    $template = new TemplateProcessor(storage_path($tvalue));
    $template->setValue('nomor_surat', $data->nomor_surat);
    $template->setValue('dasar_surat', $data->dasar_surat);
    $template->setValue('dasar_hukum', $data->dasar_hukum);
    $template->setValue('maksud_surat', $data->maksud_surat);
    $template->setValue('tanggal_pelaksanaan', Carbon::parse($data->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y'));
    $template->setValue('tempat_pelaksanaan', $data->tempat_pelaksanaan);
    $template->setValue('tanggal_surat',Carbon::parse($data->tanggal_surat)->isoFormat('D MMMM Y'));
    $template->setValue('jabatan_pemberi_perintah', $dari->jabatan);
    $template->setValue('nama_pemberi_perintah', $dari->nama);
    $template->setValue('nip_pemberi_perintah', $dari->nip);
    $template->cloneRowAndSetValues('index', $kepada);

    $file_name = 'ST-' . $data->nomor_surat . ".docx";

    header('Content-Type: application/msword');
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name" );
    $template->saveAs('php://output');

  }
  
  /**
   * cetak_spd
   *
   * @param  mixed $id_surat_spd
   * @return void
   */
  public static function cetak_spd($id_surat_spd){
    $spd = SPD::where('id', $id_surat_spd)->first();
    $surat_tugas = SuratTugas::where('id', $spd->surat_tugas_id)->first();
    $pegawai = Pegawai::where('id',$spd->pegawai_id)->first();
    $ketua = SettingTable::where('key','Ketua')->first();
    $nip_ketua = SettingTable::where('key','NIPKetua')->first();

    $ppk = SettingTable::where('key','PPK')->first();
    $nip_ppk = SettingTable::where('key','NIP_PPK')->first();
    // dd($nip_pkk);

    $t = SettingTable::where('key','TemplateSPPD')->first();


    Settings::setPdfRendererPath("../vendor/dompdf/dompdf");
    Settings::setPdfRendererName("DomPDF");

    $template = new TemplateProcessor(storage_path($t->value));
    $template->setValue('nomor_surat', $surat_tugas->nomor_surat);
    $template->setValue('pembuat_komitmen', $ppk->value);
    $template->setValue('nip_pembuat_komitmen', $nip_ppk->value);
    $template->setValue('nama', $pegawai->nama);
    $template->setValue('nip', $pegawai->nip);
    $template->setValue('pangkat', $pegawai->pangkat);
    $template->setValue('golongan', $pegawai->golongan);
    $template->setValue('jabatan', $pegawai->jabatan);
    $template->setValue('biaya', $spd->tingkat_biaya);
    $template->setValue('maksud_surat', $surat_tugas->maksud_surat);
    $template->setValue('angkutan', $spd->angkutan);
    $template->setValue('kota_tujuan', $spd->kota_tujuan);
    $template->setValue('lama_dinas', $spd->lama_dinas);
    $template->setValue('tanggal_berangkat', Carbon::parse($spd->tanggal_berangkat)->isoFormat('D MMMM Y'));
    $template->setValue('tanggal_pulang', Carbon::parse($spd->tanggal_pulang)->isoFormat('D MMMM Y'));
    $template->setValue('instansi', $spd->instansi);
    $template->setValue('akun', $spd->akun);
    $template->setValue('tanggal_surat', Carbon::parse($surat_tugas->tanggal_surat)->isoFormat('D MMMM Y'));
    $template->setValue('ketua', $ketua->value);
    $template->setValue('nip_ketua', $nip_ketua->value);
    
    $file_name = 'SPD-' . $surat_tugas->nomor_surat . ".docx";

    header('Content-Type: application/msword');
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name" );
    $template->saveAs('php://output');
  }
  
  /**
   * filteredCountDays exclduing Weekends
   *
   * @return void
   */
  public static function filterTanggalWeekend($startDate, $endDate){
    $startDate = Carbon::parse($startDate); // Assuming this is your start date

    $endDate = Carbon::parse($endDate); // Assuming this is your end date

    $days = $startDate->diffInDaysFiltered(function(Carbon $date) {
        return $date->isWeekday(); // Only count weekdays (Monday to Friday)
    }, $endDate);

    return $days + 1;
  }
  
  /**
   * Mendapatkan Tahun 3 kebelakang
   *
   * @return void
   */
  public static function getYearReverse(){
    for ($i = 0; $i <= 2; $i++) {
      $year = now()->subYears($i)->year;
      $years[] = $year;
    }
    return $years;
    // return $tigaTahunYangLalu->format('Y');
  }

  // Query Rekap Cuti
  // $test = DB::table('jenis_cutis')
  // ->select('jenis_cutis.jenis_cuti as nama', DB::raw('SUM(pengajuan_cutis.lama_hari) as total_used'), 'jenis_cutis.max_limit_value as total_diperbolehkan')
  // ->leftJoin('pengajuan_cutis', 'jenis_cutis.id', '=' , 'pengajuan_cutis.jenis_cuti_id')
  // ->groupBy('jenis_cutis.id','jenis_cutis.jenis_cuti','jenis_cutis.max_limit_value')
  // ->get();
  // dd($test);
  // 
}