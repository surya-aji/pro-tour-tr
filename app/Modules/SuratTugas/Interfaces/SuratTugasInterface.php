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
   * edit_surat_tugas page
   *
   * @param  mixed $request
   * @return void
   */
  public function edit_surat_tugas($request);
  
  /**
   * update_surat_tugas
   *
   * @param  mixed $request
   * @return void
   */
  public function update_surat_tugas($request);
  
  /**
   * delete_surat_tugas
   *
   * @param  mixed $id
   * @return void
   */
  public function delete_surat_tugas($id);
  /**
   * cetak_surat_tugas
   *
   * @param  mixed $request
   * @return void
   */
  public function cetak_st($id);
  
  /**
   * cetak_surat_spd
   *
   * @param  mixed $id
   * @return void
   */
  public function cetak_spd($id);
}