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
                <a href="">
                    <div style=" margin-bottom:10px; margin-top:3%; float:right; color:black; display:inline-block;">
                        <button class="btn btn-primary">
                            All Assignments
                        </button>
                    </div>
                </a>
                <hr>
                <p>{{$assignment->text}}</p>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <hr>

                @endforeach
                
               

                <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                    <div style="display: inline-block;">
                        <img class="profile-image" src=" ">
                    </div>
                    <div class="form-group" style="display: inline-block; ">
                        <p>Student's Name</p>
                    </div>
                    <div style="border:1px solid black; color:black; margin:-1rem 0 2rem 3rem; height:5.5rem;padding:1rem 4rem;">
                        File Name 
                        &nbsp&nbsp&nbsp&nbsp
                        <button class="btn">download</button>
                    </div>
                </div>

                <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                    <div style="display: inline-block;">
                        <img class="profile-image" src=" ">
                    </div>
                    <div class="form-group" style="display: inline-block; ">
                        <p>Student's Name</p>
                    </div>
                    <div style="border:1px solid black; color:black; margin:-1rem 0 2rem 3rem; height:5.5rem;padding:1rem 4rem;">
                        File Name 
                        &nbsp&nbsp&nbsp&nbsp
                        <button class="btn">download</button>
                    </div>
                </div>



            </div>
        </div>
    </div>        