<?php

namespace App\Modules\History\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\History\Interfaces\HistoryInterface;

class HistoryController extends Controller
{
    private $HistoryInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(HistoryInterface $HistoryInterface)
    {
        $this->HistoryInterface = $HistoryInterface;
    }    
    /**
     * Return Index Page List Pegawai
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request){
        return $this->HistoryInterface->index($request);
    }
}
