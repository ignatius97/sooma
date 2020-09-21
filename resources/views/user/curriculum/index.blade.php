@extends('layouts.user')

@section('styles')

<style type="text/css">
@media only screen and (max-width : 910px) {
    #demo{
        height: 180px;
    }
}
    
.list-inline {
  text-align: center;
}
.list-inline > li {
  margin: 10px 5px;
  padding: 0;
}
.list-inline > li:hover {
  cursor: pointer;
}
.list-inline .selected img {
  opacity: 1;
  border-radius: 15px;
}
.list-inline img {
  opacity: 0.5;
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
}
.list-inline img:hover {
  opacity: 1;
}

.item > img {
  max-width: 100%;
  height: auto;
  display: block;
}

.carousel-inner .active {

    background-color: none;
}

.carousel-inner .item {

    padding: 0px;

}
</style>
@endsection

    
@section('content')

    <div class="y-content">
       
        <div class="row content-ro">

        @include('layouts.user.nav')

            <div class="page-inner col-xs-12 col-sm-12 col-md-8">
                <div class="row">
                <div class="container">
  
    <!-- Wrapper for slides -->


</div>
                </div>

               
               

                <hr>
                  @if(count($class) > 0)
                   @foreach($class as $class)

                    <div class="slide-area">
                        <div class="box-head">
                            <h3>{{$class->class_name}}</h3>
                        </div>

                        <div class="box">

                             @if(count($trendings->items) > 0)

                            @foreach($trendings->items as $trending)


                           @if($trending->class_name==$class->class_name)
                             

                            <div class="slide-box">
                                <div class="slide-image">
                                    <a href="{{ route('user.single' , ['id' => $trending->url, 'dd'=>$trending->url] ) }}">
                                        <!-- <img src="{{$trending->video_image}}" /> -->
                                        <!-- <div style="background-image: url({{$trending->video_image}});" class="slide-img1"></div> -->
                                        <img src="{{asset('streamtube/images/placeholder.gif')}}" data-src="{{$trending->video_image}}" class="slide-img1 placeholder" />
                                    </a>

                                    @if($trending->ppv_amount > 0)

                                        @if(!$trending->ppv_status)

                                            <div class="video_amount">

                                            {{tr('pay')}} - {{Setting::get('currency')}}{{$trending->ppv_amount}}

                                            </div>
                                        @endif
                                    @endif
                                    <div class="video_mobile_views">
                                        {{$trending->watch_count}} {{tr('views')}}
                                    </div>
                                    <div class="video_duration">
                                        {{$trending->duration}}
                                    </div>
                                </div><!--end of slide-image-->

                                <div class="video-details">
                                    <div class="video-head">
                                        <a href="{{ route('user.single' , ['id' => $trending->url, 'dd'=>$trending->url] ) }}">{{$trending->title}}</a>
                                    </div>
                                    
                                    <span class="video_views">
                                        <div><a href="{{route('user.channel',$trending->channel_id)}}">{{$trending->channel_name}}</a></div>
                                        <div class="hidden-mobile"><i class="fa fa-eye"></i> {{$trending->watch_count}} {{tr('views')}} <b>.</b> 
                                        {{$trending->publish_time}}</div>
                                    </span>

                                </div><!--end of video-details-->
                            </div><!--end of slide-box-->
                            @else
                            
                            <img id="demo"  src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">
                             
                            @endif


                            @endforeach
                            @else
                              <img id="demo"  src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">
                              @endif
                         
                        </div><!--end of box--> 
                    </div><!--end of slide-area-->

                    @endforeach

                    @else

                     <img id="demo"  src="{{asset('images/no-result.jpg')}}" class="img-responsive auto-margin">
               
                     @endif
             
                <div class="sidebar-back"></div>  
            </div>

        </div>
    </div>

@endsection

@section('scripts')


<script type="text/javascript">
$('#myCarousel').carousel({
    interval: 3500
});

 

// This event fires immediately when the slide instance method is invoked.
$('#myCarousel').on('slide.bs.carousel', function (e) {
    var id = $('.item.active').data('slide-number');
        
    // Added a statement to make sure the carousel loops correct
        if(e.direction == 'right'){
        id = parseInt(id) - 1;  
      if(id == -1) id = 7;
    } else{
        id = parseInt(id) + 1;
        if(id == $('[id^=carousel-thumb-]').length) id = 0;
    }
  
    $('[id^=carousel-thumb-]').removeClass('selected');
    $('[id=carousel-thumb-' + id + ']').addClass('selected');
});

// Thumb control
$('[id^=carousel-thumb-]').click( function(){
  var id_selector = $(this).attr("id");
  var id = id_selector.substr(id_selector.length -1);
  id = parseInt(id);
  $('#myCarousel').carousel(id);
  $('[id^=carousel-thumb-]').removeClass('selected');
  $(this).addClass('selected');
});
</script>
@endsection