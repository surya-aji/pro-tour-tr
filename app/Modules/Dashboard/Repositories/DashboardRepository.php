<?php
namespace App\Modules\Dashboard\Repositories;

use App\Models\User;
use App\Modules\History\Models\Log;
use App\Modules\SuratTugas\Models\SPD;
use App\Modules\Pegawai\Models\Pegawai;
use App\Modules\SuratTugas\Models\SuratTugas;
use App\Modules\Dashboard\Interfaces\DashboardInterface;

class DashboardRepository implements DashboardInterface{  
  /**
   * index
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request){
    try {
      $j_st = SuratTugas::count();
      $j_spd = SPD::count();
      $j_user = User::count();
      $j_peg = Pegawai::count();
      $latestAct = Log::orderBy('created_at', 'desc')->limit(5)->get();
      return view('dashboard')->with(['j_st'=> $j_st, 'j_spd' => $j_spd, 'j_user' => $j_user,"j_peg" => $j_peg,'latestAct' => $latestAct]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}