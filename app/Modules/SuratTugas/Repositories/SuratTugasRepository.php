<?php
namespace App\Modules\SuratTugas\Repositories;

use Carbon\Carbon;
use App\Helpers\Helpers;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Auth;
use App\Modules\SuratTugas\Models\SPD;
use App\Modules\Pegawai\Models\Pegawai;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Modules\SuratTugas\Models\SuratTugas;
use App\Modules\SuratTugas\Interfaces\SuratTugasInterface;

class SuratTugasRepository implements SuratTugasInterface{  
  /**
   * index Surat Tugas Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_surat_tugas($request){
    try {
      return view('surat.surat-tugas')->with(['surat' => SuratTugas::get(),'title' => 'List Surat Tugas', 'pegawai' => Pegawai::orderBy('created_at', 'desc')->get()]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * index_surat_spd page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_surat_spd($request){
    try {
      return view('surat.surat-spd')->with(['surat' => SPD::get(),'title' => 'List SPD', 'pegawai' => Pegawai::get()]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * Menambahkan Surat tugas dan SPD
   *
   * @param  mixed $request
   * @return void
   */
  public function add_surat_tugas($request){
    try {
      
      if ($request->jenis == 0) {
        $surat_tugas = SuratTugas::create([
          'nomor_surat' => $request->nomor_surat,
          'dasar_surat' => $request->dasar_surat,
          'dasar_hukum' => $request->dasar_hukum,
          'maksud_surat' => $request->maksud_surat,
          'tanggal_surat' => date('Y-m-d', strtotime($request->tanggal_surat)),
          'tanggal_pelaksanaan' => date('Y-m-d', strtotime($request->tanggal_pelaksanaan)),
          'tempat_pelaksanaan' => $request->tempat_pelaksanaan ,
          'dari' => $request->dari,
          'kepada' => json_encode($request->kepada),
          'jenis' => false,
          'created_by' => Auth::user()->name,
          'updated_by' => Auth::user()->name,
        ]);
        return redirect()->back()->with(['success' => 'Surat Created']);
      }else{
        $surat_tugas = SuratTugas::create([
          'nomor_surat' => $request->nomor_surat,
          'dasar_surat' => $request->dasar_surat,
          'dasar_hukum' => $request->dasar_hukum,
          'maksud_surat' => $request->maksud_surat,
          'tanggal_surat' => date('Y-m-d', strtotime($request->tanggal_surat)),
          'tanggal_pelaksanaan' => date('Y-m-d', strtotime($request->tanggal_pelaksanaan)),
          'tempat_pelaksanaan' => $request->tempat_pelaksanaan ,
          'dari' => $request->dari,
          'kepada' => json_encode($request->kepada),
          'jenis' => true,
          'created_by' => Auth::user()->name,
          'updated_by' => Auth::user()->name,
        ]);
  
     
        $tgl_berangkat = Carbon::parse($request->tanggal_berangkat);
        $tgl_pulang = Carbon::parse($request->tanggal_pulang);
        $selisih_hari = $tgl_berangkat->diffInDays($tgl_pulang);
  
        foreach ($request->kepada as $key => $value) {
          SPD::create([
            'pegawai_id' => $value ,
            'surat_tugas_id' => $surat_tugas->id ,
            'tingkat_biaya' => $request->tingkat_biaya,
            'angkutan' => $request->angkutan,
            'lama_dinas' =>$selisih_hari,
            'tanggal_berangkat' => date('Y-m-d', strtotime($request->tanggal_berangkat)),
            'tanggal_pulang' => date('Y-m-d', strtotime($request->tanggal_pulang)),
            'kota_tujuan' => $request->kota_tujuan,
            'instansi' => $request->instansi,
            'akun' => $request->akun,
            'created_by' => Auth::user()->name,
            'updated_by' => Auth::user()->name,
          ]);
        }
        return redirect()->back()->with(['success' => 'Surat Created']);
      }
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * edit_surat_tugas page
   *
   * @param  mixed $request
   * @return void
   */
  public function edit_surat_tugas($request){
    try {
      $surat_tugas = SuratTugas::where('id',$request)->first();
      $dari = Pegawai::where('id',$surat_tugas->dari)->first();
      $kepada = Pegawai::whereIn('id',json_decode($surat_tugas->kepada))->get();
      // dd($kepada);
      if ($surat_tugas->jenis == 0) {
        return view('surat.edit-surat-tugas-dalkot')->with(['surat'=> $surat_tugas,'dari' => $dari,'kepada' => $kepada,'pegawai'=> Pegawai::orderBy('created_at', 'desc')->get()]);
      }else{
        return view('surat.edit-surat-tugas')->with(['surat'=> $surat_tugas,'dari' => $dari,'kepada' => $kepada,'pegawai'=> Pegawai::orderBy('created_at', 'desc')->get()]);
      }
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * update_surat_tugas
   *
   * @param  mixed $request
   * @return void
   */
  public function update_surat_tugas($request){
    try {
      $surat_tugas = SuratTugas::findOrFail($request->id);
      // delete old SPD
    
      if ($surat_tugas->jenis == 0) {
        $surat_tugas->update([
          'nomor_surat' => $request->nomor_surat,
          'dasar_surat' => $request->dasar_surat,
          'dasar_hukum' => $request->dasar_hukum,
          'maksud_surat' => $request->maksud_surat,
          'tanggal_surat' => date('Y-m-d', strtotime($request->tanggal_surat)),
          'tanggal_pelaksanaan' => date('Y-m-d', strtotime($request->tanggal_pelaksanaan)),
          'tempat_pelaksanaan' => $request->tempat_pelaksanaan ,
          'dari' => $request->dari,
          'jenis' => false,
          'kepada' => json_encode($request->kepada),
          'updated_by' => Auth::user()->name,
        ]);
        return redirect()->route('index-surat-tugas');
      }else{
        $surat_tugas->update([
          'nomor_surat' => $request->nomor_surat,
          'dasar_surat' => $request->dasar_surat,
          'dasar_hukum' => $request->dasar_hukum,
          'maksud_surat' => $request->maksud_surat,
          'tanggal_surat' => date('Y-m-d', strtotime($request->tanggal_surat)),
          'tanggal_pelaksanaan' => date('Y-m-d', strtotime($request->tanggal_pelaksanaan)),
          'tempat_pelaksanaan' => $request->tempat_pelaksanaan ,
          'dari' => $request->dari,
          'jenis' => true,
          'kepada' => json_encode($request->kepada),
          'updated_by' => Auth::user()->name,
        ]);
  
        $spd = SPD::where('surat_tugas_id',$surat_tugas->id)->delete();
        $tgl_berangkat = Carbon::parse($request->tanggal_berangkat);
        $tgl_pulang = Carbon::parse($request->tanggal_pulang);
        $selisih_hari = $tgl_berangkat->diffInDays($tgl_pulang);
  
        foreach ($request->kepada as $key => $value) {
          SPD::create([
            'pegawai_id' => $value ,
            'surat_tugas_id' => $surat_tugas->id ,
            'tingkat_biaya' => $request->tingkat_biaya,
            'angkutan' => $request->angkutan,
            'lama_dinas' => $selisih_hari ,
            'tanggal_berangkat' => date('Y-m-d', strtotime($request->tanggal_berangkat)),
            'tanggal_pulang' => date('Y-m-d', strtotime($request->tanggal_pulang)),
            'kota_tujuan' => $request->kota_tujuan,
            'instansi' => $request->instansi,
            'akun' => $request->akun,
            'created_by' => Auth::user()->name,
            'updated_by' => Auth::user()->name,
          ]);
        }
        return redirect()->route('index-surat-tugas');
      }

     
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * delete_surat_tugas
   *
   * @param  mixed $id
   * @return void
   */
  public function delete_surat_tugas($id){
    try {
      $surat_tugas = SuratTugas::find($id);
      $surat_dinas = SPD::where('surat_tugas_id', $surat_tugas->id)->delete();
      $surat_tugas->delete();
      return redirect()->back()->with(['error' => 'Surat Terhapus']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * cetak_surat_tugas
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_st($id){
    try {
      Helpers::cetak_surat_tugas($id);
      return redirect()->back()->with(['success' => 'Surat Created']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * cetak_surat_spd
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_spd($id){
    try {
      Helpers::cetak_spd($id);
      return redirect()->back()->with(['success' => 'Surat Created']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}