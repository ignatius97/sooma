<!DOCTYPE html>
<html>

<head>
    <title>@if(Setting::get('site_name')) {{Setting::get('site_name') }} @else {{tr('site_name')}} @endif</title>  
    <meta name="robots" content="noindex">
    
    <meta name="viewport" content="width=device-width,  initial-scale=1">

    <link href="video_audio_slider/video_audio_slider.css" rel="stylesheet" type="text/css" />
    
    @include('layouts.user.sub-layouts.head')
</head>



<body>

    <div class="wrapper_content">

        @include('layouts.teacher.header-teacher')

        <div class="common-streamtube">

            @yield('content')

        </div>

        @include('layouts.user.footer')

    </div>


    
    @include('layouts.user.sub-layouts.scripts')



    <script type="text/javascript">
    
    $("#options").change(function(){
        this.form.submit();
    });
   </script>

   

</body>

</html>
