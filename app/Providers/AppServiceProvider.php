<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    $this->app->bind(\AmoCRM\Client\AmoCRMApiClient::class, function(Application $app){
            return new \AmoCRM\Client\AmoCRMApiClient(config('app.client_id'), config('app.client_secret'), config('app.redirect_url'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
