<?php
namespace App\Helpers;

use Carbon\Carbon;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\Style\Border;
use App\Modules\Cuti\Models\JenisCuti;
use App\Modules\SuratTugas\Models\SPD;
use App\Modules\Pegawai\Models\Pegawai;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Modules\Cuti\Models\PengajuanCuti;
use App\Modules\Cuti\Models\SisaCutiTahunan;
use App\Modules\SuratTugas\Models\SuratTugas;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
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
   * cetak_cuti
   *
   * @param  mixed $id_surat_cuti
   * @return void
   */
  public static function cetak_cuti($id_surat_cuti){

    $surat_cuti = PengajuanCuti::where('id',$id_surat_cuti)->first();
    $id_peg = $surat_cuti->pegawai->id;
    $sisa_tahunan = SisaCutiTahunan::where('pegawai_id', $id_peg)->first();
    $atasan = Pegawai::where('id',$surat_cuti->atasan_id)->first();
    $ketua = SettingTable::where('key','Ketua')->first();
    $nip_ketua = SettingTable::where('key','NIPKetua')->first();
    $getYear = Helpers::getYearReverse();

    // Kalkulasi Masa Kerja
    $nip = $surat_cuti->pegawai->nip;
    $tahun_kerja = (int)substr($nip, 8, 4);
    $bulan_kerja = (int)substr($nip, 12, 2);
    $masa_kerja_tahun = Carbon::now()->diffInYears(Carbon::createFromDate($tahun_kerja, $bulan_kerja, 1));
    $masa_kerja_bulan = Carbon::now()->diffInMonths(Carbon::createFromDate($tahun_kerja, $bulan_kerja, 1)) % 12;
    $masa_kerja = $masa_kerja_tahun . " Tahun " . $masa_kerja_bulan . " Bulan";
    // Kalkulasi Masa Kerja

    // Opsi Jenis Cuti
    $ct = ($surat_cuti->jenis_cuti->id) == 1 ? 'V' : '-';
    $cs = ($surat_cuti->jenis_cuti->id) == 2 ? 'V' : '-';
    $cap = ($surat_cuti->jenis_cuti->id) == 3 ? 'V' : '-';
    $cb = ($surat_cuti->jenis_cuti->id) == 4 ? 'V' : '-';
    $cm = ($surat_cuti->jenis_cuti->id) == 5 ? 'V' : '-';
    // Opsi Jenis Cuti

    // Data Sisa Jatah Cuti

    
    $j_cs = JenisCuti::where('id', 2)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
            ->where('jenis_cuti_id', 2)
            ->where('status', "1")
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('lama_hari');

            // dd($j_cs);

    $j_cap = JenisCuti::where('id', 3)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
            ->where('jenis_cuti_id', 3)
            ->where('status', "1")
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('lama_hari');

    $j_cb = JenisCuti::where('id', 4)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
            ->where('jenis_cuti_id', 4)
            ->where('status', "1")
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('lama_hari');

    $j_cm = JenisCuti::where('id', 5)->value('max_limit_value') - PengajuanCuti::where('pegawai_id', $id_peg)
            ->where('jenis_cuti_id', 5)
            ->where('status', "1")
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('lama_hari');
    // Data Sisa Jatah Cuti
    


    $t = SettingTable::where('key','TemplateSuratCuti')->first();
    Settings::setPdfRendererPath("../vendor/dompdf/dompdf");
    Settings::setPdfRendererName("DomPDF");

    $template = new TemplateProcessor(storage_path($t->value));
    $template->setValue('tanggal_surat', Carbon::now()->isoFormat('D MMMM Y'));
    // Data Pegawai
    $template->setValue('nomor_surat', $surat_cuti->nomor_surat);
    $template->setValue('nama_pegawai', $surat_cuti->pegawai->nama);
    $template->setValue('jabatan', $surat_cuti->pegawai->jabatan);
    $template->setValue('nip_pegawai', $surat_cuti->pegawai->nip);
    $template->setValue('pangkat', $surat_cuti->pegawai->pangkat);
    $template->setValue('golongan',$surat_cuti->pegawai->golongan);
    $template->setValue('masa_kerja',$masa_kerja);
    // Data Pegawai

    // Data Jenis Cuti
    $template->setValue('ct',$ct);
    $template->setValue('cs',$cs);
    $template->setValue('cap',$cap);
    $template->setValue('cb',$cb);
    $template->setValue('cm',$cm);
    $template->setValue('alasan',$surat_cuti->alasan);
    $template->setValue('lama_hari',$surat_cuti->lama_hari);
    $template->setValue('tanggal_awal',Carbon::parse($surat_cuti->tanggal_awal)->isoFormat('D MMMM Y'));
    $template->setValue('tanggal_akhir',Carbon::parse($surat_cuti->tanggal_akhir)->isoFormat('D MMMM Y'));
    $template->setValue('j_cs',$j_cs);
    $template->setValue('j_cap',$j_cap);
    $template->setValue('j_cb',$j_cb);
    $template->setValue('j_cm',$j_cm);
    $template->setValue('th1',$sisa_tahunan->tahun_satu);
    $template->setValue('th2',$sisa_tahunan->tahun_dua);
    $template->setValue('th3',$sisa_tahunan->tahun_tiga);
    $template->setValue('y0',$getYear[0]);
    $template->setValue('y1',$getYear[1]);
    $template->setValue('y2',$getYear[2]);
    // Data Jenis Cuti

    // Etc Pegawai
    $template->setValue('alamat',$surat_cuti->alamat);
    $template->setValue('nohp_pegawai',$surat_cuti->pegawai->nomor_telepon);
    $template->setValue('nama_pegawai',$surat_cuti->pegawai->nama);
    $template->setValue('nip',$surat_cuti->pegawai->nip);
    // Etc Pegawai

    // Etc Atasan
    $template->setValue('jabatan_atasan',$atasan->jabatan);
    $template->setValue('atasan',$atasan->nama);
    $template->setValue('nip_atasan',$atasan->nip);
    // Etc Atasan

    // Etc Ketua
    $template->setValue('ketua', $ketua->value);
    $template->setValue('nip_ketua', $nip_ketua->value);
    // Etc Ketua

    
    $file_name = 'Pengajuan-Cuti ' . $surat_cuti->pegawai->nama . " ". Carbon::parse($surat_cuti->tanggal_awal)->isoFormat('D MMMM') . ".docx";

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
    $years = [];
    for ($i = 2; $i >= 0; $i--) {
        $year = now()->subYears($i)->year;
        $years[] = $year;
    }
    return $years;
  }
  
  /**
   * kalkulasi_masa_kerja
   *
   * @param  mixed $nip
   * @return void
   */
  public static function kalkulasi_masa_kerja($nip){
    $tahun = substr($nip,8);
  }
  
  /**
   * cetak_kartu_cuti
   *
   * @param  mixed $id_peg
   * @return void
   */
  public static function cetak_kartu_cuti($id_peg){
    Settings::setPdfRendererPath("../vendor/dompdf/dompdf");
    Settings::setPdfRendererName("DomPDF");
    $t = SettingTable::where('key','TemplateKartuCuti')->first();
    $data = PengajuanCuti::where('pegawai_id', $id_peg)->where('status', "1")->get()->map(function($cuti, $index) {
      $cuti['index'] = $index + 1;
      $cuti['jenis_cuti'] = JenisCuti::where('id', $cuti->jenis_cuti_id)->pluck('jenis_cuti')->first();
      $cuti['tanggal_surat'] = Carbon::parse($cuti->created_at)->isoFormat('DD-MM-Y');
      $cuti['tanggal_awal'] = Carbon::parse($cuti->tanggal_awal)->isoFormat('DD-MM-Y');
      $cuti['tanggal_akhir'] = Carbon::parse($cuti->tanggal_akhir)->isoFormat('DD-MM-Y');
      return $cuti;
    })->toArray();

    // dd($data);
    $pegawai = Pegawai::where('id', $id_peg)->first();   
    $template = new TemplateProcessor(storage_path($t->value));
    $template->setValue('nama', $pegawai->nama);
    $template->setValue('nip', $pegawai->nip);
    $template->cloneRowAndSetValues('index', $data);

    $file_name = 'kartu-cuti ' . $pegawai->nama . ".docx";

    header('Content-Type: application/msword');
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name" );
    $template->saveAs('php://output');

  }
  
  /**
   * cetak_kendali_cuti
   *
   * @return void
   */
  public static function cetak_kendali_cuti(){


    $rekap = Pegawai::kendali_cuti();
    $year = Helpers::getYearReverse();
    // dd($year[2]);
 
// dd($rekap);
// ================================
// Set Template Configuration


    $templatePath = storage_path('Template_kendali_cuti.xlsx');
    $spreadsheet = IOFactory::load($templatePath);

    
    // Access the active worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $start_row = 7;
    $space_row = 0;



   

    // Set alignment to center for the specific cell
    $alignmentStyle = [
      'horizontal' => Alignment::HORIZONTAL_CENTER, // Set horizontal alignment to center
      'vertical' => Alignment::VERTICAL_CENTER,     // Set vertical alignment to center
    ];

    // Change font style for the specific cell
    $fontStyle = [
        'name' => 'Palatino Linotype',  // Set the font family
        'size' => 11,       // Set the font size
        'bold' => false,     // Set bold style
        'italic' => false,  // Set italic style
        'underline' => Font::UNDERLINE_NONE,  // Set underline style
        'color' => ['rgb' => '000000'],      // Set font color
    ];

    $secondStyle = [
      'name' => 'Palatino Linotype',  // Set the font family
      'size' => 9,       // Set the font size
      'bold' => false,     // Set bold style
      'italic' => false,  // Set italic style
      'underline' => Font::UNDERLINE_NONE,  // Set underline style
      'color' => ['rgb' => '000000'],      // Set font color
  ];


    // Loop through the data and set values in the worksheet
  foreach ($rekap as $index => $item) {
    $row = $start_row + $index;
    $no = $index + 1;
    $space_row = $row + 2;

    // dd($item);

    // Assuming 'nama' is a column in your model, adjust this based on your actual column names
    $worksheet->getCell("B$row")->setValue($no);
    $worksheet->getCell("C$row")->setValue($item->nama);
    $worksheet->getCell("D$row")->setValue("`".$item->nip);
    $worksheet->getCell("E$row")->setValue("CT");
    $worksheet->getCell("F$row")->setValue("`".$item->tahun_tiga);
    $worksheet->getCell("G$row")->setValue("`".$item->tahun_dua);
    $worksheet->getCell("H$row")->setValue("`".$item->tahun_satu);
    $worksheet->getCell("I$row")->setValue("`".$item->CS);
    $worksheet->getCell("J$row")->setValue("`".$item->CAP);
    $worksheet->getCell("K$row")->setValue("`".$item->jan);
    $worksheet->getCell("L$row")->setValue("`".$item->feb);
    $worksheet->getCell("M$row")->setValue("`".$item->mar);
    $worksheet->getCell("N$row")->setValue("`".$item->apr);
    $worksheet->getCell("O$row")->setValue("`".$item->mei);
    $worksheet->getCell("P$row")->setValue("`".$item->jun);
    $worksheet->getCell("Q$row")->setValue("`".$item->jul);
    $worksheet->getCell("R$row")->setValue("`".$item->agu);
    $worksheet->getCell("S$row")->setValue("`".$item->sep);
    $worksheet->getCell("T$row")->setValue("`".$item->okt);
    $worksheet->getCell("U$row")->setValue("`".$item->nov);
    $worksheet->getCell("V$row")->setValue("`".$item->des);



    // Aligment center index B
    $worksheet->getStyle("B$row")->getAlignment()->applyFromArray($alignmentStyle);
    // Add more setValue lines for other columns as needed


    // Add border to each cell in the row
    $worksheet->getStyle("B$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("C$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("D$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("E$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("F$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("G$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("H$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("I$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("J$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("K$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("L$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("M$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("N$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("O$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("P$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("Q$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("R$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("S$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("T$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("U$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
    $worksheet->getStyle("V$row")->applyFromArray([
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => '0000000'],
        ],
      ],  
    ]);
  }

  $worksheet->getCell("B3")->setValue("TAHUN 2023");
  $worksheet->getStyle("B3")->getFont()->applyFromArray($fontStyle);
  $worksheet->getCell("B$space_row")->setValue("Keterangan :");
  $worksheet->getStyle("B$space_row")->getFont()->applyFromArray($secondStyle);
  $worksheet->getCell("B".($space_row + 1))->setValue("CT");
  $worksheet->getCell("B".($space_row + 2))->setValue("CS");
  $worksheet->getCell("B".($space_row + 3))->setValue("CAP");
  $worksheet->getCell("C".($space_row + 1))->setValue(": Cuti Tahunan");
  $worksheet->getCell("C".($space_row + 2))->setValue(": Cuti Sakit");
  $worksheet->getCell("C".($space_row + 3))->setValue(": Cuti Karena Alasan Penting");

  $worksheet->getCell("H5")->setValue($year[2]);
  $worksheet->getCell("G5")->setValue($year[1]);
  $worksheet->getCell("F5")->setValue($year[0]);
  
  $worksheet->getCell("Q".($space_row + 5))->setValue("Banyuwangi, ". Carbon::now()->isoFormat('D MMMM Y'));
  $worksheet->getCell("Q".($space_row + 6))->setValue("Sekertaris,");
  $worksheet->getCell("Q".($space_row + 7))->setValue("ttd");
  $worksheet->getCell("Q".($space_row + 9))->setValue("SHOHEH, SH");
  $worksheet->getCell("Q".($space_row + 10))->setValue("NIP. 197212141994031001");



  // dd(($space_row + 1));

    // Save the modified spreadsheet
    $file_name = 'kartu-kendali-cuti ' . '2023' . ".xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name" );
    IOFactory::createWriter($spreadsheet, 'Xlsx')->save('php://output');
  }
 
}