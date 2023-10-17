<?php
namespace App\Modules\Pegawai\Interfaces;

interface PegawaiInterface{
    /**
   * redirect List Pegawai Index Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request);
  
  /**
   * store new Pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function store($request);
  
  /**
   * update data Pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function update($request);
  
  /**
   * delete pegawai
   *
   * @param  mixed $request
   * @return void
   */
  public function delete($request);
}