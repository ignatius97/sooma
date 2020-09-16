@extends('layouts.admin')

@section('title', 'Add Class')

@section('content-header', 'Class')

@section('breadcrumb')
    <li><a href="{{route('admin.channels.index')}}"><i class="fa fa-suitcase"></i>CLass</a></li>
    <li class="active">Add Class</li>
@endsection

<style type="text/css">
    
    .dynamic_cur{
        display: none;
    }

    .main_cur{
        display: none;
    }
</style>

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

   

    <script type="text/javascript">
        
        $('#user_id').on('change', function (e){

            var country=e.target.value;

            console.log(country);
           $.ajax(
             {
                url: 'curriculum_select_data/'+country,
                type: 'get',
                dataType: 'json',

                success: function(data){
                    console.log(data);

                     var len = 0;




                if(data != null){
               len = data.length;
             }


             console.log(len);

             if(len > 0){

               $('.curriculum').children('option').remove();

                for(var i=0; i<len; i++){

                 
                 var name = data[i].name;
                 var curr_id=data[i].curriculum_id;


                 var option = "<option value='"+curr_id+"'>"+name+"</option>"; 

                 $(".curriculum").append(option); 
               }


             }

                }
             }
            )
        })
    </script>



    <script type="text/javascript">
        
        $('.curriculum').on('change', function (e){

            var country=e.target.value;

            console.log(country);
          
        })
    </script>
@endsection