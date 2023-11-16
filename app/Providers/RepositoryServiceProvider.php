<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Modules\Cuti\Interfaces\CutiInterface;
use App\Modules\Cuti\Repositories\CutiRepository;
use App\Modules\History\Interfaces\HistoryInterface;
use App\Modules\Pegawai\Interfaces\PegawaiInterface;
use App\Modules\Settings\Interfaces\SettingInterface;
use App\Modules\History\Repositories\HistoryRepository;
use App\Modules\Pegawai\Repositories\PegawaiRepository;
use App\Modules\Dashboard\Interfaces\DashboardInterface;
use App\Modules\Perizinan\Interfaces\PerizinanInterface;
use App\Modules\Settings\Repositories\SettingRepository;
use App\Modules\SuratTugas\Interfaces\SuratTugasInterface;
use App\Modules\Dashboard\Repositories\DashboardRepository;
use App\Modules\Perizinan\Repositories\PerizinanRepository;
use App\Modules\SuratTugas\Repositories\SuratTugasRepository;
use App\Modules\UserManagement\Interfaces\UserManagementInterface;
use App\Modules\UserManagement\Repositories\UserManagementRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagementInterface::class, UserManagementRepository::class);
        $this->app->bind(SettingInterface::class, SettingRepository::class);
        $this->app->bind(PegawaiInterface::class, PegawaiRepository::class);
        $this->app->bind(SuratTugasInterface::class, SuratTugasRepository::class);
        $this->app->bind(DashboardInterface::class, DashboardRepository::class);
        $this->app->bind(HistoryInterface::class, HistoryRepository::class);
        $this->app->bind(CutiInterface::class, CutiRepository::class);
        $this->app->bind(PerizinanInterface::class, PerizinanRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
