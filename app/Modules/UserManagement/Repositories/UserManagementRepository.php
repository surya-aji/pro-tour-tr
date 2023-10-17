<?php
namespace App\Modules\UserManagement\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Modules\UserManagement\Interfaces\UserManagementInterface;
use App\Modules\UserManagement\Models\Permission as PermissionUser;

class UserManagementRepository implements UserManagementInterface{
  
  /**
   * Redirect Index User Management-user Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request){
    try {
        $user = User::all();
        return view('user-management.user.index')->with(['user' => User::with('roles')->with('permissions')->get(),'title' => 'List Of User', 'roles' => Role::get()]);
    } catch (\Throwable $th) {
        return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * create_user
   *
   * @param  mixed $request
   * @return void
   */
  public function create_user($request){
    try {
      $role = Role::find($request->role);
      $user = User::create(['name' => $request->name,'email' => $request->email,'phone_number' => $request->phone,'password' => Hash::make($request->password),'created_by' => Auth::user()->id,'updated_by' => Auth::user()->id]);
      $user->syncRoles([$role->name]);
      $user->syncPermissions($role->permissions->pluck('name'));
      return redirect()->back()->with(['error' => 'User Created']);
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
  public function update_user($request){
    try {
      $role = Role::find($request->role);
      $user = User::find($request->id);
      $user->syncRoles([$role->name]);
      $user->syncPermissions($role->permissions->pluck('name'));
      return redirect()->back()->with(['error' => 'User Updated']);
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
      $user = User::find($id);
      $user->deleteProfilePhoto();
      $user->tokens->each->delete();
      $user->delete();
      return redirect()->back()->with(['error' => 'User Deleted']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * index_permission
   *
   * @param  mixed $request
   * @return void
   */
  public function index_permission($request){
    try {
      return view('user-management.permissions.index')->with(['parent' => Permission::whereIn('parent_id', [0])->get() ,'permissions' => Permission::whereNotIn('parent_id', [0])->get() ,'title' => 'List Permissions','parent_permissions' => Permission::where('parent_id',0)->get() ]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * create_permission
   *
   * @param  mixed $request
   * @return void
   */
  public function create_permission($request){
    try {
      Permission::create(['display_name'=> $request->displayname,'name' => $request->name, 'parent_id' => $request->parent, 'created_by' => Auth::user()->id,'updated_by' => Auth::user()->id]);
      return redirect()->back()->with(['error' => 'Permission Created']);
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
  public function update_permission($request){
    try {
      Permission::find($request->id)->update(['display_name'=> $request->displayname,'name' => $request->name, 'parent_id' => $request->parent,'updated_by' => Auth::user()->id]);
      return redirect()->back()->with(['error' => 'Permission Updated']);
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
      Permission::where('id',$id)->delete();
      return redirect()->back()->with(['error' => 'Permission Deleted']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * Redirect Index User Management-user Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_role($request){
    try {
      return view('user-management.roles.index')->with(['role' => Role::get(),'title' => 'List Role', 'permissions' => PermissionUser::with('children')->where('parent_id', 0)->get()]);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }

  public function create_role_page($request){
    try {
      return view('user-management.roles.create')->with(['permissions' => PermissionUser::with('children')->where('parent_id', 0)->get()]);
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
  public function create_role($request){
    try {
      foreach ($request->permission as $key => $value) {
        $permission[] = $key; 
      }
      Role::create(['name' => $request->name, 'created_by' => Auth::user()->id,'updated_by' => Auth::user()->id])->syncPermissions($permission);
      return redirect()->route('index-role')->with(['error' => 'Role Created']);
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
      return view('user-management.roles.edit')->with(['role' => Role::where('id',$request)->first(),'title' => 'List Role', 'permissions' => PermissionUser::with('children')->where('parent_id', 0)->get()]);
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
  public function update_role($request){
    try { 
      foreach ($request->permission as $key => $value) {
        $permission[] = $key; 
      }
      $role = Role::find($request->id);
      $role->update(['name' => $request->name,'updated_by' => Auth::user()->id]);
      $role->syncPermissions($permission);
      return redirect()->route('index-role')->with(['error' => 'Role Updated']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
  
  /**
   * delete_role
   *
   * @param  mixed $id
   * @return void
   */
  public function delete_role($id){
    try {
      $role = Role::find($id)->delete();
      return redirect()->back()->with(['error' => 'Role Deleted']);
    } catch (\Throwable $th) {
      return view('error')->with('error', $th->getMessage());
    }
  }
}