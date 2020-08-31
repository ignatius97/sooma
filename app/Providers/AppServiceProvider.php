<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\UserApiController;
use App\Country;
use App\Curriculum;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void

     */

  protected $UserAPI;



    public function boot(Request $request)
    {
        /*

       $ip = '197.157.34.169';

        $data = 'uganda';

       $country= strtolower($data);

     
        view()->share('country',  $country);

        */

        $countries = Country::all();
       View::share('countries', $countries);
         $curriculum=Curriculum::all();
         View::share('curriculum', $curriculum);

        
         


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
