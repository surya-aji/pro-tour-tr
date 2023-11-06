<?php
namespace App\Modules\History\Repositories;

use App\Modules\History\Models\Log;
use App\Modules\History\Interfaces\HistoryInterface;


class HistoryRepository implements HistoryInterface{  
  /**
   * index
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request){
    try {
      $data = Log::orderBy('created_at', 'desc')->get();
      return view('history.index')->with(['data' => $data,'title' => "List Log"]);
      // dd($data);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}