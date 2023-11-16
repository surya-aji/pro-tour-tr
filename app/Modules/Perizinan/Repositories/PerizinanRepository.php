<?php
namespace App\Modules\Perizinan\Repositories;

use App\Modules\Perizinan\Models\IzinKeluar;
use App\Modules\Perizinan\Interfaces\PerizinanInterface;

class PerizinanRepository implements PerizinanInterface{  
  /**
   * index_izin_keluar
   *
   * @param  mixed $request
   * @return void
   */
  public function index_izin_keluar($request){
    try {
      return view('perizinan.izin-keluar')->with(['data' => IzinKeluar::get(),'title' => "List Izin Keluar"]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function index_izin_keluar_pegawai($request){
    try {
      return view('PEGAWAI_VIEW.perizinan.perizinan');
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}