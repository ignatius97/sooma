@extends( 'layouts.user' )


@section( 'styles' )

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/custom-style.css')}}"> 

@endsection

@section('content')

<div class="y-content">

	<div class="row content-row">

		@include('layouts.user.nav')

			<div class="page-inner ">

			@include('notification.notify')

				<div class="slide-area1 recom-area abt-sec">
					
					<div class="abt-sec-head">
						
						<div class="new-history">



             @if(count($sub) > 0)
			@foreach($sub as $detail)
          
			@foreach($detail as $d)
             


             @if(count($response->channels) > 0)


				                    <ul class="history-list">

				                        @foreach($response->channels as $i => $channel)

                                         @if($d->name==$channel->title)
				                        <li class="sub-list row">
				                            <div class="main-history">
				                                 <div class="history-image">
				                                    <a href="{{route('user.channels',['id'=>$channel->channel_id])}}">
				                                    	<!-- <img src="{{$channel->picture}}"> -->
				                                    	<img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$channel->picture}}" class="slide-img1 placeholder" />
				                                    </a>
				                                    <div class="video_duration">
				                                        {{$channel->no_of_videos}} {{tr('videos')}}
				                                    </div>                        
				                                </div><!--history-image-->

				                                <div class="history-title">
				                                    <div class="history-head row">
				                                        <div class="cross-title">
				                                            <h5 class="payment_class mb-3" style="padding: 0px;"><a href="{{route('user.channels',$channel->channel_id)}}">{{$channel->title}}</a></h5>
				                                            
				                                            <span class="video_views">
				                                            	 <i class="fa fa-eye"></i> {{$channel->no_of_subscribers}} Enroled <b>.</b> 
						                                        {{ common_date($channel->created_at) }}
						                                    </span>
				                                        </div> 
				                                        @if(Auth::check())

				                                        	@if($channel->user_id != Auth::user()->id)

															<div class="pull-right upload_a">

					                                            @if (!$channel->subscribe_status)

																<a class="st_video_upload_btn subscribe_btn " href="{{route('user.subscribe.channel', array('user_id'=>Auth::user()->id, 'channel_id'=>$channel->channel_id))}}" style="color: #fff !important"><i class="fa fa-envelope"></i>&nbsp;Enroled &nbsp; {{$channel->no_of_subscribers}}</a>


																@else 

																	<a class="st_video_upload_btn " href="{{route('user.unsubscribe.channel', array('subscribe_id'=>$channel->subscribe_status))}}" onclick="return confirm(&quot;{{ $channel->title }} -  {{tr('user_channel_unsubscribe_confirm') }}&quot;)" ><i class="fa fa-times"></i>&nbsp;Un Enrole &nbsp;</a>



																@endif
					                                        </div>

					                                        @else
					                                        <div class="pull-right upload_a">
																@if($channel->no_of_subscribers > 0)

																<a class="st_video_upload_btn subscribe_btn " href="{{route('user.channel.subscribers', array('channel_id'=>$channel->channel_id))}}" style="color: #fff !important;text-decoration: none"><i class="fa fa-users"></i>&nbsp;Enroled &nbsp; {{$channel->no_of_subscribers}} </a>

																@endif
															</div>
															@endif
				                                        
				                                        
				                                        @endif

				                                        <!--end of cross-mark-->                       
				                                    </div> <!--end of history-head--> 

				                                    <div class="description hidden-xs">
				                                    </div><!--end of description--> 

				                                   	                                                  
				                                </div><!--end of history-title--> 
				                                
				                            </div><!--end of main-history-->

				                            <div class="clearfix"></div>
				                        </li>    
                                        @endif
				                        @endforeach
				                       
				                    </ul>

				                @else

				                @if(Auth::user())
					                @if(!Auth::user()->user_type)

					                	<p><small><b>{{tr('notes_for_channel')}}</b></small></p>
					                @endif
					            @endif
				                   <!-- <p style="color: #000">{{tr('no_channel_found')}}</p> -->
				                   <img src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">

				                @endif

				                @if(count($response->channels) > 0)

				                    @if($response->channels)
				                    <div class="row">
				                        <div class="col-md-12">
				                            <div align="center" id="paglink"><?php echo $response->pagination; ?></div>
				                        </div>
				                    </div>
				                    @endif
				                @endif

			@endforeach

			
			@endforeach

			@else
            <img id="demo"  src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">
            @endif
		

    </div>
</div>
</div>

			 
		</div>

	</div>
</div>

@endsection