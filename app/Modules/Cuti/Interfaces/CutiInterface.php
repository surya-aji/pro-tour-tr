<?php
namespace App\Modules\Cuti\Interfaces;

interface CutiInterface{  
  /**
   * index data cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function index_data_cuti($request);
  
  /**
   * index_riwayat_cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function index_riwayat_cuti($request);
  
  /**
   * riwayat_cuti_detail page
   *
   * @param  mixed $id
   * @return void
   */
  public function show_riwayat($id);
  
  /**
   * simpan_pengajuan cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function simpan_pengajuan_cuti($request);
  
  /**
   * reset_jatah_cuti_tahunan
   *
   * @return void
   */
  public function reset_jatah_cuti_tahunan();
}