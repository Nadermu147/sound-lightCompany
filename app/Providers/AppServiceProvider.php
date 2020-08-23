<?php

namespace App\Providers;

use App\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
          // Using Closure based composers...
        View::composer('*', function ($view) {
            $view->with('cart_count', \Cart::count());
        });
        View::composer('*', function ($view) {
            $view->with('pages', \App\Page::getAll());
        });
    }
}
