
<meta name="description" content="{{Setting::get('meta_description')}}">

<meta name="author" content="{{Setting::get('meta_author')}}">

<meta name="keywords" content="{{Setting::get('meta_keywords')}}">

<link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/bootstrap/css/jquery-ui.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/fonts/font-awesome/css/font-awesome.min.css')}}">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> 

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/slick.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/slick-theme.css')}}"/>

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/style.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/responsive1.css')}}">

<link rel="stylesheet" href="{{ asset('admin-css/plugins/select2/select2.min.css')}}">

<link rel="shortcut icon" type="image/png" href="{{Setting::get('site_icon' , asset('img/favicon.png'))}}"/>

<style type="text/css">
    
    .ui-autocomplete{
        z-index: 99999;
    }

    .contact{
    	margin-top: 0px !important;
    	text-align: center;
    	color: red;
    
    }
    .popular_class_title{
    
    	margin-left: 15px;
    	margin-top: 0px !important;
    	font-weight: bold !important;
    }

    #hom a{
    	margin-top: 5px;
    	padding: 0px;
    	margin-left: 10px;

    }
    

    .view_to_end{
    	margin-left: 5%;
    }
    .my_bg_color{
    	background-color: white !important;
    	margin-right: 15px;

    }
    .sooma_header{
    	margin-top: 20px;
    	padding-top: 10px;
    }

    .sooma_color{
    	color: brown;
    }
    .sign_up_btn{
    	margin-bottom: 10px;
    	margin-left: 40px;
    }
</style>

@yield('meta_tags')

@yield('styles')

<?php echo Setting::get('google_analytics') ?: ""; ?>

<?php echo Setting::get('header_scripts') ?: "" ?>