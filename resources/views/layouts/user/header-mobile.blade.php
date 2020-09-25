<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  background-color: #e8e8e8;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-8 visible-xs hidden-sm hidden-md hidden-lg">
            
    @if(Auth::check())
        
        <div class="y-button profile-button" style="position: unset;">
           
           <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: transparent;">

                    @if(Auth::user()->picture != "")
                        <img class="profile-image" src="{{Auth::user()->picture}}">
                    @else
                        <img class="profile-image" src="{{asset('placeholder.png')}}">
                    @endif

                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a href="{{route('user.profile')}}">
                        <div class="display-inline">
                            <div class="menu-profile-left">
                                <img src="{{Auth::user()->picture}}">
                            </div>
                            <div class="menu-profile-right">
                                <h4>{{Auth::user()->name}}</h4>
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </a>
                    <li role="separator" class="divider"></li>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/settings" class="menu-link"><i class="fa fa-cog"></i>{{tr('settings')}}</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{route('user.logout')}}" class="menu-link"><i class="fa fa-sign-out"></i>{{tr('logout')}}</a>
                        </div>
                    </div>
                
                </ul>

                
            
            </div>

        </div><!--y-button end-->

        <!-- Version 3.1 feature -->

        @if(Setting::get('is_direct_upload_button') == YES)

            <a href="{{userChannelId()}}" class="btn pull-right" style="margin-right: 10px;color: red;background:white;box-shadow: none;" title="{{tr('upload_video')}}">
                <i class="fa fa-upload fa-1x"></i>
            </a>

        @endif

    @endif

    <section id="language-section">

    <ul class="nav navbar-nav pull-right" style="margin: 3.5px 0px">

        @if(Setting::get('admin_language_control'))

            @if(count($languages = getActiveLanguages()) > 1) 
               
                <li  class="dropdown">
            
                    <a href="#" class="dropdown-toggle language-icon" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i> <b class="caret"></b></a>

                    <ul class="dropdown-menu languages1">

                        @foreach($languages as $h => $language)

                            <li class="{{(\Session::get('locale') == $language->folder_name) ? 'active' : ''}}" ><a href="{{route('user_session_language', $language->folder_name)}}" style="{{(\Session::get('locale') == $language->folder_name) ? 'background-color: #cc181e' : ''}}">{{$language->folder_name}}</a></li>
                        @endforeach
                        
                    </ul>
                 
                </li>
        
            @endif

        @endif

    </ul>

    </section>

    @if(!Auth::check())
            
        <div class="y-button pull-right" style="position: unset;">
            <a href="{{route('user.login.form')}}" class="y-signin" style="margin-left: 0px;" title="{tr('login')}}"><img style="width: 2rem;" src="{{asset('login.png')}}" alt="" srcset=""></a>
            <a href="{{route('user.register.form')}}" class="y-signin" style="margin-left: 0px;" title="{tr('login')}}"><i class="fa fa-sign-in"></i></a>
        </div><!--y-button end-->
        <div style="float: unset;margin-top: 1rem; ">
        
        <span class="search-cls pull-right" id="search-btn"><i class="fa fa-search "></i></span>
        <span class="search-cls pull-right" style="cursor:pointer" onclick="openNav()">&#9776;</span>    
    
    
    </div>
        @if(Setting::get('is_direct_upload_button') == YES)
            
            <a href="{{route('user.login.form')}}" class="btn pull-right" style="margin-right: 10px;color: red;background:white;box-shadow: none;" title="{{tr('upload_video')}}">
                <i class="fa fa-upload fa-1x"></i>
            </a>

        @endif

    @endif
    
    
    
    <div class="clearfix"></div>

</div>

<div class="col-xs-12 visible-xs">
    <ul class="mobile-header">
    @if(Auth::check())
        <li style="vertical-align: top;">
        <span style="font-size:30px;cursor:pointer;vertical-align: top;" onclick="openNav()">&#9776; </span>
            
       </li>
        
        <li>
            <span class="search-cls pull-right" id="search-btn"><i class="fa fa-search "></i></span>
        </li>
        <li>
            <i class="fa fa-bell"></i>
        </li>
        <li><a href="{{url('/')}}" class="mobile-menu">
            <img style="width: 2rem;" src="{{asset('prototype_icons/assignment.png')}}" alt="" srcset="">
        </a></li>
        <li><a href="{{route('user.channel.list')}}" class="mobile-menu">
            <img style="width: 2rem;" src="{{asset('prototype_icons/teacher-icon-png-15.png')}}" alt="" srcset="">
        </a></li>
        <li>
            <span class="search-cls pull-right" id="search-btn"><i class="fa fa-globe" aria-hidden="true"></i><span class="caret"></span></span>
        </li>
        

           
        @endif

    </ul>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @if(!Auth::check())
  <div style="text-align:center;">

                  <a href="{{route('user.login.form')}}" style="display: inline-block; padding:0;">SignIn</a> <i style="color: white; font-weight: bold;">|</i>
                    <a href="{{route('user.register.form')}}" style="display: inline-block; padding:0;">SignUp</a>
                </div>
  @endif
    <div class="curriculum">
        <form action="/" method="get" style="margin-top: 1vh; text-align: center;">
            <select id="options" name="targeted_country" style="width: auto;">
                @if($country_with_ip=='')
                 <option value="{{$country_ip}}">{{$country_ip}}</option>
                @else
                 <option value="{{$country_with_ip}}">{{$country_with_ip}}</option>
                @endif

                @foreach($countries as $country)   
                    <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                @endforeach
               
            </select> 
        </form>

        <ul class="y-home menu1">
            <li>
                @foreach($countries as $country)
                @if($country_with_ip=='') 
                @if($country->country_name==$country_ip)
                <h3 class="popular_title" style="color: black; margin-left: 20px; font-weight: bold;  font-style: italic; font-size: 16px"> <span style="text-align: center;"> <img   class="slide-img1 placeholder" id="img" src="{{$country->picture}}"  /> </span>Curriculum Based Learning 
                </h3>
                @endif
                @else

                @if($country->country_name==$country_with_ip)
                    <h3 class="popular_title" style="color: black; margin-left: 20px; font-weight: bold;  font-style: italic; font-size: 16px"> <span> <img   class="slide-img1 placeholder" id="img" src="{{$country->picture}}"  /> </span> Curriculum Based Learning
                </h3>
                @endif
                @endif
                @endforeach
            </li>

            <div>
                @foreach($curriculum as $curriculum) 
                    @if($country_with_ip=='')
                    @if($curriculum->country==$country_ip)
                        <li id="hom" title="{{$curriculum->name}}" style="margin-left: 20px;">
                            <a  href="{{ route('user.curriculum.selection' , ['curriculum_id' => $curriculum->id, 'country'=>$country_ip] ) }}" > <img   class="slide-img1 placeholder" id="img" src="{{$curriculum->picture}}"  /> <h6 style="display: inline-grid; vertical-align: bottom; color: black; font-size: 15px;" >{{$curriculum->name}}</h6></a>
                        </li>
                        @endif

                    @else


                    @if($curriculum->country==$country_with_ip)
                    <li id="hom" title="{{$curriculum->name}}" style="margin-left: 20px;">
                        <a  href="{{ route('user.curriculum.selection' , ['curriculum_id' => $curriculum->id, 'country'=>$country_with_ip] ) }}" > <img   class="slide-img1 placeholder" id="img" src="{{$curriculum->picture}}"  /> <h6 style="display: inline-grid; vertical-align: bottom; color: black; font-size: 15px;" >{{$curriculum->name}}</h6></a>
                    </li>
                    @endif

                    @endif
                
                @endforeach
            
            </div>
        
        </ul>

    <div>
        <ul class="y-home menu1">
            @if(Auth::check())
                <li id="history">
                    <a href="{{route('user.history')}}">
                        <img src="{{asset('images/sidebar/history-grey.png')}}" class="grey-img">
                        <img src="{{asset('images/sidebar/history-red.png')}}" class="red-img">
                        <span>{{tr('history')}}</span>
                    </a>
                </li>
                <li id="settings">
                    <a href="/settings">
                        <img src="{{asset('images/sidebar/settings-grey.png')}}" class="grey-img">
                        <img src="{{asset('images/sidebar/settings-red.png')}}" class="red-img">
                        <span>{{tr('settings')}}</span>
                    </a>
                </li>
                <li id="wishlist">
                    <a href="{{route('user.wishlist')}}">
                        <img src="{{asset('images/sidebar/heart-grey.png')}}" class="grey-img">
                        <img src="{{asset('images/sidebar/heart-red.png')}}" class="red-img">
                        <span>{{tr('wishlist')}}</span>
                    </a>
                </li>
                @if(Setting::get('create_channel_by_user') == CREATE_CHANNEL_BY_USER_ENABLED || Auth::user()->is_master_user == 1)
                    <li id="my_channel">
                        <a href="{{route('user.channel.mychannels')}}">
                            <img src="{{asset('images/sidebar/channel-grey.png')}}" class="grey-img">
                            <img src="{{asset('images/sidebar/channel-red.png')}}" class="red-img">
                            <span>My Class</span>
                        </a>
                    </li>

                @endif

                <li id="playlists">
                    <a href="{{route('user.playlists.index')}}">
                        <img src="{{asset('images/sidebar/playlist-grey.png')}}" class="grey-img">
                        <img src="{{asset('images/sidebar/playlist-red.png')}}" class="red-img">
                        <span>{{tr('class_playlists')}}</span>
                    </a>
                </li>

            @endif  
        </ul>
    </div>
    
    <!-- ============PLAY STORE, APP STORE AND SHARE LINKS======= -->

    @if(Setting::get('appstore') || Setting::get('playstore'))

        <ul class="menu-foot" style="margin-top: 10px;">

            <h3>{{tr('download_our_app')}}</h3>

            @if(Setting::get('playstore'))

            <li>
                <a href="{{Setting::get('playstore')}}" target="_blank">
                    <img src="{{asset('images/google-play.png')}}">
                </a>
            </li>

            @endif

            @if(Setting::get('appstore'))

            <li>
                <a href="{{Setting::get('appstore')}}" target="_blank">
                    <img src="{{asset('images/app_store.png')}}" >
                </a>
            </li>

            @endif

        </ul>

    @endif

    @if(Setting::get('facebook_link') || Setting::get('twitter_link') || Setting::get('linkedin_link') || Setting::get('pinterest_link') || Setting::get('google_link'))

    <h3 class="menu-foot-head">{{tr('contact')}}</h3>

    <div class="nav-space">

        @if(Setting::get('facebook_link'))

        <a href="{{Setting::get('facebook_link')}}" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x social-fb"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse foot-share2"></i>
            </span>
        </a>

        @endif

        @if(Setting::get('twitter_link'))

        <a href="{{Setting::get('twitter_link')}}" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x social-twitter"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse foot-share2"></i>
            </span>
        </a>

        @endif

        @if(Setting::get('linkedin_link'))

        <a href="{{Setting::get('linkedin_link')}}" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x social-linkedin"></i>
                <i class="fa fa fa-linkedin fa-stack-1x fa-inverse foot-share2"></i>
            </span>
        </a>

        @endif

        @if(Setting::get('pinterest_link'))

        <a href="{{Setting::get('pinterest_link')}}" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x social-pinterest"></i>
                <i class="fa fa fa-pinterest fa-stack-1x fa-inverse foot-share2"></i>
            </span>
        </a>
        @endif

        @if(Setting::get('google_link'))
        <a href="{{Setting::get('google_link')}}" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x social-google"></i>
                <i class="fa fa fa-google fa-stack-1x fa-inverse foot-share2"></i>
            </span>
        </a>
        @endif

    </div>

    @endif
    
    @if(Auth::check())

        @if(!Auth::user()->user_type)

            <div class="menu4 top nav-space">
                <p>{{tr('subscribe_note')}}</p>
                <a href="{{route('user.subscriptions')}}" class="btn btn-sm btn-primary">{{tr('subscribe')}}</a>
            </div> 


        @endif

    @else
        <div class="about_us">
        <div class="menu4 top nav-space my_bg_color" >

            <form method="get" action="{{route('user.register.form')}}">
                <button type="submit" class="sign_up_btn" style="background-color: brown;">About us</button>
            </form>
            <h3 class="sooma_header">For more information about <span class="sooma_color">sooma</span> Please click the button below</h3>
            
            
        </div> 
        </div>  
    @endif             
</div>
</div>

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "330px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
</script>