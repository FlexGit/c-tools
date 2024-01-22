<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentAsset;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Js;

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
        FilamentAsset::register([
            Js::make('custom-script', __DIR__ . '/../../resources/js/custom.js'),
            Js::make('jquery-script', __DIR__ . '/../../resources/js/jquery.min.js'),
        ]);

        Paginator::useBootstrapFour();
    }
}
