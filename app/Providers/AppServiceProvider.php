<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Attribute\AttributeRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AttributeInterface::class,AttributeRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
