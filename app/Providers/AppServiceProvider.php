<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\UserApiController;
use App\Country;
use App\Curriculum;
use App\Channel;
use View;

use Auth;
use App\NotificationTreck;


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
         $curriculum=Country::join('curricula', 'countries.id', '=', 'curricula.country_id')->where('countries.country_name', 'Uganda')->get();
         View::share('curriculum_auto', $curriculum);


          $country_with_ip="Uganda";
          View::share('country_ip', $country_with_ip);
          $country_with_ip="Uganda";
          View::share('country_with_ip', $country_with_ip);

          $automatic_country_select="Uganda";
          $picture=Country::where('country_name', $automatic_country_select)->first();
          View::share('automatic_country_select', $automatic_country_select);
          View::share('picture', $picture);


          View::share('number', 0);
          view::share('notifications', []);


          //Teacher Nav
           view()->composer('*', function ($view) 
        {
           if (Auth::check()) {
             $nav=Channel::where('user_id', Auth::user()->id)->get();
        //...with this variable
              $view->with('nav_bar', $nav );  
              $view->with('user', Auth::user()->id); 
           }
            
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
