<?php
namespace App\Modules\SuratTugas\Repositories;

use Carbon\Carbon;
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
      return view('surat.surat-tugas')->with(['surat' => SuratTugas::get(),'title' => 'List Surat Tugas', 'pegawai' => Pegawai::get()]);
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
      $surat_tugas = SuratTugas::create([
        'nomor_surat' => $request->nomor_surat,
        'dasar_surat' => $request->dasar_surat,
        'maksud_surat' => $request->maksud_surat,
        'tanggal_surat' => date('Y-m-d', strtotime($request->tanggal_surat)),
        'tanggal_pelaksanaan' => date('Y-m-d', strtotime($request->tanggal_pelaksanaan)),
        'tempat_pelaksanaan' => $request->tempat_pelaksanaan ,
        'dari' => $request->dari,
        'kepada' => json_encode($request->kepada),
        'created_by' => Auth::user()->name,
        'updated_by' => Auth::user()->name,
      ]);


      foreach ($request->kepada as $key => $value) {
        SPD::create([
          'pembuat_komitmen' => $request->pejabat_pembuat_komitmen,
          'pegawai_id' => $value ,
          'surat_tugas_id' => $surat_tugas->id ,
          'tingkat_biaya' => $request->tingkat_biaya,
          'angkutan' => $request->angkutan,
          'lama_dinas' => $value ,
          'tanggal_berangkat' => date('Y-m-d', strtotime($request->tanggal_berangkat)),
          'tanggal_pulang' => date('Y-m-d', strtotime($request->tanggal_pulang)),
          'anggaran' => $request->anggaran,
          'instansi' => $request->instansi,
          'akun' => $request->akun,
          'created_by' => Auth::user()->name,
          'updated_by' => Auth::user()->name,
        ]);
      }
      return redirect()->back()->with(['success' => 'Surat Created']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function cetak_st($request){
    try {
      
      // // dd(storage_path());

      // $data = SuratTugas::findOrFail($request)->first();
      // $dari = Pegawai::findOrFail($data->dari)->first();
      // $kepada = Pegawai::whereIn('id', json_decode($data->kepada))->get()->map(function($pegawai, $index) {
      //   $pegawai['index'] = $index + 1;
      //   return $pegawai;
      // })->toArray();

     
      // $template = new TemplateProcessor(storage_path('template_ST.docx') );
      // $template->setValue('nomor_surat', $data->nomor_surat);
      // $template->setValue('dasar_surat', $data->dasar_surat);
      // $template->setValue('maksud_surat', $data->maksud_surat);
      // $template->setValue('tanggal_pelaksanaan', Carbon::parse($data->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y'));
      // $template->setValue('tempat_pelaksanaan', $data->tempat_pelaksanaan);
      // $template->setValue('tanggal_surat',Carbon::parse($data->tanggal_surat)->isoFormat('dddd, D MMMM Y'));
      // $template->setValue('jabatan_pemberi_perintah', $dari->jabatan);
      // $template->setValue('nama_pemberi_perintah', $dari->nama);
      // $template->setValue('nip_pemberi_perintah', $dari->nip);
      
      // $template->cloneRowAndSetValues('index', $kepada);



      // $file_name = $data->nomor_surat . ".docx";

      // header("Content-Description: File Transfer");
      // header('Content-Disposition: attachment; filename="' . $file_name . '"');
      // header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      // header('Content-Transfer-Encoding: binary');
      // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      // header('Expires: 0');
      
      // $template->saveAs('php://output');





      ///////////////////////////////////////////////////////////////

            // dd(storage_path());

      $data = SuratTugas::where('id', $request)->first();
      $dari = Pegawai::where('id',$data->dari)->first();
      $kepada = Pegawai::whereIn('id', json_decode($data->kepada))->get()->map(function($pegawai, $index) {
        $pegawai['index'] = $index + 1;
        return $pegawai;
      })->toArray();

     
      $template = new TemplateProcessor(storage_path('template_ST.docx') );
      $template->setValue('nomor_surat', $data->nomor_surat);
      $template->setValue('dasar_surat', $data->dasar_surat);
      $template->setValue('maksud_surat', $data->maksud_surat);
      $template->setValue('tanggal_pelaksanaan', Carbon::parse($data->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y'));
      $template->setValue('tempat_pelaksanaan', $data->tempat_pelaksanaan);
      $template->setValue('tanggal_surat',Carbon::parse($data->tanggal_surat)->isoFormat('dddd, D MMMM Y'));
      $template->setValue('jabatan_pemberi_perintah', $dari->jabatan);
      $template->setValue('nama_pemberi_perintah', $dari->nama);
      $template->setValue('nip_pemberi_perintah', $dari->nip);
      
      $template->cloneRowAndSetValues('index', $kepada);



      $file_name = 'test-coba' . ".docx";

      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=$file_name" );
      header('Content-Type: application/octet-stream');

      
      $template->saveAs('php://output');


      return redirect()->back()->with(['success' => 'Surat Created']);

      
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}