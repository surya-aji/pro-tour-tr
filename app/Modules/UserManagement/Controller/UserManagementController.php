<?php

namespace App\Modules\UserManagement\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\UserManagement\Interfaces\UserManagementInterface;

class UserManagementController extends Controller
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
     * redirect Usermanagement index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request){
        try {
            return $this->UserManagementInterface->index($request);
        } catch (\Throwable $th) {
            return[
                'status' => $th->getCode(),
                'message' => $th->getMessage()
            ];
        }
    }
    
    /**
     * create_user
     *
     * @param  mixed $request
     * @return void
     */
    public function create_user(Request $request){
        try {
            return $this->UserManagementInterface->create_user($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * update_user
     *
     * @param  mixed $request
     * @return void
     */
    public function update_user(Request $request){
        try {
            return $this->UserManagementInterface->update_user($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * delete_user
     *
     * @param  mixed $id
     * @return void
     */
    public function delete_user($id){
        try {
            return $this->UserManagementInterface->delete_user($id);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    
    /**
     * Redirect Index User Management-permission Page
     *
     * @param  mixed $request
     * @return void
     */
    public function index_permission(Request $request){
        try {
            return $this->UserManagementInterface->index_permission($request);
        } catch (\Throwable $th) {
            return[
                'status' => $th->getCode(),
                'message' => $th->getMessage(),
            ];
        }
    }
    
    /**
     * create_permission
     *
     * @param  mixed $request
     * @return void
     */
    public function create_permission(Request $request){
        try {
            return $this->UserManagementInterface->create_permission($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }

    
    /**
     * update_permission
     *
     * @param  mixed $request
     * @return void
     */
    public function update_permission(Request $request){
        try {
            return $this->UserManagementInterface->update_permission($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * delete_permission
     *
     * @param  mixed $id
     * @return void
     */
    public function delete_permission($id){
        try {
            return $this->UserManagementInterface->delete_permission($id);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }

    
    /**
     * Redirect Index User Management-role Page
     *
     * @param  mixed $request
     * @return void
     */
    public function index_role(Request $request){
        try {
            return $this->UserManagementInterface->index_role($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * create_role_page
     *
     * @param  mixed $request
     * @return void
     */
    public function create_role_page(Request $request){
        try {
            return $this->UserManagementInterface->create_role_page($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * show_role
     *
     * @param  mixed $request
     * @return void
     */
    public function show_role($request){
        try {
            return $this->UserManagementInterface->show_role($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * create_role
     *
     * @param  mixed $request
     * @return void
     */
    public function create_role(Request $request){
        try {
            return $this->UserManagementInterface->create_role($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
    
    /**
     * update_role
     *
     * @param  mixed $request
     * @return void
     */
    public function update_role(Request $request){
        try {
            return $this->UserManagementInterface->update_role($request);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }

    public function delete_role($id){
        try {
            return $this->UserManagementInterface->delete_role($id);
        } catch (\Throwable $th) {
            return view('error')->with('error', $th->getMessage());
        }
    }
}
