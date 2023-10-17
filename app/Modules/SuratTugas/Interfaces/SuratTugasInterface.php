<?php
namespace App\Modules\SuratTugas\Interfaces;


interface SuratTugasInterface{  
  /**
   * index Surat Tugas Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_surat_tugas($request);
  
  /**
   * index_surat_spd page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_surat_spd($request);
  
  /**
   * Menambahkan Surat Tugas
   *
   * @param  mixed $request
   * @return void
   */
  public function add_surat_tugas($request);
  
  /**
   * cetak_surat_tugas
   *
   * @param  mixed $request
   * @return void
   */
  public function cetak_st($request);
}