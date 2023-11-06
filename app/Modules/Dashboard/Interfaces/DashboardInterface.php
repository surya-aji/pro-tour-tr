<?php
namespace App\Modules\Dashboard\Interfaces;

interface DashboardInterface{  
  /**
   * index dashboard
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request);
}