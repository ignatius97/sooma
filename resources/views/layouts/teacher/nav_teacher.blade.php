<style>
    .sidebarItems:hover{
        background-color: #e1e1e1;
    }
</style>
<div class="y-menu col-sm-3 col-md-3" >
    <div class="curriculum">
        <h3 class="popular_title" style="color: black; font-weight: bold; text-align: center; font-style: italic; font-size: 17px">My Classes </h3>



     

            @if(count($response->channels) > 0)

<ul class="history-list ">

    @foreach($response->channels as $i => $channel)


    <li class="sub-list row sidebarItems" >
    <a href="{{route('user.channel',$channel->channel_id)}}">
        <div class="main-history" style="padding: 15px 10px;" >
             <div class="history-image" style="height:50px; width: 50px;" >
                
                    <!-- <img src="{{$channel->picture}}"> -->
                    <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$channel->picture}}" class="slide-img1 placeholder" />
                
                                        
            </div><!--history-image-->

            <div class="history-title" style="width: calc(60% + 4em);">
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

    @endif    

             
</div>
</div>