<?php

declare(strict_types=1);

namespace Tipoff\LaravelAgoraApi;

use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class LaravelAgoraApiServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->name('laravel-agora-api')
            ->hasViews()
            ->hasConfigFile();
    }

    public function register()
    {
        parent::register();
    }
}
