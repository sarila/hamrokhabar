<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin;
use App\Models\Theme;
use App\Models\Setting;
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
        View::composer(['admin.*'], function($view){
            $view->with('theme', Theme::first());
        });
        
        View::composer(['front.*'], function($view){
            $view->with('theme', Theme::first());
        });

        View::composer(['front.*'], function($view){
            $view->with('setting', Setting::first());
        });

        // View::share('global_setting',Setting::first());


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
