@extends('layouts.user.focused')

@section('styles')

<link rel="stylesheet" href="{{asset('admin-css/plugins/datepicker/datepicker3.css')}}">
 <link rel="stylesheet" href="intel/build/css/intlTelInput.css">
    <link rel="stylesheet" href="intel/build/css/demo.css">

@endsection

@section('content')

<div class="login-space">
        <div class="common-form login-common">

            @include('notification.notify')
        
            <div class="signup-head text-center">
                <h3>{{tr('signup')}}</h3>
            </div><!--end  of signup-head-->

            @if((config('services.facebook.client_id') && config('services.facebook.client_secret'))
            || (config('services.twitter.client_id') && config('services.twitter.client_secret'))
            || (config('services.google.client_id') && config('services.google.client_secret')))
            
            <div class="social-form">
                
                <div class="social-btn">

                    @if(config('services.facebook.client_id') && config('services.facebook.client_secret'))
                        
                        <div class="social-fb">
                            
                            <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                                
                                <input type="hidden" value="facebook" name="provider" id="provider">

                                <input type="hidden" value="{{ app('request')->input('referral') }}" name="referral" id="referral">

                                <a href="#">
                                    <button type="submit">
                                        <i class="fa fa-facebook"></i> {{tr('signup_fb')}}
                                    </button>
                                </a>
                        
                            </form>
                        
                        </div>
                    
                    @endif

                    @if(config('services.twitter.client_id') && config('services.twitter.client_secret'))

                        <div class="social-twitter">
                          
                            <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                                
                                <input type="hidden" value="twitter" name="provider" id="provider">

                                <input type="hidden" value="{{ app('request')->input('referral') }}" name="referral" id="referral">

                                <a href="#">
                                    <button type="submit">
                                        <i class="fa fa-twitter"></i>{{tr('login_via_twitter')}}
                                    </button>
                                </a>
                            
                            </form>
                        
                        </div>

                    @endif

                    @if(config('services.google.client_id') && config('services.google.client_secret'))

                        <div class="social-google">
                            <form class="social-form form-horizontal" role="form" method="POST" action="{{ route('SocialLogin') }}">
                                <input type="hidden" value="google" name="provider" id="provider">
                                
                                <a href="#">
                                    <button type="submit">
                                        <i class="fa fa-google-plus"></i>{{tr('signup_google')}}
                                    </button>
                                </a>
                            </form>
                        </div>
                        
                    @endif

                </div><!--end of social-btn-->          
            </div><!--end of socila-form-->

            <p class="col-xs-12 divider1">OR</p>

            @endif

            <div class="sign-up">

                <form class="signup-form" role="form" method="POST" action="{{ url('/register') }}">

                    {!! csrf_field() !!}

                    @if($errors->has('email') || $errors->has('name') || $errors->has('password_confirmation') ||$errors->has('password') || $errors->has('age_limit'))
                        <div data-abide-error="" class="alert callout">
                            <p>
                                <i class="fa fa-exclamation-triangle"></i> 
                                <strong> 
                                    @if($errors->has('email')) 
                                        {{ $errors->first('email') }}
                                    @endif

                                    @if($errors->has('name')) 
                                        {{ $errors->first('name') }}
                                    @endif

                                    @if($errors->has('age_limit')) 
                                        {{$errors->first('age_limit')}}
                                    @endif

                                    @if($errors->has('password')) 
                                        {{$errors->first('password')}}
                                    @endif

                                    @if($errors->has('password_confirmation'))
                                        {{ $errors->has('password_confirmation') }}
                                    @endif

                                </strong>
                            </p>
                        </div>
                    @endif

                    <input type="hidden" value="{{ app('request')->input('referral') }}" name="referral" id="referral">

                    @if(app('request')->input('referral'))

                    <p class="text-success">#{{app('request')->input('referral')}} Referral code applied.</p>

                    @endif
                    
                    <div class="form-group">
                        <input type="text" required name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{tr('name')}}" title="{{tr('username_notes')}}" value="{{old('name')}}" style="background-color: white;">
                    </div>
                    <div class="form-group">
                        <input type="email" required name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{tr('email')}}" value="{{old('email')}}" style="background-color: white;"> 
                    </div>

                    <div class="form-group">
                           <input type="hidden" id="phone2" name="phone"/>
                         <input id="phone"  name="mobile" type="tel" style="width: 526px;">
                    </div>

                    <div class="form-group">
                        <input type="password" required name="password" min="6" class="form-control" id="password" placeholder="{{tr('password')}}" value="{{old('password')}}" style="background-color: white;">
                    </div>

                    <div class="form-group">
                        <select id="category_id" name="curriculum" class="form-control select2" required data-placeholder="{{tr('select_category')}}*" style="width: 100% !important">
                            <option value="" hidden disabled>Select Curriculum</option>
                            @foreach($categories as $category)
                                    <option value="{{$category->category_curriculum}}">
                                    {{$category->category_curriculum}} 
                                    ({{$category->category_country}})
                                                    
                                    </option>
                                @endforeach
                        </select>
                        <input type="password" required name="password_confirmation" min="6" class="form-control" id="confirm_password" placeholder="{{tr('confirm_password')}}" value="{{old('confirm_password')}}" style="background-color: white;">
                    
                        </div>

                    <input type="hidden" name="timezone" value="" id="userTimezone">

                    <div class="change-pwd">
                        <button type="submit" class="btn btn-primary signup-submit">{{tr('submit')}}</button>
                    </div> 
                    <p class="text-right">By signing up, you agree to our <a href=""> Terms </a> of Use and <a href="">  Privacy Policy. </a> </p> 
                    <p class="text-right">{{tr('already_account')}} <a href="{{route('user.login.form')}}">{{tr('login')}}</a></p>         
                </form>
            </div><!--end of sign-up-->
        </div><!--end of common-form-->     
    </div><!--form-background end-->

@endsection


@section('scripts')


<script src="{{asset('assets/js/jstz.min.js')}}"></script>

<script src="{{asset('admin-css/plugins/datepicker/bootstrap-datepicker.js')}}"></script> 

<script type="text/javascript">

    $(document).ready(function() {

        var max_age_limit = "{{Setting::get('max_register_age_limit' , 18)}}";

        max_age_limit = max_age_limit ? "-"+max_age_limit+"y" : "-15y";

        $('#dob').datepicker({
            autoclose:true,
            format : 'dd-mm-yyyy',
            endDate: max_age_limit,
        });

        var dMin = new Date().getTimezoneOffset();

        var dtz = -(dMin/60);
        $("#userTimezone").val(jstz.determine().name());
    });

</script>

<script src="intel/build/js/intlTelInput.js"></script>
<script src="intel/build/js/intlTelInput-jquery.min.js"></script>
  <script>



    $(document).ready(function () {
        $("#phone").intlTelInput({
            separateDialCode: true,
            
            
        }).on('countrychange', function (e, countryData) {
            $("#phone2").val(($("#phone").intlTelInput("getSelectedCountryData").dialCode));

        });


    });


  </script>

@endsection