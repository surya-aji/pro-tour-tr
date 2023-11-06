<?php

namespace App\Modules\Dashboard\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Interfaces\DashboardInterface;

class DashboardController extends Controller
{
    private $DashboardInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(DashboardInterface $DashboardInterface)
    {
        $this->DashboardInterface = $DashboardInterface;
    }    
    /**
     * Return Index Page List Pegawai
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request){
        return $this->DashboardInterface->index($request);
    }
    
}
