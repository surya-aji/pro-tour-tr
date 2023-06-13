<?php
namespace App\Modules\UserManagement\Interfaces;


interface UserManagementInterface
{  
  /**
   * Redirect Index User Management-user Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index($request);
  
  /**
   * create_user
   *
   * @param  mixed $request
   * @return void
   */
  public function create_user($request);

  
  /**
   * update_user_role
   *
   * @param  mixed $request
   * @return void
   */
  public function update_user($request);
  
  /**
   * delete_user
   *
   * @param  mixed $request
   * @return void
   */
  public function delete_user($id);
  
  /**
   * Redirect Index User Management-permission Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_permission($request);
  
  /**
   * create_permission
   *
   * @param  mixed $request
   * @return void
   */
  public function create_permission($request);
  
  /**
   * update_permission
   *
   * @param  mixed $request
   * @return void
   */
  public function update_permission($request);
  
  /**
   * delete_permission
   *
   * @param  mixed $id
   * @return void
   */
  public function delete_permission($id);
  
  /**
   * Redirect Index User Management-role Page
   *
   * @param  mixed $request
   * @return void
   */
  public function index_role($request);
  
  /**
   * create_role_page
   *
   * @param  mixed $request
   * @return void
   */
  public function create_role_page($request);
  
  /**
   * show_role
   *
   * @param  mixed $request
   * @return void
   */
  public function show_role($request);
  
  /**
   * create_role
   *
   * @param  mixed $request
   * @return void
   */
  public function create_role($request);
  
  /**
   * update_role
   *
   * @param  mixed $request
   * @return void
   */
  public function update_role($request);
  
   
  /**
   * delete_role
   *
   * @param  mixed $id
   * @return void
   */
  public function delete_role($id);
}