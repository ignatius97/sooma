<style>
                #container {
             overflow: scroll; 
             width: 80%;
             display: inline-block;
        }
        #content {
             width: 300px;
            white-space: nowrap;
        }
        #container::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        #container {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
        }

        .btn1{
                border-radius: 50px;
                font-size: 1vw;
                margin: 0 10px;
            }
</style>
@if (!Auth::check()) 

<style type="text/css">


.mobile-header li {

    width: 19% !important;

}
.nav>li>a {  
    display: inline;
    padding: 0px 0px;
}

.nav>li>a:focus, .nav>li>a:hover {
    background-color: #fff;
}
.product_name {
    vertical-align: middle;
}



          
</style>


@endif



<div class="header-search" id="search-section">
    <form method="post" action="{{route('search-all')}}" id="userSearch_min">
        <div class="form-group no-margin pull-left width-95">
            <input type="text" id="auto_complete_search_min" name="key" class="auto_complete_search search-query form-control" required placeholder="Search">
        </div>
    </form>

    <a href="#" id="close-btn"><i class="fa fa-close"></i></a>   

    <div class="clear-both"></div>
</div>

<div class="streamtube-nav trial_class" id="header-section" style="background-color: #132234;">
    <!-- <div class="row" style=" text-align: center;">
        <small >
            <strong>Helpline:</strong> +256 772 888 444  or help
            <a href="mailto:#">@sooma.org</a> or Chat
        </small>
    </div> -->
    <div class="row">

         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">

            <!-- <a href="#" class="hidden-xs"><img src="{{asset('images/menu.png')}}"  class="toggle-icon"  style="color: white"></a> -->
            <a href="{{route('user.dashboard')}}"> 
                <i class="fa fa-home" style="font-size: 30px; vertical-align: middle;"></i>
            </a>

            <style>
                hr {
                    margin-top: -3px;
                    margin-bottom: -8px;
                }
            </style>

            <a href="{{route('user.dashboard')}}"> 
                @if(Setting::get('site_logo'))

                    <img src="{{Setting::get('site_logo')}}" class="logo-img"> <div style="display: inline-flex;"><span class="product_name">SOOMA <br><hr> <span style="font-size:8px">Study Anywhere Anytime</span> </span></div>
                @else
                    <img src="{{asset('logo.png')}}" class="logo-img"><div style="display: inline-flex;"><span class="product_name">SOOMA <br><hr> <span style="font-size:8px">Study Anywhere Anytime</span> </span></div>
                @endif


            </a>



        </div>

        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 hidden-xs visible-sm visible-md visible-lg"> 
        <div class="row"> 
        <div id="custom-search-input" style="width: 90%; margin-top: -4px; margin-left: 45px; float: left;" class="">
                    <form method="post" action="{{route('search-all')}}" id="userSearch">
                        <div class="input-group search-input">
                            
                                <input type="text" id="auto_complete_search" name="key" class="search-query form-control" required placeholder="{{tr('search')}}" style="background-color: white; border-radius: 50px !important;" />
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" style="background-color: #36B3BC; padding: 2px 12px; margin-top: -1px; left: -38px; border-radius: 50px; color: #fff; height: 35px; z-index: 9;">
                                    Find Lessons
                                    </button>
                                </div>
                            
                        </div>
                    </form>
            </div><!--custom-search-input end-->
            </div>

            <div class="row">  
            <div class="col hidden-xs visible-sm visible-md visible-lg" style="margin-top: 5px;" >
                
                <div style=" text-align: center; width: 100%; margin-left: 6px;">
                    <button id="slideBack" style="font-weight: bold; padding: 0; width: 20px; height: 20px; top: -4px; position: relative; border-radius: 50% !important;" type="button"> < </button>
                    <div id="container">
                        <div id="content">
                            <button class="btn1"  >All</button>
                            <button class="btn1"  >Mathematics</button>
                            <button class="btn1" >Science</button>
                            <button class="btn1" >English</button>
                            <button class="btn1" >History</button>
                            <button class="btn1" >Agriculture</button>
                            <button class="btn1" >Literature</button>
                            <button class="btn1" >Biology</button> 
                        </div>
                    </div>
                    <button id="slide"style="font-weight: bold; padding: 0; width: 20px; height: 20px; top: -4px; position: relative; border-radius: 50% !important;"  type="button"> > </button>  
                </div> 
            </div>
        </div>
            </div>

        

        <!-- ========RESPONSIVE  HEADER VISIBLE IN MOBAILE VIEW====== -->
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 hidden-xs visible-sm visible-md visible-lg">  
        
        <div class="row"> 
        
            @if(Auth::check())
                <div class="y-button profile-button">
                   <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img class="profile-image" src="{{Auth::user()->picture ?: asset('placeholder.png')}}">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a href="{{route('user.profile')}}">
                                <div class="display-inline">
                                    <div class="menu-profile-left">
                                        <img src="{{Auth::user()->picture ?: asset('placeholder.png')}}">
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
                                    <a href="/settings" class="menu-link">
                                        <i class="fa fa-cog"></i>
                                        {{tr('settings')}}
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="{{route('user.logout')}}"  class="menu-link">
                                        <i class="fa fa-sign-out"></i>
                                        {{tr('logout')}}
                                    </a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <ul class="nav navbar-nav pull-right">
                    <li  class="dropdown">
                        <a class="nav-link text-light notification-link" style="padding-right: 7px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="return notificationsStatusUpdate();">
                            <i class="fa fa-bell"></i><span id="global-notifications-student"></span>
                        </a>
                        <ul class="dropdown-menu-notification dropdown-menu">
                            <li class="notification-head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>
                                            {{tr('notifications')}} 
                                            
                                            (<span id="global-notifications-count">0</span>)
                                        </span>
                                        <!-- <a href="" class="float-right text-light">Mark all as read</a> -->
                                    </div>
                                </div>
                            </li>
                            <span id="global-notifications-box"></span>
                            <li class="notification-footer bg-dark text-center">
                                <a href="{{route('user.bell_notifications.index')}}" class="text-light">
                                    {{tr('view_all')}}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li  class="dropdown">
                        <a class="nav-link text-light notification-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="return notificationsStatusUpdate();">
                        <i class="fa fa-envelope" aria-hidden="true"></i> <span id="global-message_count_main">0</span>

                        </a>

                        <ul class="dropdown-menu-notification dropdown-menu">


                            <span id="global-notifications-message-box"></span>

                            <li class="notification-footer bg-dark text-center">
                                <a href="" class="text-light">
                                    {{tr('view_all')}}
                                </a>
                            </li>
                        
                        </ul>

                    </li>
                </ul>
                 
                 @if(Auth::user()->study_role==0)
                  <a class="nav navbar-nav pull-right" href="{{route('user.upload.information')}}"  style="color: white; padding-top: 2%;">Become A Teacher<span> <img style="width: 20px;" src="{{asset('prototype_icons/teacher-icon-png-15(3).png')}}" alt="" srcset=""> </span></a>
                @else
                   <a class="nav navbar-nav pull-right" href="{{url('mychannels/list')}}"  style="color: white; padding-top: 2%;"><i class="fa fa-retweet fa-1x nav navbar-nav pull-right" style="color: white;"></i>Switch To Teacher</a>
                @endif
                    
                <!-- <select id="options"  class="country_option_select"  name="targeted_country" style="width: auto;"> 
                    <option value="{{$automatic_country_select}}">{{$automatic_country_select}}</option>
                    @foreach($countries as $country)   
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>  -->

                @if(Setting::get('is_direct_upload_button') == YES)
                    <a href="{{userChannelId()}}" class="btn pull-right user-upload-btn" title="{{tr('upload_video')}}">
                        {{tr('upload')}} 
                        <i class="fa fa-upload fa-1x"></i>
                    </a>
                @endif

            @else
                <div class="y-button2 main_nav_btn" style="margin-top: 4vh;">
                    <a href="{{route('user.register.form')}}"> <i class="fa fa-sign-in"></i> SignUp</a>
                    <a href="{{route('user.login.form')}}">  SignIn</a> <i style="color: white; font-weight: bold;">|</i>
                    
                </div>

                <!-- <select id="options"  class="country_option_select"  name="targeted_country" style="width: auto;">
                    <option value="{{$automatic_country_select}}">{{$automatic_country_select}}</option>
                    @foreach($countries as $country)   
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                 </select> -->
              
                @if(Setting::get('is_direct_upload_button') == YES)
                    <a href="{{route('user.login.form')}}" class="btn pull-right" title="{{tr('upload_video')}}"> 
                        {{tr('upload')}} 
                        <i class="fa fa-upload fa-1x"></i>
                    </a>
                @endif
            @endif

            

            <ul class="nav navbar-nav pull-right" style="margin: 3.5px 0px">
                @if(Setting::get('admin_language_control')) 
                    @if(count($languages = getActiveLanguages()) > 1) 
                        <li  class="dropdown">
                            <a href="#" class="dropdown-toggle language-icon" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i> <b class="caret"></b></a>
                            <ul class="dropdown-menu languages">
                                @foreach($languages as $h => $language)
                                    <li class="{{(\Session::get('locale') == $language->folder_name) ? 'active' : ''}}" ><a href="{{route('user_session_language', $language->folder_name)}}" style="{{(\Session::get('locale') == $language->folder_name) ? 'background-color: #cc181e' : ''}}">{{$language->folder_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>

        </div>

        

        </div>

        
        

        <!-- ======== RESPONSIVE HEADER VISIBLE IN MOBAILE VIEW====== -->

        @include('layouts.user.header-mobile')

        <!-- ======== RESPONSIVE HEADER VISIBLE IN MOBAILE VIEW====== -->



    </div><!--end of row-->

    

</div><!--end of streamtube-nav-->

<script>
    var button = document.getElementById('slide');
button.onclick = function () {
    var container = document.getElementById('container');
    sideScroll(container,'right',25,100,10);
};

var back = document.getElementById('slideBack');
back.onclick = function () {
    var container = document.getElementById('container');
    sideScroll(container,'left',25,100,10);
};

function sideScroll(element,direction,speed,distance,step){
    scrollAmount = 0;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}
</script>