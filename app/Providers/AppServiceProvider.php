<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\CursorPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \URL::forceScheme('https'); 
       // Paginator::useBootstrap();
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
