<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MarketData\CandleProvider;
use App\Services\MarketData\Providers\DuckDbCandleProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CandleProvider::class,
            DuckDbCandleProvider::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
