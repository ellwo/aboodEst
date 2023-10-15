<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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
        //


        $cities=Cache::remember('cities',3600*60*60,function(){
            return City::all();
        });

        view()->share('cities',$cities);
    }
}
