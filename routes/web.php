<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Pegawai\Controller\PegawaiController;
use App\Modules\Settings\Controller\SettingController;
use App\Modules\SuratTugas\Controller\SuratTugasController;
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

Route::get('/', function () { return view('auth.login');});

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
        Route::get('/create-role', [UserManagementController::class, 'create_role_page'])->name('create-role-page');
        Route::post('/add-role', [UserManagementController::class, 'create_role'])->name('create-role');
        Route::post('/edit-role', [UserManagementController::class, 'update_role'])->name('update-role');
        Route::get('/show-role/{id}', [UserManagementController::class, 'show_role'])->name('show-role');
        Route::get('/delete-role/{id}', [UserManagementController::class, 'delete_role'])->name('delete-role');
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('index-pegawai');
        Route::post('/store-pegawai', [PegawaiController::class, 'store'])->name('store-pegawai');
        Route::post('/update-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
        Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
    });

    Route::prefix('surat')->group(function () {
        Route::get('/surat-tugas', [SuratTugasController::class, 'index_surat_tugas'])->name('index-surat-tugas');
        Route::get('/cetak-st/{id}', [SuratTugasController::class, 'cetak_st'])->name('cetak-st');
        Route::get('/spd', [SuratTugasController::class, 'index_surat_spd'])->name('index-spd');
        Route::post('/add-surat-tugas', [SuratTugasController::class, 'add_surat_tugas'])->name('add-surat-tugas');
        // Route::post('/update-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
        // Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
    });
    
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index-setting');
        Route::post('/update-setting', [SettingController::class, 'update'])->name('update-setting');
    });
});
