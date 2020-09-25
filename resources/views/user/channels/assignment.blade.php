@extends('layouts.user')

@section( 'styles' )

    <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/custom-style.css')}}">

    <style>
   
        
        .payment_class {
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 38px;
            line-height: 19px;
            padding: 0 !important;
            font-weight: bolder !important;
        }
        
        .switch {
            display: inline-block;
            height: 23px;
            position: relative;
            width: 45px;
            vertical-align: middle;
        }
        
        .switch input {
            display: none;
        }
        
        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: all 0.4s ease 0s;
        }
        
        .slider::before {
            background-color: white;
            bottom: 4px;
            content: "";
            height: 16px;
            left: 0px;
            position: absolute;
            transition: all 0.4s ease 0s;
            width: 16px;
        }
        
        input:checked + .slider {
            background-color: #51af33;
        }
        
        input:focus + .slider {
            box-shadow: 0 0 1px #2196f3;
        }
        
        input:checked + .slider::before {
            transform: translateX(26px);
        }
        
        .slider.round {
            border-radius: 34px;
        }
        
        .slider.round::before {
            border-radius: 50%;
        }
    </style>

@endsection 

@section('content')

    <div class="y-content" style="">

        <div class="row content-row">

          @include('layouts.user.nav')

            <div class="page-inner col-sm-9 col-md-8 ">
                @foreach($assignment as $assignment)
                <div style=" margin-bottom:10px; margin-top:3%; color:black; display:inline-block; ">
                    <P>{{$assignment->title}}<br/> <small>{{$assignment->created_at}}</small></P>
                </div>
               
                <hr>
                <p>{{$assignment->text}}</p>
                <br/>
                <br/>
                     @if($assignment->file=='No')

                     <div style="text-align: center;">
                         <h3>No file attached for the assignment</h3>
                     </div>
                     @else
                    <div style=" margin-bottom:10px; margin-top:3%; float:right; color:black; ">
                        <a href="{{ route('user.assignment.download', ['file'=>$assignment->file]) }}">
                        <button class="btn btn-primary">
                            download assignment
                        </button>

                        </a>
                        <div style="margin-top: 20px;">

                        <form  name="student_answer_form" method="post" action="{{route('user.assignment_answer_upload.save')}}" enctype="multipart/form-data">
                              <label>Upload Answer</label>
                               <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
                             
                               <input id="myInput" type="file" name="assignment_answer"> 
                                <button class="btn btn-primary show_btn" style="display: none;">
                                submit
                                </button>
                            </form>
                            
                        </div>
                    </div>

                    @endif
              
        

                @endforeach

               @if(count($answer)>0)
               @foreach($answer as $answer)
                <div style=" margin-bottom:10px; margin-top: 15%; color:black;">

                    <h3>Uploaded Answer </h3>
                    <div style="border: 1px solid black;">
                    
                    <div style=" color:black; margin:1rem 0 1rem 1rem; ">
                        
                         <p>File Name: {{$answer->file}}</p>
                    </div>
                    <div style=" color:black; margin:1rem 0 1rem 1rem; ">
                        
                         <p>Date uploaded: {{$answer->created_at}}</p>
                    </div>
                    </div>

                @endforeach
                @else
                <div style=" margin-bottom:10px; margin-top: 15%; color:black;">
                <h3>No answer uploaded</h3>
                </div>

                @endif



                </div>

                
                


            </div>
        </div>
    </div> 


@endsection 

@section('scripts')


<script type="text/javascript">
        

        $("#myInput").change(function(){

             var edit_success =document.querySelector('.show_btn');
             edit_success.style.display='block';
            
        });
   
      jQuery("form[name='student_answer_form']").submit(function(e) {
   
           //prevent Default functionality
           e.preventDefault();
   
           //get the action-url of the form
           var actionurl = e.currentTarget.action;
   
           var form_data =new FormData($(this)[0]);
   
           if(form_data) {
   
               $("#class_assignment_edit_btn").html("Sending...");
   
               $("#class_assignment_edit_btn").attr('disabled', true);
   
   
               //do your own request an handle the results
               jQuery.ajax({
                   url: actionurl,
                   type: 'post',
                   dataType: 'json',
                   processData: false,
                   contentType: false,
                   data: form_data,
                   success: function(data) {
                    console.log(data);

                       
   
                       $("#class_assignment_edit_btn").html("Comment");
   
                       $("#class_assignment_edit_btn").attr('disabled', false);

                      
                   }
               });
           } else {
   
               alert("Please fill the comment field");
   
               return false;
   
           }
   
       });
   
    </script>



@endsection 
       