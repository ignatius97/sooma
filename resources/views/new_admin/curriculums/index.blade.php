@extends('layouts.admin') 

@section('title', 'Countries') 

@section('content-header') 

@if(isset($user)) 


@endif

@endsection 

@section('breadcrumb')
	 
	<li class="active"><i class="fa fa-suitcase"></i>Curriculums</li>
@endsection 

@section('content')

<div class="row">

    <div class="col-xs-12">

        @include('notification.notify')

        <div class="box box-primary">

            <div class="box-header label-primary">

                <b style="font-size:18px;">Curriculum</b>
                <a href="{{ route('admin.curriculums.create') }}" class="btn btn-default pull-right">Add Curriculum</a>

            </div>
            <div class="box-body table-responsive">

                @if(count($curriculum_details) > 0)

                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Country</th>
                            <th>Curriculum</th>
                            <th>date created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($curriculum_details as $i => $channel_details)

	                        <tr>
	                            <td>{{ $i+1 }}</td>

	                            <td><a target="_blank" href="">{{ $channel_details->country }}</a></td>

	                            <td><a target="_blank" href="">{{ $channel_details->name }}</a></td>
                                
                                <td><a target="_blank" href="">{{ $channel_details->created_at }}</a></td>

	                            <td>
	                                <ul class="admin-action btn btn-default">

	                                    <li class="{{ $i <=2 ? 'dropdown' : 'dropup' }}">

	                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
									           {{ tr('action') }} <span class="caret"></span>
									        </a>
	                                        <ul class="dropdown-menu">


                                                @if(Setting::get('admin_delete_control') == YES)
                                                
                                                    <li role="presentation"><a role="button" href="javascript:;" class="btn disabled" style="text-align: left">{{ tr('edit') }}</a></li> 

                                                    <li role="presentation"><a role="button"  href="javascript:;" class="btn disabled" style="text-align: left" onclick="return confirm(&quot;{{ tr('admin_channel_delete_confirmation', $channel_details->name) }}&quot;)" >{{ tr('delete') }}</a></li> 
                                                    
                                                @else

                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('admin.curriculum.edit' , ['channel_id' => $channel_details->id] ) }}">{{ tr('edit') }}</a></li> 

                                                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="return confirm(&quot;{{ tr('admin_channel_delete_confirmation', $channel_details->name) }}&quot;)" href="{{ route('admin.curriculum.delete' , ['channel_id' => $channel_details->id] ) }}">{{ tr('delete') }}</a></li>

                                                @endif
                                        
	                                        </ul>

	                                    </li>

	                                </ul>

	                            </td>

	                        </tr>

                        @endforeach

                    </tbody>

                </table>

                @else

                	<h3 class="no-result">{{ tr('no_result_found') }}</h3> 

                @endif

            </div>

        </div>

    </div>

</div>


@endsection