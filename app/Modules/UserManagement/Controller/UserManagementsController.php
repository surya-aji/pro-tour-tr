<?php

namespace App\Modules\UserManagement\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\UserManagement\Interfaces\UserManagementInterface;

class UserManagementsController extends Controller
{
    private $UserManagementInterface;
    
    /**
     * __construct
     *
     * @param  mixed $UserInterface
     * @return void
     */
    public function __construct(UserManagementInterface $UserManagementInterface)
    {
        $this->UserManagementInterface = $UserManagementInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            return $this->UserManagementInterface->create_permission($request);
        } catch (\Throwable $th) {
            return[
                'status' => $th->getCode(),
                'message' => $th->getMessage()
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
