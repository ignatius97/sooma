<div class="y-menu col-sm-3 col-md-3" >
    <div class="curriculum">
        <ul class="y-home menu1">

        <li><h3 class="popular_title" style="color: black; font-weight: bold; text-align: center; font-style: italic; font-size: 17px">My Classes </h3></li>


       
     
        @if(count($nav_bar)>0)

        @foreach($nav_bar as $nav)
    
        <li id="hom" title="">
            <a  href="{{ route('user.channel', ['id'=>$nav->id]) }}" > <img   class="slide-img1 placeholder" id="img" src="{{$nav->picture}}"  /> <h6 style="display: inline-grid; vertical-align: bottom; color: black; font-size: 15px;" >{{$nav->name}}</h6></a>
        </li>


        @endforeach

        @else
        <div style="display: inline-grid; vertical-align: bottom; color: black; font-size: 15px; margin-left: 20px;">
    <h6  >No class Created</h6>
          </div>
        @endif
    
      
      
        </ul>
    
              



    
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
                <p>Create class to start Uploading Videos</p>
                <a href="/channel_create" class="btn btn-sm btn-primary">Create class</a>
            </div> 


        @endif

    @endif    

             
</div>
</div>