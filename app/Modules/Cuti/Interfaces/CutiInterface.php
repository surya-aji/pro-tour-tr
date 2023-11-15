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
  
  /**
   * operasi_pengurangan_jatah_cuti 
   *
   * @param  mixed $id
   * @return void
   */
  public function accept_jatah_cuti($id);
  
  /**
   * reject_jatah_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function reject_jatah_cuti($id);
  
  /**
   * cetak_surat_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_surat_cuti($id);
  
  /**
   * cetak_kartu_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_kartu_cuti($id);
  
  /**
   * index_kendali_cuti
   *
   * @param  mixed $id
   * @return void
   */
  public function index_kendali_cuti($request);
  
  /**
   * cetak_kendali_cuti
   *
   * @param  mixed $request
   * @return void
   */
  public function cetak_kendali_cuti($request);
}