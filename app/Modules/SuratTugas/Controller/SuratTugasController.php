<?php

namespace App\Modules\SuratTugas\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormSuratSTDanSPPD;
use App\Modules\SuratTugas\Interfaces\SuratTugasInterface;

class SuratTugasController extends Controller
{
    private $SuratTugasInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(SuratTugasInterface $SuratTugasInterface)
    {
        $this->SuratTugasInterface = $SuratTugasInterface;
    }
    
    /**
     * index_surat_tugas page
     *
     * @param  mixed $request
     * @return void
     */
    public function index_surat_tugas(Request $request){
        return $this->SuratTugasInterface->index_surat_tugas($request);
    }
    
    /**
     * index_surat_spd page
     *
     * @param  mixed $request
     * @return void
     */
    public function index_surat_spd(Request $request){
        return $this->SuratTugasInterface->index_surat_spd($request);
    }
    
    /**
     * Menambahkan Surat Tugas
     *
     * @param  mixed $request
     * @return void
     */
    public function add_surat_tugas(FormSuratSTDanSPPD $request){
        return $this->SuratTugasInterface->add_surat_tugas($request);
    }
    
    /**
     * cetak_surat tugas
     *
     * @param  mixed $request
     * @return void
     */
    public function cetak_st($id){
        return $this->SuratTugasInterface->cetak_st($id);
    }
}
