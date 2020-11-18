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
                font-size: 0.9vw;
                margin: 0 10px;
                color: black;
                background-color: white;
            }
            .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    padding-right: 0px;
    padding-left: 0px;
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

    #custom-search-input{
        width: 92.4%; margin-top: -4px; margin-left: 26px; float: left;
    }


#custom-search-input button{
        background-color: #36B3BC; padding: 1px 12px; margin-top: -1px; left: -38px; border-radius: 50px; color: #fff; height: 20px; z-index: 9;font-size: 10px;
    }

@media (min-width: 1680px) and (max-width: 1919px) {
    #custom-search-input button{
        background-color: #36B3BC; padding: 1px 12px; margin-top: -4px; left: -38px; border-radius: 50px; color: #fff; height: 30px; z-index: 9;font-size: 10px;
    }
    #custom-search-input{
        width: 89%; margin-top: -4px; margin-left: 54px; float: left;
    }
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

         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">

            <!-- <a href="#" class="hidden-xs"><img src="{{asset('images/menu.png')}}"  class="toggle-icon"  style="color: white"></a> -->
            <a href="{{route('user.dashboard')}}"> 
                <i class="fa fa-home" style="font-size: 30px; color:#EFBA1E; vertical-align: middle;"></i>
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

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 hidden-xs visible-sm visible-md visible-lg"> 
        <div class="row"> 
        <div id="custom-search-input"  class="">
                    <form method="post" action="{{route('search-all')}}" id="userSearch">
                        <div class="input-group search-input">
                            
                                <input type="text" id="auto_complete_search" name="key" class="search-query form-control" required placeholder="What are you interested in learning?" style="background-color: white; border-radius: 50px !important;font-size: 10px;" />
                                <div class="input-group-btn">
                                    <button class="btn btn-primary find" type="submit" style="">
                                    Find Lessons
                                    </button>
                                </div>
                            
                        </div>
                    </form>
            </div><!--custom-search-input end-->
            </div>

            <div class="row">  
            <div class="col hidden-xs visible-sm visible-md visible-lg" style="margin-top: 5px;" >
                
                <div style=" text-align: center; width: 100%; margin-left: 0px;">
                    <button id="slideBack" style="font-weight: bold; padding: 0; width: 20px; height: 20px; top: -4px; position: relative; border-radius: 50% !important;" type="button"> <span style="top: -2px;position: relative;" title="Previous"><</span> </button>
                    <div id="container">
                        <div id="content" >
                             <a href=""> <button class="btn1"  >All</button></a>
                            <a href=""><button class="btn1"  >Mathematics</button></a>
                            <a href=""><button class="btn1" >Science</button></a>
                            <a href=""><button class="btn1" >English</button></a>
                            <a href=""> <button class="btn1" >History</button></a>
                            <a href=""><button class="btn1" >Agriculture</button></a>
                            <a href=""><button class="btn1" >Literature</button></a>
                            <a href=""><button class="btn1" >Biology</button> </a>
                        </div>
                    </div>
                    <button id="slide"style="font-weight: bold; padding: 0; width: 20px; height: 20px; top: -4px; position: relative; border-radius: 50% !important;"  type="button"> <span style="top: -2px;position: relative;" title="Next">></span> </button>  
                </div> 
            </div>
        </div>
            </div>

        

        <!-- ========RESPONSIVE  HEADER VISIBLE IN MOBAILE VIEW====== -->
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs visible-sm visible-md visible-lg">  
        
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
                <select name="" id="" style="margin-left:10px;font-size:11px;">
                    <option value="">English</option>
                    <option value="">French</option>
                    <option value="">Swahili</option>
                </select>

                @if(Setting::get('is_direct_upload_button') == YES)
                    <a href="{{userChannelId()}}" class="btn pull-right user-upload-btn" title="{{tr('upload_video')}}">
                        {{tr('upload')}} 
                        <i class="fa fa-upload fa-1x"></i>
                    </a>
                @endif

            @else
                <div class="y-button2 main_nav_btn" style="margin-top: 1vh;">
                    <a href="{{route('user.register.form')}}" style="margin-right:10px;"> <i class="fa fa-sign-in" style="font-size: 28px;vertical-align: middle;"></i> <span style="font-size:11px;">SignUp</span></a>
                    <a href="{{route('user.login.form')}}" style="margin-right:10px;"> <img src="{{asset('prototype_icons/SignUp.png')}}" style="color: white;margin-top: 3px;height: 24px; "> <span style="font-size:11px;">SignIn</span></a>
                    <select name="" id="" style="margin-left:10px;font-size:11px;">
                        <option value="">English</option>
                        <option value="">French</option>
                        <option value="">Swahili</option>
                    </select>
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