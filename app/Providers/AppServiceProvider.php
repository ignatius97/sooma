<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\UserApiController;


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
        //

       $ip = '197.157.34.169';

        $data = \Location::get($ip);

       $country= strtolower($data->countryName);

     
        view()->share('country',  $country);
      


        
         


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
