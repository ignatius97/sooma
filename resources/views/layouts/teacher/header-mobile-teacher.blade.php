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
  font-size: 25px;
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
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 visible-xs hidden-sm hidden-md hidden-lg">
            
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
    <span class="search-cls pull-right" id="search-btn"><i class="fa fa-globe" aria-hidden="true"></i><span class="caret"></span></span>

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
        <li>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
            
       </li>
        
        <li style="float: right;">
            <span class="search-cls pull-right" id="search-btn"><i class="fa fa-search "></i></span>
        </li>
        <li style="float: right;margin-top: 6px;" >
            <i class="fa fa-bell"></i>
        </li >
        
        <li style="float: right;margin-top: 7px;"><a href="{{url('/')}}" class="mobile-menu">
            <img style="width: 2rem;" src="{{asset('prototype_icons/teacher-icon-png-15.png')}}" alt="" srcset="">
        </a>
        </li>
        
        

           
        @endif

    </ul>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="curriculum">
        <h3 class="popular_title" style="color: black; font-weight: bold; text-align: center; font-style: italic; font-size: 17px">My Classes </h3>


</div>
     

            @if(count($response->channels) > 0)

<ul class="history-list ">

    @foreach($response->channels as $i => $channel)


    <li class="sub-list row sidebarItems" >
    <a href="{{route('user.channel',$channel->channel_id)}}">
        <div class="main-history" style="padding: 15px 10px;" >
             <div class="history-image-mobile" style="height:50px; width: 50px;" >
                
                    <!-- <img src="{{$channel->picture}}"> -->
                    <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$channel->picture}}" class="slide-img1 placeholder" />
                
                                        
            </div><!--history-image-->

            <div class="history-title-mobile" style="width: calc(60% + 4em);">
                <div class="history-head row">
                    <div class="cross-title">
                        <h5 class="payment_class mb-3" style="padding: 0px;">{{$channel->title}}</h5>
                        
                        <span class="video_views">
                             <i class="fa fa-eye"></i> {{$channel->no_of_subscribers}} Enroled <b>.</b> 
                            {{ common_date($channel->created_at) }}
                        </span>
                    </div> 
                
                    <!--end of cross-mark-->                       
                </div> <!--end of history-head--> 

                <div class="description hidden-xs">
                </div><!--end of description--> 

                                                                     
            </div><!--end of history-title--> 
            
        </div><!--end of main-history-->

        <div class="clearfix"></div>
    
    
        </a>
        </li>    

    @endforeach
   
</ul>


@endif
</div>

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "330px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
</script>