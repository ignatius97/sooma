@extends('layouts.admin')

@section('title', 'Add Class')

@section('content-header', 'Class')

@section('breadcrumb')
    <li><a href="{{route('admin.channels.index')}}"><i class="fa fa-suitcase"></i>CLass</a></li>
    <li class="active">Add Class</li>
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        @include('notification.notify')

        <div class="box box-primary">

            <div class="box-header label-primary">
                <b style="font-size:18px;">Add Class</b>
                <a href="{{ route('admin.channels.index') }}" class="btn btn-default pull-right">Curriculum</a>
            </div>

			@include('new_admin.classes._form')

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