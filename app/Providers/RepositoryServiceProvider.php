<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Settings\Interfaces\SettingInterface;
use App\Modules\Settings\Repositories\SettingRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
