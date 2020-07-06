<!DOCTYPE html>
<html>

<head>
    <title>@if(Setting::get('site_name')) {{Setting::get('site_name') }} @else {{tr('site_name')}} @endif</title>  
    <meta name="robots" content="noindex">
    
    <meta name="viewport" content="width=device-width,  initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @include('layouts.user.sub-layouts.head')
</head>

<body>

    <div class="wrapper_content">

        @include('layouts.user.header')

        <div class="common-streamtube">

            @yield('content')

        </div>

        @include('layouts.user.footer')

    </div>
    
    @include('layouts.user.sub-layouts.scripts')

</body>

</html>