<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Settings\Controller\SettingController;
use App\Modules\UserManagement\Controller\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::prefix('user-management')->group(function () {
        Route::get('/user', [UserManagementController::class, 'index'])->name('index-user');
        Route::post('/create-user', [UserManagementController::class, 'create_user'])->name('create-user');
        Route::post('/update-user', [UserManagementController::class, 'update_user'])->name('update-user');
        Route::get('/delete-user/{id}', [UserManagementController::class, 'delete_user'])->name('delete-user');

        Route::get('/permission', [UserManagementController::class, 'index_permission'])->name('index-permission');
        Route::post('/add-permission', [UserManagementController::class, 'create_permission'])->name('create-permission');
        Route::post('/edit-permission', [UserManagementController::class, 'update_permission'])->name('update-permission');
        Route::get('/delete-permission/{id}', [UserManagementController::class, 'delete_permission'])->name('delete-permission');

        Route::get('/role', [UserManagementController::class, 'index_role'])->name('index-role');
        Route::post('/add-role', [UserManagementController::class, 'create_role'])->name('create-role');
        Route::post('/edit-role', [UserManagementController::class, 'update_role'])->name('update-role');
        Route::get('/delete-role/{id}', [UserManagementController::class, 'delete_role'])->name('delete-role');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index-setting');
        Route::post('/update-setting', [SettingController::class, 'update'])->name('update-setting');
    });
    
});
