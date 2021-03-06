<?php

declare(strict_types=1);

namespace Tipoff\LaravelAgoraApi;

use Illuminate\Support\Facades\Route;
use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class LaravelAgoraApiServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->name('agora')
            ->hasConfigFile('agora')
            ->hasAssets();
    }

    public function boot()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadRoutesFrom(__DIR__.'/../routes/channels.php');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/agora.php' => config_path('agora.php'),
        ], 'agora-config');

        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js/vendor/laravel-agora-api'),
        ], 'agora-js');

        $this->publishes([
            __DIR__.'/../resources/css/agora-component-styles.css' => resource_path('css/vendor/agora-component-styles.css'),
        ], 'agora-css');
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('agora.routes.prefix'),
            'middleware' => config('agora.routes.middleware'),
        ];
    }
}
