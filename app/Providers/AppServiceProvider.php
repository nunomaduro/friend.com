<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if /tmp/database.sqlite does not exists, create an empty database and migrate
        if (!file_exists(database_path('database.sqlite'))) {
            touch(database_path('database.sqlite'));

            Artisan::call('migrate');
        }
    }
}
