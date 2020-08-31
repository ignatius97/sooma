@extends('layouts.admin')

@section('title', 'Add Curriculum')

@section('content-header', 'Curriculum')

@section('breadcrumb')
    <li><a href="{{route('admin.channels.index')}}"><i class="fa fa-suitcase"></i>Curriculum</a></li>
    <li class="active">Add curriculum</li>
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        @include('notification.notify')

        <div class="box box-primary">

            <div class="box-header label-primary">
                <b style="font-size:18px;">Add Curriculum</b>
                <a href="{{ route('admin.channels.index') }}" class="btn btn-default pull-right">Curriculum</a>
            </div>

			@include('new_admin.curriculums._form')

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