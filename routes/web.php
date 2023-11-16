<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Cuti\Controller\CutiController;
use App\Modules\History\Controller\HistoryController;
use App\Modules\Pegawai\Controller\PegawaiController;
use App\Modules\Settings\Controller\SettingController;
use App\Modules\Dashboard\Controller\DashboardController;
use App\Modules\Perizinan\Controller\PerizinanController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('user-management')->group(function () {
        Route::group(['middleware' => ['role:super-admin']], function () {
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
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('index-pegawai');
        Route::post('/store-pegawai', [PegawaiController::class, 'store'])->name('store-pegawai');
        Route::post('/update-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
        Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
    });

    Route::prefix('cuti')->group(function () {
        Route::get('/pengajuan', [CutiController::class, 'index'])->name('index-data-cuti');
        Route::get('/kendali-cuti', [CutiController::class, 'index_kendali_cuti'])->name('kendali-cuti');
        Route::get('/cetak-kendali-cuti', [CutiController::class, 'cetak_kendali_cuti'])->name('cetak-kendali-cuti');
        Route::get('/disetujui/{id}', [CutiController::class, 'accept_jatah_cuti'])->name('accept_cuti');
        Route::get('/batalkan/{id}', [CutiController::class, 'reject_jatah_cuti'])->name('reject_cuti');
        Route::get('/cetak_surat_cuti/{id}', [CutiController::class, 'cetak_surat_cuti'])->name('cetak-cuti');
        Route::get('/cetak_kartu_cuti/{id}', [CutiController::class, 'cetak_kartu_cuti'])->name('cetak-kartu-cuti');
        Route::post('/pengajuan', [CutiController::class, 'simpan_pengajuan_cuti'])->name('simpan-pengajuan-cuti');
        Route::get('/riwayat-cuti', [CutiController::class, 'index_riwayat_cuti'])->name('index-riwayat-cuti');
        Route::get('/riwayat-cuti/{id}', [CutiController::class, 'detail_riwayat_cuti'])->name('riwayat-cuti-detail');
        Route::get('/reset-jatah-cuti', [CutiController::class, 'reset_jatah_cuti_tahunan'])->name('reset-jatah-cuti');
    });

    Route::prefix('perizinan')->group(function () {
        Route::get('/izin-keluar', [PerizinanController::class, 'index_izin_keluar'])->name('index-izin-keluar');
        Route::get('/p-izin-keluar', [PerizinanController::class, 'index_izin_keluar_pegawai'])->name('p-index-izin-keluar');
        
        // Route::post('/update-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
        // Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
    });


    Route::prefix('surat')->group(function () {
        Route::get('/surat-tugas', [SuratTugasController::class, 'index_surat_tugas'])->name('index-surat-tugas');
        Route::get('/edit-surat-tugas/{id}', [SuratTugasController::class, 'edit_surat_tugas'])->name('edit-surat-tugas');
        Route::get('/cetak-st/{id}', [SuratTugasController::class, 'cetak_st'])->name('cetak-st');
        Route::get('/cetak-spd/{id}', [SuratTugasController::class, 'cetak_spd'])->name('cetak-spd');
        Route::get('/spd', [SuratTugasController::class, 'index_surat_spd'])->name('index-spd');
        Route::post('/add-surat-tugas', [SuratTugasController::class, 'add_surat_tugas'])->name('add-surat-tugas');
        Route::post('/add-surat-tugas-dalkot', [SuratTugasController::class, 'add_surat_tugas_dalkot'])->name('add-surat-tugas-dalkot');
        Route::post('/update-surat-tugas', [SuratTugasController::class, 'update_surat_tugas'])->name('update-surat-tugas');
        Route::get('/hapus-surat-tugas/{id}', [SuratTugasController::class, 'delete_surat_tugas'])->name('delete-surat-tugas');
        
        // Route::post('/update-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
        // Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');
    });

    Route::prefix('history')->group(function () {
        Route::get('/', [HistoryController::class, 'index'])->name('index-history');
    });


    
    Route::prefix('settings')->group(function () {
        Route::group(['middleware' => ['role:super-admin']], function () {
            Route::get('/', [SettingController::class, 'index'])->name('index-setting');
            Route::post('/update-setting', [SettingController::class, 'update'])->name('update-setting');
        });
    });
});

Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('temp/surat_tugas/' . $filename);
    
    if (!File::exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->where('filename', '(.*)');
