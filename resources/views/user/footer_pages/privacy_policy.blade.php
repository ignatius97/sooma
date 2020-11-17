@extends('layouts.user.footerPagesLayout')

@section('content')

<Style>
    .common-form {
    max-width: 90%;
}
.text{
    font-size: 11px;
}

</Style>

<div class="login-space">

    <div class="common-form login-common text-center">



        @include('notification.notify')

        <div class="signup-head">
            <h3 style="margin-bottom: 0px;">Privacy Policy</h3>
        </div><!--end  of signup-head-->
          
    </div><!--end of common-form-->  
    <div class="common-form login-common" style="margin-top: 10px !important; margin-bottom: 31px;">
        <img style="width: 50%;display: block;margin-left: auto;margin-right: auto;" src="{{asset('prototype_icons/underConstruction.jpg')}}" alt="" srcset="">
        <div><h2 style="text-align:center;">Comming Soon!</h2></div>
    
    </div>  

</div><!--end of form-background-->

@endsection

@section('scripts')

<script src="{{asset('assets/js/jstz.min.js')}}"></script>
<script>
    
    $(document).ready(function() {

        var dMin = new Date().getTimezoneOffset();
        var dtz = -(dMin/60);
        // alert(dtz);
        $("#userTimezone").val(jstz.determine().name());
    });

</script>

@endsection
