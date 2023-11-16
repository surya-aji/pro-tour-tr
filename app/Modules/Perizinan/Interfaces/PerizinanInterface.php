<?php
namespace App\Modules\Perizinan\Interfaces;


interface PerizinanInterface{  
  /**
   * index_izin_keluar
   *
   * @param  mixed $request
   * @return void
   */
  public function index_izin_keluar($request);
  
  /**
   * index_izin_keluar_pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function index_izin_keluar_pegawai($request);
}