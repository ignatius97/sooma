@extends( 'layouts.teacher.user_teacher' ) 

@section( 'styles' )

    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/custom-style.css')}}">

    <style>
        #c4-header-bg-container {
            background-image: url({{$channel->cover}});
        }
        
        @media screen and (-webkit-min-device-pixel-ratio: 1.5),
        screen and (min-resolution: 1.5dppx) {
            #c4-header-bg-container {
                background-image: url({{$channel->cover}});
            }
        }
        
        #c4-header-bg-container .hd-banner-image {
            background-image: url({{$channel->cover}});
        }
        
        .payment_class {
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 38px;
            line-height: 19px;
            padding: 0 !important;
            font-weight: bolder !important;
        }
        
        .switch {
            display: inline-block;
            height: 23px;
            position: relative;
            width: 45px;
            vertical-align: middle;
        }
        
        .switch input {
            display: none;
        }
        
        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: all 0.4s ease 0s;
        }
        
        .slider::before {
            background-color: white;
            bottom: 4px;
            content: "";
            height: 16px;
            left: 0px;
            position: absolute;
            transition: all 0.4s ease 0s;
            width: 16px;
        }
        
        input:checked + .slider {
            background-color: #51af33;
        }
        
        input:focus + .slider {
            box-shadow: 0 0 1px #2196f3;
        }
        
        input:checked + .slider::before {
            transform: translateX(26px);
        }
        
        .slider.round {
            border-radius: 34px;
        }
        
        .slider.round::before {
            border-radius: 50%;
        }
    </style>

@endsection 

@section('content')

    <div class="y-content" style="">

        <div class="row content-row">

            @include('layouts.teacher.nav_teacher')

            <div class="page-inner col-xs-12 col-sm-12 col-md-8">

                <div class="slide-area1">

                    <div class="branded-page-v2-top-row">

                        <div class="branded-page-v2-header channel-header yt-card">

                            <div id="gh-banner">

                                <div id="c4-header-bg-container" class="c4-visible-on-hover-container has-custom-banner">

                                    <div class="hd-banner">
                                        <div class="hd-banner-image"></div>
                                    </div>

                                    <!-- <a class="channel-header-profile-image spf-link" href="">
                                    <img class="channel-header-profile-image" src="{{$channel->picture}}" title="{{$channel->name}}" alt="{{$channel->name}}">
                                    </a> -->

                                </div>

                            </div>

                            @include('notification.notify')

                            <div class="channel-content-spacing display-inline">

                                <div>

                                    <div class="pull-left">
                                        <a class="channel-header-profile-image spf-link" href="">
                                            <div style="background-image:url({{$channel->picture}});" class="channel-header-profile-image1"></div>
                                        </a>
                                    </div>

                                    <div class="pull-left width-40">
                                        <h1 class="st_channel_heading text-uppercase">{{$channel->name}}</h1>
                                        <p class="subscriber-count">{{$subscriberscnt}} Subscribers</p>
                                        <?php /*<p class="subscriber-count">{{$subscriberscnt}} Subscribers</p> */?>
                                    </div>

                                    <div class="pull-right upload_a btn-space width-60 text-right">
                                        
                                        @if(Auth::check()) 

                                            @if($channel->user_id == Auth::user()->id) 

                                                

                                                    <a class="st_video_upload_btn" href="{{route('user.video_upload', ['id'=>$channel->id])}}"><i class="fa fa-upload"></i> {{tr('upload')}}</a> 


                                                        <button class="st_video_upload_btn text-uppercase" data-toggle="modal" data-target="#start_broadcast" disabled="true">
                                                            <i class="fa fa-video-camera"></i> 
                                                           {{ trans('messages.go_live') }}
                                                        </button>

                                                  


                                                <a style="display: none;" class="st_video_upload_btn" href="{{route('user.video_upload', ['id'=>$channel->id])}}"><i class="fa fa-download"></i> {{tr('download_from_youtube')}}</a>

                                                <a class="st_video_upload_btn" href="{{route('user.channel_edit', $channel->id)}}"><i class="fa fa-pencil"></i> {{tr('edit')}}</a>

                                                <a class="st_video_upload_btn" onclick="return confirm(&quot;{{ $channel->name }} -  {{tr('user_channel_delete_confirm') }}&quot;)" href="{{route('user.delete.channel', ['id'=>$channel->id])}}"><i class="fa fa-trash"></i> {{tr('delete')}}</a> 

                                            @endif 

                                            @if($channel->user_id != Auth::user()->id) 

                                                @if (!$subscribe_status)

                                                    <a class="st_video_upload_btn subscribe_btn" href="{{route('user.subscribe.channel', array('user_id'=>Auth::user()->id, 'channel_id'=>$channel->id))}}" style="color: #fff !important">{{tr('subscribe')}} &nbsp; {{$subscriberscnt}} </a> 

                                                @else

                                                    <a class="st_video_upload_btn" href="{{route('user.unsubscribe.channel', array('subscribe_id'=>$subscribe_status))}}" onclick="return confirm(&quot;{{ $channel->name }} -  {{tr('user_channel_unsubscribe_confirm') }}&quot;)">{{tr('un_subscribe')}} &nbsp; {{$subscriberscnt}}</a> 

                                                @endif 

                                            @else 

                                                @if($subscriberscnt > 0)

                                                    <a class="st_video_upload_btn subscribe_btn" href="{{route('user.channel.subscribers', array('channel_id'=>$channel->id))}}" style="color: #fff !important"><i class="fa fa-users"></i>&nbsp;Enroled &nbsp; {{$subscriberscnt}}</a> 

                                                @endif 

                                            @endif 

                                        @endif

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div id="channel-subheader" class="clearfix branded-page-gutter-padding appbar-content-trigger">

                                    <ul id="channel-navigation-menu" class="clearfix nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active">
                                            <a href="#home1" class="yt-uix-button  spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="home" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">{{tr('home')}}</span>
                                                <span class="visible-xs"><i class="fa fa-home channel-tab-icon"></i></span>
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="#about" class="yt-uix-button spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="about" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">About Class</span>
                                                <span class="visible-xs"><i class="fa fa-info channel-tab-icon"></i></span>
                                            </a>
                                        </li>
                                        <li role="presentation" id="videos_sec">
                                            <a href="#videos" class="yt-uix-button  spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="videos" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">{{tr('videos')}}</span>
                                                <span class="visible-xs"><i class="fa fa-video-camera channel-tab-icon"></i></span>
                                            </a>
                                        </li>
                                        
                                        @if(Setting::get('broadcast_by_user') == 1 || (Auth::check() ? Auth::user()->is_master_user == 1 : 0))

                                            <li role="presentation">

                                                <a href="#live_videos_section" class="yt-uix-button  spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="live_videos_section" role="tab" data-toggle="tab">
                                                    <span class="yt-uix-button-content">live Class</span> 
                                                </a>

                                            </li>

                                        @endif
                                        <li role="presentation">
                                            <a href="#class-post" class="yt-uix-button spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="about" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">Discussion</span>
                                                <span class="visible-xs"><i class="fa fa-info channel-tab-icon"></i></span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#create-assignments" class="yt-uix-button spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="about" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">Create Assignments</span>
                                                <span class="visible-xs"><i class="fa fa-info channel-tab-icon"></i></span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#assignments" class="yt-uix-button spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="about" role="tab" data-toggle="tab">
                                                <span class="yt-uix-button-content hidden-xs">Assignments</span>
                                                <span class="visible-xs"><i class="fa fa-info channel-tab-icon"></i></span>
                                            </a>
                                        </li>

                                        

                                        

                                        <!-- @if(Auth::check()) 

                                            @if($channel->user_id == Auth::user()->id)

                                                <li role="presentation" id="payment_managment_sec">
                                                    <a href="#payment_managment" class="yt-uix-button  spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="payment_managment" role="tab" data-toggle="tab">
                                                        <span class="yt-uix-button-content hidden-xs">{{tr('payment_managment')}} ({{Setting::get('currency')}} {{getAmountBasedChannel($channel->id)}})</span>
                                                        <span class="visible-xs"><i class="fa fa-suitcase channel-tab-icon"></i> &nbsp;({{Setting::get('currency')}} {{getAmountBasedChannel($channel->id)}})</span>
                                                    </a>
                                                </li>

                                            @endif 

                                            <li role="presentation" id="live_videos_billing_sec">
                                                <a href="#live_videos_billing" class="yt-uix-button  spf-link  yt-uix-sessionlink yt-uix-button-epic-nav-item yt-uix-button-size-default" aria-controls="live_videos_billing" role="tab" data-toggle="tab">
                                                    <span class="yt-uix-button-content hidden-xs">{{tr('live_videos_billing')}}</span> 
                                                    <span class="visible-xs"><i class="fa fa-video-camera channel-tab-icon"></i> &nbsp;</span>
                                                </a>
                                            </li>

                                        @endif -->
                                 
                                    </ul>
                               
                                </div>

                            </div>

                        </div>

                    </div>

                    <ul class="tab-content">

                        <li role="tabpanel" class="tab-pane active" id="home1">

                            <div class="feed-item-dismissable">

                                <div class="feed-item-main feed-item-no-author">

                                    <div class="feed-item-main-content">

                                        <div class="shelf-wrapper clearfix">

                                            <div class="big-section-main new-history1">

                                                <div class="content-head">
                                                    <h4 style="color: #000;">{{tr('watch_to_next')}}</h4>
                                                </div>
                                                <?php /*@if(count($trending_videos) == 0)

                                                <img src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">

                                                @endif */?>
                                                
                                                <div class="lohp-shelf-content row">
                                                    
                                                    <!-- <div class="lohp-large-shelf-container col-md-6">

                                                    @if(count($trending_videos) > 0)
                                                    <div class="slide-box recom-box big-box-slide">
                                                        <div class="slide-image recom-image hbb">
                                                            <a href="{{$trending_videos[0]->url}}">
                                                                <img src="{{$trending_videos[0]->video_image}}">
                                                            </a>
                                                            @if($trending_videos[0]->ppv_amount > 0)
                                                                @if(!$trending_videos[0]->ppv_status)
                                                                    <div class="video_amount">

                                                                    {{tr('pay')}} - {{Setting::get('currency')}}{{$trending_videos[0]->ppv_amount}}

                                                                    </div>
                                                                @endif
                                                            @endif
                                                            <div class="video_duration">
                                                                {{$trending_videos[0]->duration}}
                                                            </div>
                                                        </div>
                                                        <div class="video-details recom-details">
                                                            <div class="video-head">
                                                                <a href="{{$trending_videos[0]->url}}"> {{$trending_videos[0]->title}}</a>
                                                            </div>

                                                             <span class="video_views">
                                                                <i class="fa fa-eye"></i> {{$trending_videos[0]->watch_count}} {{tr('views')}} <b>.</b> 
                                                                {{ common_date($trending_videos[0]->created_at) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    </div> -->
                                                   
                                                    <div class="lohp-medium-shelves-container col-md-12">                                                   
                                                        <div class="row">
                                                        
                                                            @if(count($trending_videos) > 0) 

                                                                @foreach($trending_videos as $index => $trending_video)

                                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 channel-view">

                                                                        <div class="slide-box recom-box big-box-slide mt-0 mb-15">
                                                                            
                                                                            <div class="slide-image">
                                                                                <a href="{{ route('user.single' , ['id' => $trending_video->url] ) }}">
                                                                                    <!-- <img src="{{$trending_video->video_image}}"> -->
                                                                                    <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$trending_video->video_image}}" class="slide-img1 placeholder" />
                                                                                </a> 

                                                                                @if($trending_video->ppv_amount > 0) 

                                                                                    @if(!$trending_video->ppv_status)
                                                                                    
                                                                                        <div class="video_amount">
                                                                                        {{tr('pay')}} - {{Setting::get('currency')}}{{$trending_video->ppv_amount}}
                                                                                        </div>
                                                                                    
                                                                                    @endif 

                                                                                @endif
                                                                                
                                                                                <div class="video_duration">
                                                                                    {{$trending_video->duration}}
                                                                                </div>

                                                                            </div>

                                                                            <div class="video-details">
                                                                                
                                                                                <div class="video-head">
                                                                                    <a href="{{ route('user.single' , ['id' => $trending_video->url] ) }}">{{$trending_video->title}}</a>
                                                                                </div>

                                                                                <span class="video_views">
                                                                                    <i class="fa fa-eye"></i> {{$trending_video->watch_count}} {{tr('views')}} <b>.</b> 
                                                                                     {{ common_date($trending_video->created_at) }}
                                                                                </span>
                                                                           
                                                                            </div>

                                                                        </div>
                                                                   
                                                                    </div>

                                                                @endforeach 

                                                            @else

                                                                <center><img src="{{asset('images/no-result.jpg')}}" class="img-responsive aonuto-margin"> </center>
                                                           
                                                            @endif
                                                
                                                        </div>
                                                
                                                    </div>
                                                
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                        <li role="tabpanel" class="tab-pane" id="videos">

                            <div class="recom-area abt-sec">

                                <div class="abt-sec-head">

                                    <div class="new-history1">

                                        <div class="content-head">

                                            <div>
                                                <h4 style="color: #000;">{{tr('videos')}}&nbsp;&nbsp;
                                                @if(Auth::check())

                                                <!-- @if(Auth::user()->id == $channel->user_id)
                                                <small style="font-size: 12px">({{tr('note')}}:{{tr('ad_note')}} )</small>

                                                @endif -->

                                                @endif
                                                </h4>
                                            </div>

                                        </div>
                                        <!--end of content-head-->

                                        @if(count($videos) > 0)

                                        <ul class="history-list">

                                            @foreach($videos as $i => $video)

                                            <li class="sub-list row border-0">

                                                <div class="main-history">

                                                    <div class="history-image">

                                                        <a href="{{ route('user.single' , ['id' => $video->url] ) }}">
                                                            <!-- <img src="{{$video->video_image}}"> -->
                                                            <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$video->video_image}}" class="slide-img1 placeholder" />
                                                        </a> 

                                                        @if($video->ppv_amount > 0) 

                                                            @if(!$video->ppv_status)
                                                                <div class="video_amount">
                                                                    {{tr('pay')}} - {{Setting::get('currency')}}{{$video->ppv_amount}}

                                                                </div>
                                                            @endif 

                                                        @endif

                                                        <div class="video_duration">
                                                            {{$video->duration}}
                                                        </div>

                                                    </div>
                                                    <!--history-image-->

                                                    <div class="history-title">

                                                        <div class="history-head row">
                                                           
                                                            <div class="cross-title2">
                                                                <h5 class="payment_class unset-height">
                                                                    @if(Auth::check())

                                                                        @if($channel->user_id == Auth::user()->id)

                                                                            @if($video->is_approved == YES)
                                                                                <span class="text-green" title="Admin Approved"><i class="fa fa-check-circle"></i></span>
                                                                            @else

                                                                                <span class="text-red" title="Admin Declined"><i class="fa fa-times"></i></span>

                                                                            @endif

                                                                        @endif

                                                                    @endif

                                                                    <a href="{{$video->url}}">{{$video->title}}</a>
                                                                </h5>

                                                                <span class="video_views">
                                                                    <i class="fa fa-eye"></i> {{$video->watch_count}} {{tr('views')}} <b>.</b> 
                                                                     {{ common_date($video->created_at) }}
                                                                </span>
                                                            </div>
                                                         
                                                            @if(Auth::check()) 

                                                                @if($channel->user_id == Auth::user()->id) 

                                                                    @if($video->status)
                                                                    
                                                                        <div class="cross-mark2">

                                                                            <!-- <label style="float:none; margin-top: 6px;" class="switch hidden-xs" title="{{$video->ad_status ? tr('disable_ad') : tr('enable_ad')}}">
                                                                                <input id="change_adstatus_id" type="checkbox" @if($video->ad_status) checked @endif onchange="change_adstatus(this.value, {{$video->video_tape_id}})">
                                                                                <div class="slider round"></div>
                                                                                </label> -->

                                                                            <div class="btn-group show-on-hover">
                                                                                <button type="button" class="video-menu dropdown-toggle" data-toggle="dropdown">

                                                                                    <!-- <span class="hidden-xs">{{tr('action')}}</span>
                                                                                          <span class="caret"></span> -->
                                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                                </button>

                                                                                <?php $total_amount = $video->amount + ppv_amount($video->video_tape_id); ?>

                                                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                                                                    @if(Setting::get('is_payper_view') == 1)
                                                                                    <li><a data-toggle="modal" data-target="#pay-perview_{{$video->video_tape_id}}">{{tr('pay_per_view')}}</a></li>
                                                                                    @endif @if($total_amount > 0)
                                                                                    <li><a data-toggle="modal" data-target="#earning_{{$video->video_tape_id}}">{{tr('total_earning')}}</a></li>
                                                                                    <!-- <li><a data-toggle="modal" data-target="#earning">{{tr('total_earning')}}</a></li> -->
                                                                                    <li class="divider"></li>
                                                                                    @endif

                                                                                    <li><a title="edit" href="{{route('user.edit.video', $video->video_tape_id)}}">{{tr('edit_video')}}</a></li>
                                                                                    <li><a title="delete" onclick="return confirm(&quot;{{ substr($video->title, 0 , 15)}}.. {{tr('user_video_delete_confirm') }}&quot;)" href="{{route('user.delete.video' , array('id' => $video->video_tape_id))}}"> {{tr('delete_video')}}</a></li>
                                                                                    <li>
                                                                                        <a onclick="change_adstatus({{$video->ad_status}}, {{$video->video_tape_id}})" style="cursor: pointer;" id="ad_status_{{$video->video_tape_id}}">@if($video->ad_status) {{tr('disable_ad')}} @else {{tr('enable_ad')}} @endif</a>

                                                                                    </li>
                                                                                </ul>

                                                                                @if($total_amount > 0)

                                                                                <div class="modal fade modal-top" id="earning_{{$video->video_tape_id}}" role="dialog">
                                                                                    <!-- <div class="modal fade modal-top" id="earning" role="dialog"> -->
                                                                                    <div class="modal-dialog bg-img modal-sm" style="background-image: url({{asset('images/popup-back.jpg')}});">

                                                                                        <div class="modal-content earning-content">
                                                                                            <div class="modal-header text-center">
                                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                <h3 class="modal-title no-margin">{{tr('total_earnings')}}</h3>
                                                                                            </div>
                                                                                            <div class="modal-body text-center">
                                                                                                <div class="amount-circle">
                                                                                                    <h3 class="no-margin">${{$total_amount}}</h3>
                                                                                                </div>
                                                                                                <p>{{tr('total_views')}} - {{$video->watch_count}}</p>
                                                                                                <a href="{{route('user.redeems')}}">
                                                                                                    <button class="btn btn-danger top">{{tr('view_redeem')}}</button>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                @endif

                                                                                <!-- ========modal pay per view======= -->
                                                                                <div id="pay-perview_{{$video->video_tape_id}}" class="modal fade" role="dialog">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <form action="{{route('user.save.video-payment', $video->video_tape_id)}}" method="POST">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title text-left" style="color: #000;">{{tr('pay_per_view')}}</h4>
                                                                                                </div>
                                                                                                <div class="modal-body pay-perview">

                                                                                                    <h4 class="black-clr text-left">{{tr('type_of_user')}}</h4>
                                                                                                    <div>
                                                                                                        <label class="radio1">
                                                                                                            <input id="radio1" type="radio" name="type_of_user" value="{{NORMAL_USER}}" {{($video->type_of_user > 0) ? (($video->type_of_user == NORMAL_USER) ? 'checked' : '') : 'checked'}} required>
                                                                                                            <span class="outer"><span class="inner"></span></span>{{tr('normal_user')}}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <label class="radio1">
                                                                                                            <input id="radio2" type="radio" name="type_of_user" value="{{PAID_USER}}" {{($video->type_of_user == PAID_USER) ? 'checked' : ''}} required>
                                                                                                            <span class="outer"><span class="inner"></span></span>{{tr('paid_user')}}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <label class="radio1">
                                                                                                            <input id="radio2" type="radio" name="type_of_user" value="{{BOTH_USERS}}" {{($video->type_of_user == BOTH_USERS) ? 'checked' : ''}} required>
                                                                                                            <span class="outer"><span class="inner"></span></span>{{tr('both_user')}}
                                                                                                        </label>
                                                                                                    </div>

                                                                                                    <div class="clearfix"></div>

                                                                                                    <h4 class="black-clr text-left">{{tr('type_of_subscription')}}</h4>
                                                                                                    <div>

                                                                                                        <label class="radio1">
                                                                                                            <input id="radio2" type="radio" name="type_of_subscription" value="{{ONE_TIME_PAYMENT}}" {{($video->type_of_subscription > 0) ? (($video->type_of_subscription == ONE_TIME_PAYMENT) ? 'checked' : '') : 'checked'}} required>
                                                                                                            <span class="outer"><span class="inner"></span></span>{{tr('one_time_payment')}}
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div>

                                                                                                        {{{$video->type_of_subscription}}}
                                                                                                        <label class="radio1">
                                                                                                            <input id="radio2" type="radio" name="type_of_subscription" value="{{RECURRING_PAYMENT}}" {{($video->type_of_subscription == RECURRING_PAYMENT) ? 'checked' : ''}} required>
                                                                                                            <span class="outer"><span class="inner"></span></span>{{tr('recurring_payment')}}
                                                                                                        </label>
                                                                                                    </div>

                                                                                                    <div class="clearfix"></div>

                                                                                                    <h4 class="black-clr text-left">{{tr('amount')}}</h4>
                                                                                                    <div>
                                                                                                        <input type="number" required value="{{$video->ppv_amount}}" name="ppv_amount" class="form-control" id="amount" placeholder="{{tr('amount')}}" step="any" maxlength="6">
                                                                                                        <!-- /input-group -->

                                                                                                    </div>

                                                                                                    <div class="clearfix"></div>
                                                                                                </div>

                                                                                                <div class="modal-footer border-0">
                                                                                                    <div class="pull-left">
                                                                                                        @if($video->ppv_amount > 0)
                                                                                                        <a class="btn btn-danger" href="{{route('user.remove_pay_per_view', $video->video_tape_id)}}">{{tr('remove_pay_per_view')}}</a> @endif
                                                                                                    </div>
                                                                                                    <div class="pull-right">
                                                                                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                                                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- ========modal ends======= -->

                                                                            </div>

                                                                            @else

                                                                            <button class="btn btn-warning btn-small">{{tr('video_compressing')}}</button>


                                                                            <!--end of cross-mark-->
                                                                        </div>

                                                                    @endif 

                                                                @endif 

                                                            @endif
                                                            <!--end of history-head-->

                                                            <?php /*<div class="category"><b class="text-capitalize">{{tr('category_name')}} : </b> <a href="{{route('user.categories.view', $video->category_unique_id)}}" target="_blank">{{$video->category_name}}</a></div> */?>

                                                            <div class="description">
                                                                <?= $video->description?>
                                                            </div>
                                                            <!--end of description-->

                                                            <span class="stars">
                                                                <a><i @if($video->ratings >= 1) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                                <a><i @if($video->ratings >= 2) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                                <a><i @if($video->ratings >= 3) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                                <a><i @if($video->ratings >= 4) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                                <a><i @if($video->ratings >= 5) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                            </span>
                                                      
                                                        </div>
                                                        <!--end of history-title-->

                                                    </div>
                                                    <!--end of main-history-->
                                               
                                                </div>

                                            </li>

                                            @endforeach

                                            <span id="videos_list"></span>

                                            <div id="video_loader" style="display: none;">

                                                <h1 class="text-center"><i class="fa fa-spinner fa-spin" style="color:#ff0000"></i></h1>

                                            </div>

                                            <div class="clearfix"></div>

                                            <button class="pull-right btn btn-info mb-15" onclick="getVideos()" style="color: #fff">{{tr('view_more')}}</button>

                                            <div class="clearfix"></div>

                                        </ul>

                                        @else

                                        <!-- <p style="color: #000">{{tr('no_video_found')}}</p> -->
                                        <img src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin"> @endif

                                    </div>

                                </div>

                            </div>

                        </li>

                        <li role="tabpanel" class="tab-pane" id="class-post">

                           
                            <div class="v-comments">
  
         <div class="comment-box1">
            <div class="com-image">
               <img style="width:50px;height:50px; border-radius:25px;object-fit: cover;object-position: center;" src="{{Auth::user()->picture}}">                                    
            </div>
            <!--end od com-image-->
            <div id="comment_form" style="color: black;">
               <div>
                  <form method="post" id="class_comment_sent" name="class_comment_sent" action="{{route('user.class.add.comments')}}" >
                     <input type="hidden" value="{{$channel_id}}" name="channel_id">
                     <input type="hidden" value="{{Auth::user()->id}}" name="users_id">
                     <textarea rows="10" id="class_comment" name="class_comments" placeholder="Add a CLass Comment"></textarea>
                     <p class="underline"></p>
                     <button class="btn pull-right btn-sm btn-info btn-lg top-btn-space" type="submit" id="class_comment_btn">Post Comment</button>
                     <div class="clearfix"></div>

                  </form>
               </div>
            </div>
            <!--end of comment-form-->
           </div>
         </div> 
           

            <div class="class_feed-comment">
             <span id="class_new-comment"></span>

              @if(count($comments) > 0)
        <div class="feed-comment">
         <span id="new-comment"></span>
         @foreach($comments as $c =>  $comment)
         <div class="display-com">
            <div class="com-image">
               <img style="width:50px;height:50px; border-radius:25px;object-fit: cover;object-position: center;" src="{{$comment->picture}}">                                    
            </div>
            <!--end od com-image-->
            <div class="display-comhead">
               <span class="sub-comhead">
                  <a>
                     <h5 style="float:left">{{$comment->name}}</h5>
                  </a>
                  <a class="text-none">
                     <p>{{$comment->updated_at->diffForHumans()}}</p>
                  </a>
                  
                  <p class="com-para">{{$comment->comment}}</p>
               </span>
            </div>
            <!--display-comhead-->                                        
         </div>
         <!--display-com-->
         @endforeach
      </div>
      @else
      <div class="feed-comment">
         <span id="new-comment"></span>
        </div>
      <!-- <p>{{tr('no_comments')}}</p> -->
      @endif
            </div>
                        </li>

                        <li role="tabpanel" class="tab-pane" id="create-assignments">


                            <h4 style="color: black; text-align: center; display: none;" class="assignment_success">Assignment created succesfully</h4>

                            <div class="recom-area abt-sec assinment_contents" >
                                <div class="abt-sec-head">
                                    <h5>Create Assignments</h5>


                                     <form method="post" id="class_assignment_sent" name="class_assignment_sent" action="{{route('user.class.add.assignments')}}"   enctype="multipart/form-data">
                                         <input type="hidden" value="{{$channel_id}}" name="channel_id">
                                   
                                        <div class="form-group" >
                                            <input type="text" required name="assignment_title" class="form-control" id="assignment-title" placeholder="Assignmnent Title"  style="background-color: white;">
                                        </div>
                                        <div>
                                            <textarea id="class_assignment" name="class_assignment" placeholder="Assignmnent Instructions here..."   rows="8" style="background-color: white; color:black; width:100%;"  ></textarea>
                                        </div>

                                        <div  style="color: black; margin-top: 10px; margin-bottom: 10px;">                        
                                        <label for="picture" >Attach a file (optional)</label>
                                         <input type="file" id="picture" name="picture">
                   
                                       </div>
                                        <div >
                                            <button class="btn btn-primary" type="submit"  id="class_assignment_btn">Create +</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </li>

                        <li role="tabpanel" class="tab-pane" id="assignments">
                          
                            <div class="recom-area abt-sec">
                                <div class="abt-sec-head">
                                    <h5>Assignments</h5>
                                    @if(count($assignment)>0)
                                     @foreach($assignment as $assignment)
                                    <a href="{{route('user.channel.assignment', ['assignment_id'=>$assignment->id, 'channel_id'=>$channel_id])}}" >
                                        <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                                            <P>{{$assignment->title}} <br/> <small>{{$assignment->created_at}}</small></P>
                                        </div>
                                    </a>

                                    @endforeach

                                     @else

                                     <h3 style="color: black;">You don't have any assignment for the class</h3>

                                     @endif
                                  
                                </div>
                            </div>
                         

                        </li>

                        <li role="tabpanel" class="tab-pane" id="about">

                            <div class="recom-area abt-sec">
                                <div class="abt-sec-head">
                                    <h5><?= $channel->description?></h5>
                                </div>
                            </div>

                        </li>



                        <li role="tabpanel" class="tab-pane" id="playlist">

                            <div class="recom-area abt-sec">

                                <div class="abt-sec-head">

                                    <div class="new-history1">

                                        <div class="content-head">

                                            <div>

                                                <h4 style="color: #000; display: inline;">
                                                {{tr('playlists')}}&nbsp;&nbsp;
                                                </h4>
                                                
                                                @if(Auth::check())
                                                    
                                                    @if(\Auth::user()->id == $channel->user_id)
                                                    
                                                        <button class="share-new global_playlist_id pull-right btn btn-info" style="color: #fff" id="{{ $channel->id }}"><i class="material-icons">playlist_add</i>{{ tr('playlist') }}
                                                        </button>
                                                
                                                    @endif
                                                
                                                @endif

                                            </div>

                                        </div>

                                        <div class="recommend-list row">

                                            @if(count($channel_playlists) > 0) 

                                                @foreach($channel_playlists as $channel_playlist_details)

                                                    <div class="slide-box recom-box">
                                                        
                                                        <div class="slide-image">

                                                            <a href="{{route('user.playlists.view', ['playlist_id' => $channel_playlist_details->playlist_id, 'playlist_type' => PLAYLIST_TYPE_CHANNEL ])}}">
                                                                <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$channel_playlist_details->picture}}" class="slide-img1 placeholder" />
                                                            </a> 

                                                            @if(Auth::check())
                                                              
                                                                @if(\Auth::user()->id == $channel->user_id)
                                                                    <div class="video_amount">

                                                                        <a href="{{route('user.playlists.delete', ['playlist_id' => $channel_playlist_details->playlist_id])}}" onclick="return confirm(&quot;{{ substr($channel_playlist_details->title, 0 , 15)}} - {{tr('user_playlist_delete_confirm') }}&quot;)" class="playlist-delete"><i class="fa fa-trash"></i></a>

                                                                    </div>

                                                                @endif
                                                            
                                                            @endif

                                                            <div class="video_duration">
                                                                {{$channel_playlist_details->total_videos}} {{tr('videos')}}
                                                            </div>

                                                        </div>

                                                        <div class="video-details recom-details">

                                                            <div class="video-head">
                                                                <a href="{{route('user.playlists.view', ['playlist_id' => $channel_playlist_details->playlist_id])}}">{{$channel_playlist_details->title}}</a>
                                                            </div>

                                                            <span class="video_views">
                                                                <div>

                                                                </div>
                                                                {{ common_date($channel_playlist_details->created_at) }}
                                                            </span>

                                                        </div>
                                                        <!--end of video-details-->

                                                    </div>

                                                    <div id="new_playlist">

                                                    </div>

                                                @endforeach 

                                            @else

                                                <div id="new_playlist">

                                                </div>

                                                <img src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin" id="no_playlist"> 

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                        <li role="tabpanel" class="tab-pane" id="payment_managment">
                            
                            <div class="recom-area abt-sec">

                                <div class="abt-sec-head">

                                    <div class="new-history1">

                                        <div class="content-head">
                                            <div>
                                                <h4 style="color: #000;">{{tr('payment_videos')}}</h4>
                                            </div>
                                        </div>
                                        <!--end of content-head-->

                                        <!-- dashboard -->
                                        <div class="row">

                                            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="ppv-dashboard">
                                                    <div class="ppv-dashboard-left">
                                                        <img src="{{asset('images/video-camera.png')}}">
                                                    </div>
                                                    <div class="ppv-dashboard-right">
                                                        <p>Total videos</p>
                                                        <h2 class="">150</h2>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="ppv-dashboard">
                                                    <div class="ppv-dashboard-left">
                                                        <img src="{{asset('images/video-cash.png')}}">
                                                    </div>
                                                    <div class="ppv-dashboard-right">
                                                        <p>paid videos</p>
                                                        <h2 class="">100</h2>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                           
                                                <div class="ppv-dashboard">
                                           
                                                    <div class="ppv-dashboard-left">
                                                        <img src="{{asset('images/dollar.png')}}">
                                                    </div>
                                           
                                                    <div class="ppv-dashboard-right">
                                                        <p>{{tr('revenue')}}</p>
                                                        <h2 class="">{{Setting::get('currency')}} {{getAmountBasedChannel($channel->id)}}</h2>
                                                    </div>
                                           
                                                </div>
                                           
                                            </div>

                                        </div>
                                        <!-- dashboard -->

                                        @if($payment_videos->count > 0)

                                        <ul class="history-list">

                                            @foreach($payment_videos->data as $i => $video)

                                            <li class="sub-list row border-0">
                                               
                                                <div class="main-history">
                                               
                                                    <div class="history-image">
                                               
                                                        <a href="{{$video->url}}"><img src="{{$video->video_image}}"></a> @if($video->ppv_amount > 0) @if(!$video->ppv_status)

                                                        <div class="video_amount">

                                                            {{tr('pay')}} - {{Setting::get('currency')}} {{$video->ppv_amount}}

                                                        </div>

                                                        @endif @endif

                                                        <div class="video_duration">
                                                            {{$video->duration}}
                                                        </div>

                                                    </div>
                                                    <!--history-image-->

                                                    <div class="history-title">
                                               
                                                        <div class="history-head row">
                                               
                                                            <div class="cross-title">
                                               
                                                                <h5 class="payment_class unset-height"><a href="{{$video->url}}">{{$video->title}}</a></h5>

                                                                <span class="video_views">
                                                                    <i class="fa fa-eye"></i> {{$video->watch_count}} {{tr('views')}} <b>.</b> 
                                                                    {{ common_date($video->created_at) }}
                                                                </span>

                                                            </div>
                                               
                                                            <div class="cross-mark">
                                                                <a onclick="return confirm(&quot;{{ substr($video->title, 0 , 15)}}.. {{tr('user_video_delete_confirm') }}&quot;)" href="{{route('user.delete.video' , array('id' => $video->video_tape_id))}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                            <!--end of cross-mark-->
                                               
                                                        </div>
                                                        <!--end of history-head-->

                                                        <div class="description">
                                                            <?= $video->description?>
                                                        </div>
                                                        <!--end of description-->

                                                        <div class="label-sec">
                                                            @if($video->amount > 0)

                                                            <span class="label label-success">{{tr('ad_amount')}} - ${{$video->amount}}</span> @endif @if($video->user_ppv_amount > 0)
                                                            <span class="label label-info">{{tr('ppv_revenue')}} - ${{$video->user_ppv_amount}}</span> @endif
                                                        </div>
                                                        <span class="stars">
                                                            <a><i @if($video->ratings >= 1) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                            <a><i @if($video->ratings >= 2) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                            <a><i @if($video->ratings >= 3) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                            <a><i @if($video->ratings >= 4) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                            <a><i @if($video->ratings >= 5) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                        </span>
                                                    </div>
                                                    <!--end of history-title-->

                                                </div>
                                                <!--end of main-history-->
                                            </li>

                                            @endforeach

                                            <span id="payment_videos_list"></span>

                                            <div id="payment_video_loader" style="display: none;">

                                                <h1 class="text-center"><i class="fa fa-spinner fa-spin" style="color:#ff0000"></i></h1>

                                            </div>

                                            <div class="clearfix"></div>

                                            <button class="pull-right btn btn-info mb-15" onclick="getPaymentVideos()" style="color: #fff">{{tr('view_more')}}</button>

                                            <div class="clearfix"></div>

                                        </ul>

                                        @else

                                        <img src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin"> @endif

                                        <?php /* @if(count($payment_videos) > 0)

                                        @if($payment_videos)
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div align="center" id="paglink"><?php echo $payment_videos->links(); ?></div>
                                        </div>
                                        </div>
                                        @endif 

                                        @endif */ ?>

                                    </div>

                                </div>
                        
                            </div>

                        </li>

                        <!-- DONT REMOVE THIS. LIVE VIDEO LISTS -->

                        @include('teacher.channels._live_taps') 

                    </ul>

                    <div class="sidebar-back"></div>

                </div>

            </div>

        </div>

    </div>

    <!-- PLAYLIST POPUPSTART -->

    <div class="modal fade global_playlist_id_modal" id="global_playlist_id_{{$channel->id}}" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <!-- if user logged in let create, update playlist -->

                @if(Auth::check())

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">{{tr('save_to')}}</h4>

                    </div>

                    <div class="modal-footer">

                        <div class="more-content">

                            <div onclick="$('#create_playlist_form').toggle()">

                                <label><i class="fa fa-plus"></i> {{tr('create_playlist')}}</label>

                            </div>

                            <div class="" id="create_playlist_form" style="display: none">

                                <div class="form-group">

                                    <input type="text" name="playlist_title" id="playlist_title" class="form-control" placeholder="{{tr('playlist_name_placeholder')}}" required>

                                    <label for="video" class="control-label">{{tr('videos')}}</label>

                                    <div>

                                        <select id="video_tapes_id" name="video_tapes_id[]" class="form-control select2" data-placeholder="{{tr('select_video_tapes')}}" multiple style="width: 100% !important" required>

                                            @if(count($videos) > 0) 

                                                @foreach($videos as $video_tapes_details) 

                                                    @if($video_tapes_details->is_approved == YES)

                                                    <option value="{{$video_tapes_details->video_tape_id}}"> {{ $video_tapes_details->title }}</option>

                                                    @endif 

                                                @endforeach 

                                            @endif

                                        </select>

                                    </div>

                                    <div class="" style="display: none;">

                                        <label for="playlist_privacy">Privacy</label>
                                       
                                        <select id="playlist_privacy" name="playlist_privacy" class="form-control">
                                            <option value="PUBLIC">PUBLIC</option>
                                            <option value="PRIVETE">PRIVETE</option>
                                            <option value="UNLISTED">UNLISTED</option>
                                        </select>
                                    
                                    </div>
                                
                                </div>

                                <button class="btn btn-primary" onclick='playlist_save("{{ $channel->id }}")'>{{ tr('create') }}
                                </button>

                            </div>

                        </div>

                    </div>

                    <!-- if user not logged in ask for login -->

                @else

                    <div class="menu4 top nav-space">

                        <p>{{tr('signid_for_playlist')}}</p>

                        <a href="{{route('user.login.form')}}" class="btn btn-sm btn-primary">{{tr('login')}}</a>

                    </div>

                @endif

            </div>
            <!-- modal content ends -->

        </div>

    </div>

    <!-- PLAYLIST POPUPEND -->

    @include('teacher.channels._go_live_form')

@endsection 

@section('scripts')

    <script>
        
        function change_adstatus(val, id) {

            var url = "{{route('user.ad_request')}}";

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    id: id,
                    status: val
                },
                success: function(result) {

                    if (result.success == true) {

                        if (result.status == 1) {

                            $("#ad_status_" + id).html("{{tr('disable_ad')}}");

                        } else {

                            $("#ad_status_" + id).html("{{tr('enable_ad')}}");
                        }

                        alert("Ad Status Changed Successfully");
                    }
                }

            });

        }

        var stopScroll = false;

        var searchLength = "{{count($videos)}}";

        var stopPaymentScroll = false;

        var searchPaymentLength = "{{$payment_videos->count}}";

        function getVideos() {

            if (searchLength > 0) {

                videos(searchLength);

            }
        }

        function getPaymentVideos() {

            if (searchPaymentLength > 0) {

                payment_videos(searchPaymentLength);

            }
        }

        /*$(window).scroll(function() {

            if($(window).scrollTop() == $(document).height() - $(window).height()) {

                var value = $('ul#channel-navigation-menu').find('li.active').attr('id');

                //alert(value);

                if (value == 'videos_sec') {

                    if (!stopScroll) {

                        // console.log("New Length " +searchLength);

                        if (searchLength > 0) {

                            videos(searchLength);

                        }

                    }
                }

                if (value == 'payment_managment_sec') {

                    if (!stopPaymentScroll) {

                        // console.log("New Length " +searchLength);

                        if (searchPaymentLength > 0) {

                            payment_videos(searchPaymentLength);

                        }

                    }
                }

            }

        });*/

        function videos(cnt) {

            channel_id = "{{$channel->id}}";

            $.ajax({

                type: "post",

                url: "{{route('user.video.get_videos')}}",

                beforeSend: function() {

                    $("#video_loader").fadeIn();
                },

                data: {
                    skip: cnt,
                    channel_id: channel_id
                },

                async: false,

                success: function(data) {

                    $("#videos_list").append(data.view);

                    if (data.length == 0) {

                        stopScroll = true;

                    } else {

                        stopScroll = false;

                        // console.log(searchLength);

                        // console.log(data.length);

                        searchLength = parseInt(searchLength) + data.length;

                        // console.log("searchLength" +searchLength);

                    }

                },

                complete: function() {

                    $("#video_loader").fadeOut();

                },

                error: function(data) {

                },

            });

        }

        function payment_videos(cnt) {

            channel_id = "{{$channel->id}}";

            $.ajax({

                type: "post",

                url: "{{route('user.video.payment_mgmt_videos')}}",

                beforeSend: function() {

                    $("#payment_video_loader").fadeIn();
                },

                data: {
                    skip: cnt,
                    channel_id: channel_id
                },

                async: false,

                success: function(data) {

                    $("#payment_videos_list").append(data.view);

                    if (data.length == 0) {

                        stopPaymentScroll = true;

                    } else {

                        stopPaymentScroll = false;

                        // console.log(searchLength);

                        // console.log(data.length);

                        searchPaymentLength = parseInt(searchPaymentLength) + data.length;

                        // console.log("searchLength" +searchLength);

                    }

                },

                complete: function() {

                    $("#payment_video_loader").fadeOut();

                },

                error: function(data) {

                },

            });

        }

        $(document).on('ready', function() {

            $("#copy-embed1").on("click", function() {
                $('#popup1').modal('hide');
            });

            $('.global_playlist_id').on('click', function(event) {

                event.preventDefault();

                var channel_id = $(this).attr('id');

                $('#global_playlist_id_' + channel_id).modal('show');

            });

        });

        function playlist_save(channel_id) {

            var title = $("#playlist_title").val();

            var privacy = $("#playlist_privacy").val();

            var video_tapes_id = $("#video_tapes_id").val();
           
            var playlist_type = "<?php echo PLAYLIST_TYPE_CHANNEL ?>";

            if (title == '') {

                alert("Title for playlist required");

            }
            if (video_tapes_id == null) {

                alert("Please Choose videos to create playlist");

            } else {
                // alert(title);
                $.ajax({

                    // url : "{{route('user.playlist.save.video_add')}}",
                    url: "{{ route('user.channel.playlists.save') }}",

                    data: {
                        title: title,
                        channel_id: channel_id,
                        privacy: privacy,
                        video_tapes_id: video_tapes_id,
                        playlist_type: playlist_type
                    },

                    type: "post",

                    success: function(data) {

                        if (data.success) {

                            $('#playlist_title').removeAttr('value');

                            $('#video_tapes_id').val(null).trigger('change');

                            $('#global_playlist_id_' + channel_id).modal('hide');
                           
                            $('#no_playlist').hide();

                            $('#new_playlist').append(data.new_playlist_content);

                            alert(data.message);

                        } else {

                            alert(data.error_messages);

                        }

                    },

                    error: function(data) {

                    },

                })

            }

        }

    </script>


    <script type="text/javascript">
        

        $('#class_comment').keydown(function(event) {

           if (event.keyCode == 13) {
               $(this.form).submit()
               return false;
           }
       }).focus(function(){
           if(this.value == "Write your comment here..."){
               this.value = "";
           }
       }).blur(function(){
           if(this.value==""){
               this.value = "";
           }
       });
   
       jQuery("form[name='class_comment_sent']").submit(function(e) {
   
           //prevent Default functionality
             //prevent Default functionality
              e.preventDefault();
   
   
   
           //get the action-url of the form
           var actionurl = e.currentTarget.action;
   
           var form_data = $.trim(jQuery("#class_comment").val());
   
           if(form_data) {
   
               $("#class_comment_btn").html("Sending...");
   
               $("#class_comment_btn").attr('disabled', true);
   
   
               //do your own request an handle the results
               jQuery.ajax({
                   url: actionurl,
                   type: 'post',
                   dataType: 'json',
                   data: jQuery("#class_comment_sent").serialize(),
                   success: function(data) {
                    console.log(data);
   
                       $("#class_comment_btn").html("Comment");
   
                       $("#class_comment_btn").attr('disabled', false);
   
                       if(data.success == true) {
   
                           @if(Auth::check())
                               jQuery('#class_comment').val("");
                               jQuery('#class_no_comment').hide();
                               var comment_count = 0;
                               var count = 0;
                               comment_count = jQuery('#class_comment_count').text();
                               var count = parseInt(comment_count) + 1;
                               jQuery('#class_comment_count').text(count);
                               jQuery('#class_video_comment_count').text(count);
   
                              
                               /**
                               <p><input id="view_rating" name="rating" type="number" class="rating view_rating" min="1" max="5" step="1" value="'+data.comment.rating+'"></p>
                               **/
   
   
                               jQuery('#class_new-comment').prepend('<div class="display-com"><div class="com-image"><img style="width:48px;height:48px;  border-radius:24px;" src="{{Auth::user()->picture}}"></div><div class="display-comhead"><span class="sub-comhead"><a><h5 style="float:left">{{Auth::user()->name}}</h5></a><a><p>'+data.date+'</p></a><p class="com-para">'+data.comment.comment+'</p></span></div></div>');
                           @endif
                       } else {
                           console.log('Wrong...!');


                       }
                   }
               });
           } else {
   
               alert("Please fill the comment field");
   
               return false;
   
           }
   
       });
   
    </script>

<script type="text/javascript">
        

        $('#class_assignment').keydown(function(event) {
            console.log('Ok');
           if (event.keyCode == 13) {
               $(this.form).submit()
               return false;
           }
       }).focus(function(){
           if(this.value == "Write your comment here..."){
               this.value = "";
           }
       }).blur(function(){
           if(this.value==""){
               this.value = "";
           }
       });
   
      jQuery("form[name='class_assignment_sent']").submit(function(e) {
   
           //prevent Default functionality
           e.preventDefault();
   
           //get the action-url of the form
           var actionurl = e.currentTarget.action;
   
           var form_data =new FormData($(this)[0]);
   
           if(form_data) {
   
               $("#class_assignment_btn").html("Sending...");
   
               $("#class_assignment_btn").attr('disabled', true);
   
   
               //do your own request an handle the results
               jQuery.ajax({
                   url: actionurl,
                   type: 'post',
                   dataType: 'json',
                   processData: false,
                   contentType: false,
                   data: form_data,
                   success: function(data) {
                    console.log(data);
                       var t =document.querySelector('.assignment_success');
                       t.style.display='block';


                       var assinment_contents=document.querySelector('.assinment_contents');
                       assinment_contents.style.display='none';
   
                       $("#class_assignment_btn").html("Comment");
   
                       $("#class_assignment_btn").attr('disabled', false);

   
                      
                   }
               });
           } else {
   
               alert("Please fill the comment field");
   
               return false;
   
           }
   
       });
   
    </script>
@endsection