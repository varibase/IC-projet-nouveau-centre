<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('partials.offers-list', function($view){
           if(Auth::check())
           {
               $location = Auth::user()->location;
           }
           else
           {
               $location = Location::where('shortname', session('location'))->first();
           }
           $offers = $location->group->offers()->get();
           View::share('offers', $offers);
        });

        View()->composer('registration.create', function($view){
            if(Auth::check())
            {
                $location = Auth::user()->location;
            }
            else
            {
                $location = Location::where('shortname', session('location'))->first();
            }
           $companies = Company::where('active', true)->where('location_id', $location->location_id)->get();
            View::share('companies', $companies);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
