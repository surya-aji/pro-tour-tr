<?php

namespace App\Modules\Perizinan\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Perizinan\Interfaces\PerizinanInterface;

class PerizinanController extends Controller
{
    private $PerizinanInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(PerizinanInterface $PerizinanInterface)
    {
        $this->PerizinanInterface = $PerizinanInterface;
    }    

    public function index_izin_keluar(Request $request){
        return $this->PerizinanInterface->index_izin_keluar($request);
    }
    public function index_izin_keluar_pegawai(Request $request){
        return $this->PerizinanInterface->index_izin_keluar_pegawai($request);
    }


}
