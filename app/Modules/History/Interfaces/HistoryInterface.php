<?php
namespace App\Modules\History\Interfaces;


interface HistoryInterface{  
  /**
   * index
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request);
}