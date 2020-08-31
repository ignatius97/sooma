@extends('layouts.admin')

@section('title', 'Add Country')

@section('content-header', 'Country')

@section('breadcrumb')
    <li><a href="{{route('admin.channels.index')}}"><i class="fa fa-suitcase"></i>Country</a></li>
    <li class="active">Add country</li>
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        @include('notification.notify')

        <div class="box box-primary">

            <div class="box-header label-primary">
                <b style="font-size:18px;">Add Country</b>
                <a href="{{ route('admin.channels.index') }}" class="btn btn-default pull-right">Country</a>
            </div>

			@include('new_admin.country._form')

        </div>

    </div>

</div>



@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection