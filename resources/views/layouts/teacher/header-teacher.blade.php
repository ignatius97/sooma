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

<div class="streamtube-nav trial_class" id="header-section" style="background-color: #3AAF44;">
    <!-- <div class="row" style=" text-align: center;">
        <small >
            <strong>Helpline:</strong> +256 772 888 444  or help
            <a href="mailto:#">@sooma.org</a> or Chat
             style="background-color: #3AAF44;"
        </small>
    </div> -->
    <div class="row">

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">

            <a href="#" class="hidden-xs"><img src="{{asset('images/menu.png')}}"  class="toggle-icon"  style="color: white"></a>

            <a href="/mychannels/list"> 
                @if(Setting::get('site_logo'))
                    <img src="{{Setting::get('site_logo')}}" class="logo-img"> <span class="product_name">SOOMA</span>
                @else
                    <img src="{{asset('logo.png')}}" class="logo-img"><span class="product_name">SOOMA</span>
                @endif


            </a>



        </div>

    

        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 hidden-xs">

          

            <div id="custom-search-input" class="">

                
            @if(!Auth::check())

<!--            
    <div class="y-button">
        <a href="{{route('user.login.form')}}" ><i class='fas fa-stream' style='font-size:24px'></i>Live</a>
        &nbsp&nbsp&nbsp
        <a href="{{route('user.login.form')}}" ><i class="fa fa-upload fa-1x"></i>Upload</a>
        &nbsp&nbsp&nbsp
        
    </div>
-->
    

@endif
                <form method="post" action="{{route('search-all')}}" id="userSearch">
                <div class="input-group search-input">
                    
                        <input type="text" id="auto_complete_search" name="key" class="search-query form-control" required placeholder="{{tr('search')}}" style="background-color: white;" />
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="submit">
                            <i class=" glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    
                </div>
                </form>
            </div><!--custom-search-input end-->

        </div>

        <!-- ========RESPONSIVE  HEADER VISIBLE IN MOBAILE VIEW====== -->
        
        <div class="col-lg-3 col-md-2 col-sm-3 col-xs-12 hidden-xs visible-sm visible-md visible-lg">

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
                                    <a href="/teacher-settings" class="menu-link">
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
                        <a class="nav-link text-light notification-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="return notificationsStatusUpdate();">
                            <i class="fa fa-bell"></i><span id="global-notifications-teacher"></span>
                        </a>

                        <ul class="dropdown-menu-notification dropdown-menu">

                            <li class="notification-head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>
                                            {{tr('notifications')}} 
                                            (<span id="global-notifications-counts">0</span>)
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
                 
                </ul>
                 

                   <a class="nav navbar-nav pull-right" href="{{url('/')}}"  style="color: white; padding-top: 2%;"><i class="fa fa-retweet fa-1x nav navbar-nav pull-right" style="color: white;"></i>Switch to Student</a>
                   
                   
              


                @if(Setting::get('is_direct_upload_button') == YES)

                <a href="{{userChannelId()}}" class="btn pull-right user-upload-btn" title="{{tr('upload_video')}}">
                     {{tr('upload')}} 
                    <i class="fa fa-upload fa-1x"></i>
                </a>
                  

                @endif

            @else
                <div class="y-button2 main_nav_btn">

                  <a href="{{route('user.login.form')}}">LogIn</a> <i style="color: white; font-weight: bold;">|</i>
                    <a href="{{route('user.register.form')}}">SignUp</a>
                </div>

                

                 
               
              
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

        <!-- ======== RESPONSIVE HEADER VISIBLE IN MOBAILE VIEW====== -->

        @include('layouts.teacher.header-mobile-teacher')

        <!-- ======== RESPONSIVE HEADER VISIBLE IN MOBAILE VIEW====== -->

    </div><!--end of row-->

</div><!--end of streamtube-nav-->