<?php

namespace App\Modules\Settings\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Settings\Interfaces\SettingInterface;

class SettingController extends Controller
{
    private $SettingInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(SettingInterface $SettingInterface)
    {
        $this->SettingInterface = $SettingInterface;
    }

    public function index(Request $request){
        try {
            return $this->SettingInterface->index($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    public function update(Request $request){
        try {
            return $this->SettingInterface->update($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
}
