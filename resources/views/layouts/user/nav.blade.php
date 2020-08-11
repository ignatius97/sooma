<div class="y-menu col-sm-2 col-md-2 scroll final_static" >
    <div class="side_bar_style">
        <ul class="y-home menu1">

        <li><h3 class="popular_title" style="color: black; font-weight: bold; font-style: italic; font-size: 17px"> Popular classes</h3></li>


        @if(count($trendings->items) > 0)

        <div>
        @foreach($trendings->items as $video)
        <li id="hom" >
            <a href="{{$video->url}}" > <img id="img" src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$video->video_image}}" class="slide-img1 placeholder" /> <h6 style="display: inline-grid; vertical-align: bottom;" > {{$video->title}} <br/> <span class="view_to_end"> <i class="fa fa-eye"></i> {{$video->watch_count}} {{tr('views')}}</span></h6></a>
        </li>

        @endforeach
        </div>
        @else

            <li> {{tr('no_trending_videos')}} </li>
        @endif



        </ul>
    </div>
              



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
                    <a href="{{route('user.channel.mychannel')}}">
                        <img src="{{asset('images/sidebar/channel-grey.png')}}" class="grey-img">
                        <img src="{{asset('images/sidebar/channel-red.png')}}" class="red-img">
                        <span>{{tr('my_channels')}}</span>
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
        <div class="sign_up_slogan">
        <div class="menu4 top nav-space my_bg_color">
            <h3 class="sooma_header" >Join the <span class="sooma_color">sooma</span> community</h3>
            <p>Teach and learn from anywhere at any time</p>
            <form method="get" action="{{route('user.register.form')}}">
                <button type="submit" class="sign_up_btn" style="background-color: brown;">sign up</button>
            </form>
        </div> 
        </div>  
    @endif             
</div>