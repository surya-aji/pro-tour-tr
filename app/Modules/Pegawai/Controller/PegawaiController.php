<?php

namespace App\Modules\Pegawai\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormEditPegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Modules\Pegawai\Interfaces\PegawaiInterface;

class PegawaiController extends Controller
{
    private $PegawaiInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(PegawaiInterface $PegawaiInterface)
    {
        $this->PegawaiInterface = $PegawaiInterface;
    }    
    /**
     * Return Index Page List Pegawai
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request){
        return $this->PegawaiInterface->index($request);
    }
    
    /**
     * store new Data Pegawai
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StorePegawaiRequest $request){
        return $this->PegawaiInterface->store($request);
    }
    
    /**
     * update data Pegawai
     *
     * @param  mixed $request
     * @return void
     */
    public function update(FormEditPegawai $request){
        return $this->PegawaiInterface->update($request);
    }
    
    /**
     * delete Pegawai
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id){
        return $this->PegawaiInterface->delete($id);
    }
}
