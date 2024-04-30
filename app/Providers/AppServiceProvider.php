<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        Paginator::defaultView('admin.products');
        Paginator::defaultSimpleView('admin.products');

        Paginator::useBootstrapFive();

        View::composer(['shop'], function ($view) {
            $view->with('customer', session()->get('customer'));
        });

        View::composer(['admin.products', 'admin.admin_index', 'admin.customer', 'admin.edit_products'], function ($view) {
            $view->with('admin', session()->get('admin'));
        });
    }
}
