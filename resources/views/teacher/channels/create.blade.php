@extends('layouts.user_teacher')

@section('styles')

<!-- Add css file and inline css here -->
<link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/custom-style.css')}}"> 

<style type="text/css">

.form-control {

	border-radius: 0px;
}

</style>

@endsection 


@section('content')

@include('teacher.channels._form')

@endsection

