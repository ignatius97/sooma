<style>
.content {
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: auto;
  grid-area: content;
  width:100%;
  height: 88vh;
  overflow-y: scroll;
  overflow-x: hidden;
}
.content::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.content {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.nav-space{
    padding: 0; margin-bottom: 15px; border-radius: 50px; width: 107px; height: 40px; margin-left: auto; margin-right: auto;
}
.menu4 button{
    background-color: brown;border-radius: 50px; margin-left: 3px; margin-top: 2px;
}
@media (min-width: 1680px) and (max-width: 1919px) {
.nav-space{
    padding: 0; margin-bottom: 15px; border-radius: 50px; width: 152px; height: 48px; margin-left: auto; margin-right: auto;
}
.menu4 button{
    background-color: brown;border-radius: 50px; margin-left: 14px; margin-top: 2px;
}
}
</style>


<style>
          @media only screen and (min-width : 760px) {
            
            .y-home h3 {
                font-size: 1.3vw;
            }
            .curriculum_name{
                font-size:1.05vw;
            }
            .sooma_heade{
                font-size:1.35vw;
            }
        }
        fieldset 
        {
            border: 1px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;       
            position: relative;
            border-radius:4px;
            background-color:lightgrey;
            padding-left:10px!important;
            margin: 20px;
        }	
        
            legend
            {
                font-size:14px;
                font-weight:bold;
                margin-bottom: 0px; 
                width: 100%;
                border: 1px solid #ddd;
                border-radius: 4px; 
                padding: 0px 0px 0px 10px; 
                background-color: #ffffff;
            }
        </style> 

<div>
<div class="y-menu col-sm-4 col-md-4 hidden-xs visible-sm visible-md visible-lg" style="margin-right: 0px;" >

    <div class="curriculum" style="position: fixed; width: 34%;">

    <div class="content">
        


        <fieldset>    	
            <legend style="text-align: center;"> 
            <select id="options"  class="country_option_select"  name="targeted_country" style="width: auto;">
                    <option value="{{$automatic_country_select}}">{{$automatic_country_select}}</option>
                    @foreach($countries as $country)   
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
            </select>
            @if($picture)
            <h3 class="popular_title hide_title" style="color: black; font-weight: bold; display: inline-flex; padding-left: 12px;  font-size: 16px"> <span style="text-align: center;"> <img   class="slide-img1 placeholder" style="width: 20px; height: 20px; margin: 0 0px 0px 0;" id="img" src="{{$picture->picture}}"  /> </span>Curriculum
            </h3> 
            <h3 class="popular_title show_title" style="color: black; margin-left: 20px; font-weight: bold; display: none;  font-style: italic; font-size: 16px"> 
            </h3>
            @endif
            </legend>
					
			<ul class="y-home menu1">

            <div class="curriculum_hide">
                @if($picture)
                @if(count($curriculum_auto)>0)     
                @foreach($curriculum_auto as $curriculum) 
                
                    <li id="hom" title="{{$curriculum->name}}" style="margin-left: 20px;">
                        <a  href="{{ route('user.curriculum.selection' , ['curriculum_id' => $curriculum->id, 'country'=>$country_ip] ) }}" > <img   class="slide-img1 placeholder" id="img" src="{{$curriculum->picture}}"  /> <h6 style="display: inline-grid; vertical-align: bottom; color: white; border-radius: 50px; padding: 8px; background: linear-gradient(180deg, #586FC0, #555); font-size: 12px;width: 150px;text-align: center;" >{{$curriculum->name}}</h6></a>
                    </li>
                
                @endforeach

                @else

                <h5>No Result Found</h5>

                @endif

                @else

                <h5> No Service for the country </h5>

                @if($picture)
                    <li>
                        
                        <h3 class="popular_title hide_title" style="color: black; font-weight: bold; display: inline-flex; padding-left: 12px;  font-size: 16px"> <span style="text-align: center;"> <img   class="slide-img1 placeholder" style="width: 20px; height: 20px; margin: 0 0px 0px 0;" id="img" src="{{$picture->picture}}"  /> </span>Curriculum
                        </h3>
                            
                    </li>

                    <li>
                        
                        <h3 class="popular_title show_title" style="color: black; margin-left: 20px; font-weight: bold; display: none;  font-style: italic; font-size: 16px"> 
                        </h3>
                    </li>
                    @endif
                        <div class="curriculum_hide">
                        </div>
                @endif
     
        </div>

               

                <div class="curriculum_show">

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
                        @if($number!=0)
                            <li id="my_channel">
                                <a href="{{route('user.channel.mychannels')}}">
                                    <img src="{{asset('images/sidebar/channel-grey.png')}}" class="grey-img">
                                    <img src="{{asset('images/sidebar/channel-red.png')}}" class="red-img">
                                    <span>My Class ({{$number}})</span>
                                </a>
                            </li>
                        @else
                        <li id="my_channel">
                            <a href="{{route('user.channel.mychannels')}}">
                                <img src="{{asset('images/sidebar/channel-grey.png')}}" class="grey-img">
                                <img src="{{asset('images/sidebar/channel-red.png')}}" class="red-img">
                                <span>My Class</span>
                            </a>
                        </li>

                        @endif

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

                

            @else
            <div>
                <p style="text-align: center;">SOOMA is a free e-school <br> 
                    that empowers students to <br>
                    learn virtually from <br>
                    anywhere at anytime
                </p>
            </div>
            <div >
            
                <div class="menu4 top nav-space my_bg_color" >
                    
                    <form method="get" action="{{route('user.register.form')}}">
                        <button type="submit" class="sign_up_btn" >Enroll Now</button>
                    </form>
            
            
                </div> 
            </div>
            @endif  
            </fieldset>	               
        
            <div style="margin-top: -12px;margin-bottom: 60px;">
                <style>
                    ul#social_media li {
                    display:inline;
                    }
                    p {
                        margin: 0 0 0px;
                    }
                </style>
                <div style=" display: inline-block; background-color: #3AAF44;width: max-content;padding: 2px 5px 0px 5px;border-radius: 50px;margin-left: 20px;font-size: 11px;">
                    <p>Follow our Community</p>
                </div>
                
                <div style="display: inline-block;font-size: 1.5vw; float: right;">
                    <ul id="social_media">
                        <li><i style="color: blue;" class="fa fa-facebook-square" aria-hidden="true"></i></li>
                        <li><i style="color: #50ABF1;" class="fa fa-twitter-square" aria-hidden="true"></i></li>
                        <li><i style="color: #0084B1;" class="fa fa-linkedin-square" aria-hidden="true"></i></li>
                        <li><i style="color: #DC472E;" class="fa fa-youtube-square" aria-hidden="true"></i></li>
                        <li><i style="color: #DC472E;" class="fa fa-google-plus-square" aria-hidden="true"></i></li>
                        <li><i style="color: #1BD741;" class="fa fa-whatsapp" aria-hidden="true"></i></li>

                    </ul>
                </div>

            
            </div>
        
        </div>
        
					
	
    


    </div>


</div>
</div>
            
        
    
              



 