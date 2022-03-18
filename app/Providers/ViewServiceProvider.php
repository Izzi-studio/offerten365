<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\CustomPagesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', CategoryComposer::class);
        View::composer('*', CustomPagesComposer::class);
    }
}
