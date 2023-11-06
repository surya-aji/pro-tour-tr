<?php
namespace App\Modules\Pegawai\Repositories;

use App\Modules\Pegawai\Models\Pegawai;
use App\Modules\Cuti\Models\SisaCutiTahunan;
use App\Modules\Pegawai\Interfaces\PegawaiInterface;

class PegawaiRepository implements PegawaiInterface{  
  /**
   * return index page list pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request){
    try {
      return view('pegawai.index')->with(['user' => Pegawai::get(),'title' => 'List Pegawai']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * store new Pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function store($request){
    try {
      $pegawai = Pegawai::create(['nama' => $request->nama,'nip' => $request->nip,'tempat_lahir' => $request->tempat_lahir,'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),'jabatan' => $request->jabatan,'pangkat' => $request->pangkat, 'golongan' => $request->golongan, 'alamat' => $request->alamat, 'nomor_telepon' => $request->nomor_telepon]);

      // Tambah Untuk Jatah Cuti Tahunan Setiap data pegawai ditambahkan
      SisaCutiTahunan::create([
        "pegawai_id" => $pegawai->id,
        "tahun_satu" => 12,
        "tahun_dua" => 0,
        "tahun_tiga" => 0,
      ]);
      
      return redirect()->back()->with(['error' => 'Pegawai Telah Ditambahkan']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * update data pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function update($request){
    try {      
        Pegawai::find($request->id)->update(['nama' => $request->nama,'nip' => $request->nip,'tempat_lahir' => $request->tempat_lahir,'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),'jabatan' => $request->jabatan,'pangkat' => $request->pangkat, 'golongan' => $request->golongan, 'alamat' => $request->alamat, 'nomor_telepon' => $request->nomor_telepon]);
        return redirect()->back()->with(['error' => 'Pegawai Updated']);
      
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function delete($id){
    try {
      Pegawai::findOrFail($id)->delete();
      return redirect()->back()->with(['success' => 'Pegawai Deleted']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}