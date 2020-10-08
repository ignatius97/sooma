<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Category;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Helpers\Helper;

use Setting;

use Log;

use Auth;

use App\Repositories\UserRepository as UserRepo;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $UserAPI;
    protected $redirectTo = '/';

    protected $redirectAfterLogout = '/';

    /**
     * The Login form view that should be used.
     *
     * @var string
     */

   
    /**
     * The Login form view that should be used.
     *
     * @var string
     */

    protected $loginView = 'user.auth.login';

    /**
     * The Register form view that should be used.
     *
     * @var string
     */

    protected $registerView = 'user.auth.register';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'mobile'=>'required',
           
            'referral' => 'exists:user_referrers,referral_code,status,'.DEFAULT_TRUE
        ]);
    }


    protected function create(array $data)
    {        

        $user_details = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['phone'].$data['mobile'],
            'password' => \Hash::make($data['password']),
            'timezone' => $data['timezone'],
            'picture' => asset('placeholder.png'),
            'chat_picture'=>asset('placeholder.png'),
            'login_by' => 'manual',
            'device_type' => 'web',
            
        ]);

        // Check the default subscription and save the user type 

        user_type_check($user_details->id);

        register_mobile('web');

        if(!Setting::get('email_verify_control')) {

            $user_details->is_verified = 1;

            $user_details->save();
        }
        
        // Send welcome email to the new user:
        $subject = tr('user_welcome_title' , Setting::get('site_name'));
        $email_data = $user_details;
        $page = "emails.welcome";
        $email = $data['email'];
        $result = Helper::send_email($page,$subject,$email,$email_data);

        return $user_details;
    }

    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
            );
        }

       

        $user = $this->create($request->all());
      
        if($request->referral) {

            UserRepo::referral_register($request->referral, $user);
        }
        
        if(Setting::get('email_verify_control')) {

            return redirect($this->redirectPath())->with('flash_error', tr('email_verify_alert'));

        } else {
            //dd($validator->fails());
            \Auth::loginUsingId($user->id);

            return redirect($this->redirectPath())->with('flash_success', tr('registration_success'));
        }
    }

    protected function authenticated(Request $request, User $user) {

        if(\Auth::check()) {

            if($user = User::find(\Auth::user()->id)) {

                // Check Admin Enabled the email verification

                if(Setting::get('email_verify_control')) {


                    if(!$user->is_verified) {

                        \Auth::logout();

                        // Check the verification code expiry

                        Helper::check_email_verification("" , $user, $error);

                        return redirect(route('user.login.form'))->with('flash_error', tr('email_verify_alert'));

                    }

                }

                $user->token_expiry = Helper::generate_token_expiry();

                $user->login_by = 'manual';
                $user->timezone = $request->has('timezone') ? $request->timezone : '';
                $user->save();
            }   
        };
       return redirect('/');
    }

}