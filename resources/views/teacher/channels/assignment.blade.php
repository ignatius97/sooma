@extends( 'layouts.teacher.user_teacher' ) 

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

            @include('layouts.teacher.nav_teacher')
            @foreach($assignment as $assignment)
            <div class="page-inner col-sm-9 col-md-8 ">
                <div style=" margin-bottom:10px; margin-top:3%; color:black; display:inline-block; ">
                    <P>{{$assignment->title}} <br/> <small>{{$assignment->created_at}}</small></P>
                </div>
               
                <hr>
                <p>{{$assignment->text}}</p>
                <br/>
                <br/>
                
               
                <hr>

                @endforeach
                <div style="text-align: center; margin-bottom: 6px;">      


                  <a href="{{ route('user.assignment.edit', ['assignment_id'=>$assignment_id]) }}">
                  
                        <button class="btn btn-primary">
                            Edit
                        </button>
                 
                   </a>

                 <a href="{{ route('user.assignment.delete', ['assignment_id'=>$assignment_id, 'channel_id'=>$channel_id])}}"  style="margin-left: 50px;">
                 
                        <button class="btn btn-primary">
                            Delete
                        </button>
            
                  </a>
                </div>
               

               <div>
                   
                   <h4>Answers Uploaded</h4>

               </div>
                @if(count($answers)>0)
                @foreach($answers as $answer)
                <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                    <div style="display: inline-block;">
                        <img class="profile-image" src="{{$answer->chat_picture}} ">
                    </div>
                    <div class="form-group" style="display: inline-block; ">
                        <p>{{$answer->name}}</p>
                    </div>
                    <div style="border:1px solid black; color:black; margin:-1rem 0 2rem 3rem; height:5.5rem;padding:1rem 4rem;">
                        {{$answer->file}}
                        &nbsp&nbsp&nbsp&nbsp
                        <a href="{{ route('user.assignment.download', ['file'=>$answer->file]) }}">
                        <button class="btn">download</button>
                        </a>
                    </div>


                </div>
                @endforeach

                @else
                 <div style="padding: 10px; margin-bottom:10px; color:black;">

                    <h3>No answers  uploaded for the assignment</h3>

                 </div>
                 @endif

                <hr>
                <div style="text-align: center;">
                    <button class="btn btn-primary">View All Answers</button>
                </div>

                </div>


            </div>


        </div>
    </div>        

   












