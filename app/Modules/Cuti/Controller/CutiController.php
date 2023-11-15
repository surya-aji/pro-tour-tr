<?php

namespace App\Modules\Cuti\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Cuti\Interfaces\CutiInterface;

class CutiController extends Controller
{
    private $CutiInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(CutiInterface $CutiInterface)
    {
        $this->CutiInterface = $CutiInterface;
    }    
    /**
     * Return Index Page Data_Cuti
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request){
        return $this->CutiInterface->index_data_cuti($request);
    }
        
    /**
     * index_riwayat_cuti
     *
     * @param  mixed $request
     * @return void
     */
    public function index_riwayat_cuti(Request $request){
        return $this->CutiInterface->index_riwayat_cuti($request);
    }
    
    /**
     * show_riwayat_cuti page
     *
     * @param  mixed $id
     * @return void
     */
    public function detail_riwayat_cuti($id){
        return $this->CutiInterface->show_riwayat($id);
    }
    
    /**
     * simpan_pengajuan_cuti
     *
     * @param  mixed $request
     * @return void
     */
    public function simpan_pengajuan_cuti(Request $request){
        return $this->CutiInterface->simpan_pengajuan_cuti($request);
    }
    
    /**
     * reset_jatah_cuti_tahunan
     *
     * @param  mixed $request
     * @return void
     */
    public function reset_jatah_cuti_tahunan(Request $request){
        return $this->CutiInterface->reset_jatah_cuti_tahunan();
    }
    
    /**
     * accept_jatah_cuti
     *
     * @param  mixed $id
     * @return void
     */
    public function accept_jatah_cuti($id){
        return $this->CutiInterface->accept_jatah_cuti($id);
    }
    
    /**
     * reject_jatah_cuti
     *
     * @param  mixed $id
     * @return void
     */
    public function reject_jatah_cuti($id){
        return $this->CutiInterface->reject_jatah_cuti($id);
    }
    
    /**
     * cetak_surat_cuti
     *
     * @param  mixed $id
     * @return void
     */
    public function cetak_surat_cuti($id){
        return $this->CutiInterface->cetak_surat_cuti($id);
    }
    
    /**
     * cetak_kartu_cuti
     *
     * @param  mixed $id
     * @return void
     */
    public function cetak_kartu_cuti($id){
        return $this->CutiInterface->cetak_kartu_cuti($id);
    }
    
    /**
     * index_kendali_cuti
     *
     * @param  mixed $request
     * @return void
     */
    public function index_kendali_cuti(Request $request){
        return $this->CutiInterface->index_kendali_cuti($request);
    }

    public function cetak_kendali_cuti(Request $request){
        return $this->CutiInterface->cetak_kendali_cuti($request);
    }
}
