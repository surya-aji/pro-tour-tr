<?php
namespace App\Modules\Settings\Interfaces;

interface SettingInterface{  
  /**
   * redirect Setting Index Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request);
  
  /**
   * update
   *
   * @param  mixed $request
   * @return void
   */
  public function update($request);
}