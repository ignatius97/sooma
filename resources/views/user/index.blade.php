@extends('layouts.user')

@section('styles')

<style type="text/css">

    
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


.main_video{

    margin-right: 35px;
}


@media only screen and (max-width : 1200px) {

   .main_video{

    width: 80%;
    margin-right: 2px;
    margin-left: 35px;
   }

    }

     @media only screen and (min-width : 760px) {

   .box-head h3{

    font-size: 1.3vw;
   }

    }
</style>
@endsection

    
@section('content')

    <div class="y-content">
       
        <div class="row content-ro">

        @include('layouts.user.nav')

            <div class="page-inner ">
                <div class="row">
                <div class="main_video">
  
    <!-- Wrapper for slides -->
    
    
     <div id='video-slider' style="margin-top: 1%;">
        <div class="slider-inner">
            <ul>
                <li>
                    <div class="video">
                        <video autoplay controls width="70%">
                            <source src="{{asset('streamtube/images/movie.mp4')}}" type="video/mp4" />
                        </video>
                </li>  
            </ul>
        </div>
    </div>
   
   
    


</div>
                </div>




                @if(Setting::get('is_banner_video'))


                @if(count($banner_videos) > 0)

                <div class="row" id="slider">
                    <div class="col-md-12 banner-slider">
                        <div id="myCarousel" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach($banner_videos as $key => $banner_video)
                                <div class="{{$key == 0 ? 'active item' : 'item'}}" data-slide-number="{{$key}}">
                                    <a href="{{route('user.single' , $banner_video->video_tape_id)}}"><img src="{{$banner_video->image}}" style="height:250px;width: 100%;">
                                    
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <!-- Controls-->
                           <!--  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">{{tr('previous')}}</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">{{tr('next')}}</span>
                            </a> -->

                        </div>
                    </div>
                </div>

                @endif

                @endif

                @if(Setting::get('is_banner_ad'))

                @if(count($banner_ads) > 0)

                <div class="row" id="slider">
                    <div class="col-md-12 banner-slider">
                        <div id="myCarousel" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach($banner_ads as $key => $banner_ad)

                                <div class="{{$key == 0 ? 'active item' : 'item'}}" data-slide-number="{{$key}}" style="background-image: url({{$banner_ad->image}});">
                                    <a href="{{$banner_ad->link}}" target="_blank">

                                        <div class="carousel-caption">

                                            <h3>{{$banner_ad->video_title}}</h3>

                                            <div class="clearfix"></div>

                                            <p class="hidden-xs">@if($banner_ad->content) <?= strlen($banner_ad->content) > 200 ? substr($banner_ad->content , 0 , 200).'...' :  substr($banner_ad->content , 0 , 200)?> @endif</p>
                                        </div>
                                    </a>
                                </div>

                                @endforeach
                            </div>

                            <!-- Controls-->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">{{tr('previous')}}</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">{{tr('next')}}</span>
                            </a>
                        </div>
                    </div>
                </div>

                @endif

                @endif

                @include('notification.notify')

                <!-- wishlist start -->

                @include('user.home._wishlist')

                <!-- wishlist end -->

               

                @if(count($trendings->items) > 0)

                <hr>

                    <div class="slide-area ">
                         
                        <div class="box-head">
                            <h3>{{tr('trending')}}</h3>
                        </div>

                        

                        <div class="box">

                            <div class="trending_new_show" style="display: none;">
                           </div>
                            
                            @foreach($trendings->items as $trending)
                            <div class="trending_new_hide">
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
                                        <a href="{{$trending->url}}">{{$trending->title}}</a>
                                    </div>
                                    
                                    <span class="video_views">
                                        <div><a href="{{route('user.channel',$trending->channel_id)}}">{{$trending->channel_name}}</a></div>
                                        <div class="hidden-mobile"><i class="fa fa-eye"></i> {{$trending->watch_count}} {{tr('views')}} <b>.</b> 
                                        {{$trending->publish_time}}</div>
                                    </span>
                                </div><!--end of video-details-->
                            </div><!--end of slide-box-->
                              </div> 
                            @endforeach
                   
                          
                        </div><!--end of box--> 
                    </div><!--end of slide-area-->

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



        $('.country_option_select').on('change', function (e){

            var country=this.value;

            $('.curriculum_show').html('');

            console.log(country);
           $.ajax(
             {
                url: 'curriculum_country_select/'+country,
                type: 'get',
                dataType: 'json',

                success: function(data){
                   
                      console.log(data);
                     var len = 0;

                     $('.hide_title').hide();

                     var template='<span style="text-align: center;"> <img id="img-country"   class="slide-img1 placeholder" id="img" src=""/> </span>Curriculum Based Learning ';

                     $('.show_title').html(template);

                     document.querySelector('#img-country').src=data.country.picture;

                     $('.show_title').show();


                     //curriculum logic
                     
                     if(data.curriculum.length<1){
                    var no_result_template='<h2>No Curriculum, check latter';
                    $('.curriculum_hide').hide();
                    $('.curriculum_show').html(no_result_template);
                     }

            
               
                    
                     $.each(data.curriculum, function(key,items) {
                       //var url=` route('user.curriculum.selection', ['curriculum_id'=>${items.id}, 'country_id'=>${data.country.id}]`; 
                        
                          
                       var template_curriculum=' <a class="hide_me"  href="country-curriculum/selection?curriculum_id='+items.id+'&country_id='+data.country.id+' style="margin-top:1px;">'

                       template_curriculum+='<li id="hom" title="'+items.name+'" style="margin-left: 20px; margin-top:0;">'

                        template_curriculum+=' <img   class="slide-img1 placeholder" id="img" src="'+items.picture+'"  />' 
                        template_curriculum+='<h6 style="display: inline-grid;vertical-align: bottom; color: black; font-size: 15px;" >'+items.name+'</h6>'
                        template_curriculum+='</li>'
                        template_curriculum+='</a>'

                        $('.curriculum_hide').hide();

                        $('.curriculum_show').append(template_curriculum);
                    
                    

                     })

                       if(data.trending_videos_country<1){
                        var no_result_template='<h2>No Videos, check latter';
                        $('.trending_new_hide').hide();
                        $('.trending_new_show').show();
                         $('.trending_new_show').html(no_result_template);  

                       }
               
                      $.each(data.trending_videos_country, function(key,video_items) {

                        var video_detail_template='<div class="slide-box">'
                        video_detail_template+='<div class="slide-image">'

                        video_detail_template+='<a href="video/'+video_items.id+'">'
                        video_detail_template+=' <img src="'+video_items.default_image+'" class="slide-img1 '
                        video_detail_template+='placeholder" />   </a>'
                        video_detail_template+='<div class="video_mobile_views">'
                        video_detail_template+=''+video_items.watch_count+' Views'
                        video_detail_template+='</div>'
                        video_detail_template+='<div class="video_duration">'
                        video_detail_template+=''+video_items.duration+''
                        video_detail_template+='</div>'
                        video_detail_template+=' </div>'
                        video_detail_template+='<div class="video-details"> <div class="video-head">'
                        video_detail_template+='<a href="video/'+video_items.id+'">'
                        video_detail_template+=''+video_items.title+' </a></div><span class="video_views"> <div>'
                        video_detail_template+='<a href="channel/'+video_items.channel_id+'">'
                        video_detail_template+=''+video_items.channel_name+' </a> </div>'
                        video_detail_template+='<div class="hidden-mobile"><i class="fa fa-eye"></i> '
                        video_detail_template+=''+video_items.watch_count+' Views <b>.</b>'
                        video_detail_template+=''+video_items.publish_time+' </div> </span>  </div>'
                        video_detail_template+=' </div>'
                       
                         $('.trending_new_hide').hide();
                         $('.trending_new_show').show();
                         $('.trending_new_show').append(video_detail_template);            
                                                       

                    
                           })
                   

                    



                if(data != null){
               len = data.length;
             }


             console.log(len);

             if(len > 0){

               $('.curriculum').children('option').remove();

                for(var i=0; i<len; i++){

                 
                 var name = data[i].name;
                 var curr_id=data[i].curriculum_id;


                 var option = "<option value='"+curr_id+"'>"+name+"</option>"; 

                 $(".curriculum").append(option); 
               }


             }

                }
             }
            )
        })
</script>
@endsection