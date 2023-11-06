<?php
namespace App\Modules\Settings\Repositories;

use App\Modules\Settings\Models\Settings;
use App\Modules\Settings\Interfaces\SettingInterface;

class SettingRepository implements SettingInterface{  

  /**
   * index
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request){
    try {
      return view('settings.index')->with(['setting_website' => Settings::where('type', 'Website')->get(),'title' => 'Setting Page', 'setting_configuration' => Settings::where('type','Configuration')->orderBy('id', 'desc')->get()]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function update($request){
    try {
      foreach ($request->setting as $set) {
        Settings::where('id', $set['id'])->update(['value'=>$set['key']]);
      }
      return redirect()->back()->with(['error' => 'Setting Updated']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}