<?php
namespace App\Modules\Pegawai\Repositories;

use App\Modules\Pegawai\Models\Pegawai;
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
      Pegawai::create(['nama' => $request->nama,'nip' => $request->nip,'tempat_lahir' => $request->tempat_lahir,'tanggal_lahir' => $request->tanggal_lahir,'jabatan' => $request->jabatan,'pangkat_golongan' => $request->pangkat_golongan]);
      return redirect()->back()->with(['error' => 'Pegawai Created']);
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
        Pegawai::find($request->id)->update($request->validated());
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