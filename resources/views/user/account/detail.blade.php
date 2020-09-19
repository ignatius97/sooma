
@extends('layouts.user')
@section('styles')
<style type="text/css">
.history-image{ 
    width: 30% !important;
}
.history-title {
    width: 65% !important;
}
</style>

<link rel="stylesheet" href="{{asset('admin-css/plugins/datepicker/datepicker3.css')}}">

@endsection


@section('content')

<div class="y-content">
    
    <div class="row y-content-row">

        @include('layouts.user.nav')

        <div class="page-inner col-sm-9 col-md-10 profile-edit" style="margin-left: 35vw;">

            <div class="profile-content slide-area1">
               
                <div class="row no-margin">

                    @include('notification.notify')

                    <div class="col-sm-12 col-md-7 col-lg-6 profile-view">
                        
                        <h2 class="mylist-head" style="text-align: center; font-size: 30px;">{{tr('edit_infromation')}}</h2>
                       
                        <div class="edit-profile profile-view">
                            
                            <div class="edit-form profile-bg">
                                
                                <div class="image-profile edit-image">
                                    @if(Auth::user()->picture)
                                        <img src="{{Auth::user()->picture}}" id="img_profile">
                                    @else
                                        <img src="{{asset('placeholder.png')}}" id="img_profile">
                                    @endif    
                                   
                                   <p class="help-block">{{tr('image_validate')}} {{tr('image_square')}}</p>
                                </div><!--end of image-profile-->

                                <div class="editform-content"> 
                                    
                                    <form  action="{{ route('user.update.more_infromation') }}" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="exampleInputFile">{{tr('upload_image')}}</label>
                                            <input type="file" name="picture" class="form-control-file" accept="image/png, image/jpeg" id="exampleInputFile" aria-describedby="fileHelp" onchange="loadFile(this,'img_profile')">
                                            <p class="help-block">{{tr('image_validate')}} {{tr('image_square')}}</p>
                                        </div>

                                        @if(Auth::user()->login_by == 'manual')


                                        @endif
                                       

                                        <?php

                                        if (!empty(Auth::user()->dob) && Auth::user()->dob != "0000-00-00") {

                                            $dob = date('d-m-Y', strtotime(Auth::user()->dob));

                                        } else {

                                            $dob = "00-00-0000";
                                        }

                                        ?>

                                        <div class="form-group">
                                            <label for="dob">{{tr('dob')}}</label>
                                            <input type="text" value="{{old('dob') ?: $dob }}" name="dob" class="form-control" placeholder="{{tr('enter_dob')}}" maxlength="13" id="dob" readonly>
                                        </div>

                                        <input type="text" name="users_role" value="Teacher" hidden>

                                        <div class="form-group">
                                            <label for="users_role">{{tr('users_role')}}:  </label>
                                            <select name="users_role"  style="margin-left: 2%; width: 30%;">
                                                  <option value="{{Auth::user()->study_role}}">{{Auth::user()->study_role}}</option>
                                                  <option value="Teacher">Teacher</option>
                                                  <option value="Student">Student</option>  
                                                </select>
                                         </div>

                                         <div class="form-group">
                                            <label for="gender">Gender:  </label>
                                            <select name="gender"  style="margin-left: 2%; width: 30%;">
                                                  <option value="male">M</option>
                                                  <option value="female">F</option>  
                                                </select>
                                         </div>
                                              
                                        <div class="form-group">
                                            <label for="about">{{tr('about_me')}}</label>
                                            <textarea name="description" class="form-control" id="about" rows="3">{{old('description') ?: Auth::user()->description}}</textarea>
                                        </div>
                                              
                                        <div style="margin-left: 12vw; display: inline; width: 25px;">
                                            <button type="submit" class="btn btn-info">{{tr('submit')}}</button>
                                            <button type="submit" class="btn btn-info" style="margin-left: 12vw;"><a style="color: white;" href="{{ url('/') }}"> skip </a></button>
                                        </div>                                              

                                    </form>

                                </div><!--end of editform-content-->
                                    
                            </div><!--end of edit-form-->                           
                        
                        </div><!--end of edit-profile-->
                    
                    </div><!--profile-view end-->  
                    
                    @if(count($wishlist->items) > 0)
                        
                        <div class="mylist-profile col-sm-12 col-md-5 col-lg-6">
                            
                            <h4 class="mylist-head">{{tr('wishlist')}}</h4>

                            <ul class="history-list profile-history">

                                @foreach($wishlist->items as $i => $video)

                                    <li class="sub-list row no-margin">
                                        
                                        <div class="main-history">
                                            
                                            <div class="history-image">
                                                
                                                <a href="{{$video->url}}">
                                                    <img src=" {{asset('streamtube/images/placeholder.gif')}}" data-src="{{$video->video_image}}" class="placeholder">
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
                                            
                                            </div><!--history-image-->

                                            <div class="history-title">
                                                <div class="history-head row">
                                                    <div class="cross-title1">
                                                        <h5><a href="{{$video->url}}">{{$video->title}}</a></h5>
                                                         <span class="video_views">
                                                            <div><a href="{{route('user.channel',$video->channel_id)}}">{{$video->channel_name}}</a></div>
                                                            <i class="fa fa-eye"></i> {{$video->watch_count}} {{tr('views')}} 
                                                            <b>.</b> 
                                                            {{ common_date($video->created_at) }}
                                                        </span>
                                                    </div> 
                                                    <div class="cross-mark1">
                                                        <a onclick="return confirm( &nbsp;{{tr('user_wishlist_delete_confirm',$video->title)}} &nbsp; );" href="{{route('user.delete.wishlist' , array('video_tape_id' => $video->video_tape_id))}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div><!--end of cross-mark-->                       
                                                </div> <!--end of history-head--> 

                                            

                                                <span class="stars">
                                                    <a><i @if($video->ratings >= 1) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a><i @if($video->ratings >= 2) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a><i @if($video->ratings >= 3) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a><i @if($video->ratings >= 4) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a><i @if($video->ratings >= 5) style="color:#ff0000" @endif class="fa fa-star" aria-hidden="true"></i></a>
                                                </span>                                                       
                                            </div><!--end of history-title--> 
                                        </div><!--end of main-history-->
                                    </li>

                                @endforeach

               
                            </ul>                                
                        
                        </div><!--end of mylist-profile-->

                    @endif

                </div><!--end of profile-content row-->
            
            </div>

            <div class="sidebar-back"></div> 
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{asset('admin-css/plugins/datepicker/bootstrap-datepicker.js')}}"></script> 


<script type="text/javascript">


var max_age_limit = "{{Setting::get('max_register_age_limit' , 18)}}";

max_age_limit = max_age_limit ? "-"+max_age_limit+"y" : "-15y";

$('#dob').datepicker({
    autoclose:true,
    format : 'dd-mm-yyyy',
    endDate: max_age_limit,
});


function loadFile(event, id){
    // alert(event.files[0]);
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById(id);
      output.src = reader.result;
       //$("#imagePreview").css("background-image", "url("+this.result+")");
    };
    reader.readAsDataURL(event.files[0]);
}
</script>

@endsection