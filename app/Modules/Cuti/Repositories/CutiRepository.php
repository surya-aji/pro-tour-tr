<?php
namespace App\Modules\Cuti\Repositories;

use Carbon\Carbon;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use App\Modules\Cuti\Models\JenisCuti;
use App\Modules\Pegawai\Models\Pegawai;
use App\Modules\Cuti\Models\PengajuanCuti;
use App\Modules\Cuti\Models\SisaCutiTahunan;
use App\Modules\Cuti\Interfaces\CutiInterface;

class CutiRepository implements CutiInterface{  
  /**
   * index_data_cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function index_data_cuti($request){
    try {

      // dd(Pegawai::with('sisa_cuti_tahunan')->orderBy('id','desc')->get());
      return view('cuti.data-cuti')->with([
        'title'=> "List Data Cuti",
        'pegawai' => Pegawai::with('sisa_cuti_tahunan')->orderBy('id','desc')->get(),
        'jenis_cuti' => JenisCuti::get(),
        'pengajuan' => PengajuanCuti::get()
       ]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function index_riwayat_cuti($request){
    try {
      return view('cuti.riwayat-cuti')->with(['title'=> "Data Pegawai",'pegawai' => Pegawai::get()]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * show_riwayat
   *
   * @param  mixed $id
   * @return void
   */
  public function show_riwayat($id){
    try {
      return view('cuti.detail-riwayat')->with([
        'title'=> "Riwayat Cuti",
        'pegawai' => Pegawai::where('id',$id)->first(), 
        'riwayat' => PengajuanCuti::where('pegawai_id',$id)->get(), 
        'sisa_cs' => PengajuanCuti::sisa_cs($id),
        'sisa_cap' => PengajuanCuti::sisa_cap($id),
        'sisa_cb' => PengajuanCuti::sisa_cb($id),
        'sisa_cm' => PengajuanCuti::sisa_cm($id),
        'sisa_th' => SisaCutiTahunan::where('pegawai_id',$id)->first()
      ]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * simpan_pengajuan_cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function simpan_pengajuan_cuti($request){
    try {
      $tgl_awal = date('Y-m-d', strtotime($request->tanggal_awal));
      $tgl_akhir = date('Y-m-d', strtotime($request->tanggal_akhir));
      $selisih_tgl = Helpers::filterTanggalWeekend($tgl_awal, $tgl_akhir); // lama hari
    
      $cuti = PengajuanCuti::create([
        'nomor_surat' =>$request->nomor_surat,
        'pegawai_id' => $request->pegawai,
        'jenis_cuti_id' => $request->jenis_cuti,
        'alasan' => $request->alasan,
        'tanggal_awal' => $tgl_awal,
        'tanggal_akhir' => $tgl_akhir,
        'lama_hari' => $selisih_tgl,
        'alamat' => $request->alamat,
        'atasan_id' => $request->atasan,
        'status' => '0'
      ]);
      return redirect()->back()->with(['success' => 'Pengajuan Cuti Telah Tersimpan']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * reject_jatah_cuti // ditolak atau ditangguhkan
   *
   * @param  mixed $id
   * @return void
   */
  public function reject_jatah_cuti($id){
    try {
      $pengajuan = PengajuanCuti::where('id',$id)->first();
      $pengajuan->update(['status' => 2]);
      return redirect()->back()->with(['success' => 'Pengajuan Cuti Telah dibatalkan']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * operasi_pengurangan_jatah_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function accept_jatah_cuti($id){
    try {
       //  Pengurangan Jatah Cuti
       $pengajuan = PengajuanCuti::where('id',$id)->first();
       $id_peg = Pegawai::where('id',$pengajuan->pegawai_id)->first();
       $query1 = SisaCutiTahunan::where('pegawai_id', $id_peg->id)->first(); // Cari Jatah Cuti Tahunan berdarskan Pegawai ID 
      
      if ($pengajuan->jenis_cuti->id == 1) {
        $tahun3 = $query1->tahun_tiga - $pengajuan->lama_hari;
        if ($tahun3 <= 0) {
            $tahun3 = 0;
            $temp = $query1->tahun_tiga - $pengajuan->lama_hari;
            if ($query1->tahun_dua + $temp <= 0) {
                $tahun2 = 0;
                $temp = $query1->tahun_dua + $temp;
                if ($query1->tahun_satu + $temp <= 0) {
                  $tahun1 = 0;
                  SisaCutiTahunan::where('pegawai_id', $id_peg->id)->update(['tahun_satu' => $tahun1]);
                  return view('handling')->with(['error' => 'Jatah Cuti Tahunan ' . $pengajuan->pegawai->nama . ' Telah Habis']);
                } else {
                    $tahun1 = $query1->tahun_satu + $temp;
                    SisaCutiTahunan::where('pegawai_id', $id_peg->id)->update(['tahun_satu' => $tahun1]);
                }
            } else {
                $tahun2 = $query1->tahun_dua + $temp;
            }
        } else {
            $tahun3 = $query1->tahun_tiga - $pengajuan->lama_hari;
        }
        SisaCutiTahunan::where('pegawai_id', $id_peg->id)->update(['tahun_tiga' => $tahun3, 'tahun_dua' => $tahun2]);
      }
      $pengajuan->update(['status' => "1"]);
      return redirect()->back()->with(['success' => 'Pengajuan Cuti Telah Tersimpan']);
      // Pengurangan Jatah Cuti
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * cetak_surat_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_surat_cuti($id){
    try {
      Helpers::cetak_cuti($id);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * reset_jatah_cuti_tahunan
   *
   * @return void
   */
  public function reset_jatah_cuti_tahunan(){
    try {
      $id_peg = Pegawai::get();
      foreach ($id_peg as $key => $value) {
        SisaCutiTahunan::where('pegawai_id',$value->id)->update(['tahun_satu'=> 12]);
        $sisa = SisaCutiTahunan::where('pegawai_id',$value->id)->get();
        foreach ($sisa as $key => $sisa) {
          if($sisa->tahun_satu > 6){
            $tahun2 = 6;
          }else{
            $tahun2 = $sisa->tahun_satu;
          }
          if($sisa->tahun_dua > 6){
            $tahun3 = 6;
          }else{
            $tahun3 = $sisa->tahun_dua;
          }
        }
        SisaCutiTahunan::where('pegawai_id',$value->id)->update(['tahun_dua' => $tahun2]);
        SisaCutiTahunan::where('pegawai_id',$value->id)->update(['tahun_tiga' => $tahun3]);
      }
      return redirect()->back()->with(['success' => 'Pengajuan Cuti Telah Tersimpan']);
      
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * cetak_kartu_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_kartu_cuti($id){
    try {
      Helpers::cetak_kartu_cuti($id);
      return redirect()->back();
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * index_kendali_cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function index_kendali_cuti($request){
    try { 
      $rekap = Pegawai::kendali_cuti();
      return view('cuti.kendali-cuti')->with(['title'=> "Kendali Cuti", 'rekap' => $rekap]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function cetak_kendali_cuti($request){
    try {
      Helpers::cetak_kendali_cuti();
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
}