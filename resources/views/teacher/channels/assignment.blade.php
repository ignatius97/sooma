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
        .bg-modal{
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.6);
        position: absolute;
        top:0;
        display: flex;
        justify-content: center;
        z-index: 999;

        display: none;
        }

        .modal-content{
        width: 35vw;
        height: 55vh;
        background: url('images/t1.jpg');
        border-radius: 5px;
        background-color:white;
        padding: 20px;
        margin: 145px auto;
        position: relative;
        }
        .contents{
        text-align: center;
        }
        
        .close{
        background-color: rgba(9,9,9,0.4);
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
        padding: 0px 10px;
        border-radius: 20px;
        color: #fff;
        }
        .close:hover{
        border-radius: 20px;
        padding: 0px 10px;
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

                    <div class="row">
                        <div class="col-md-8">
                    <div style="display: inline-block;">
                        <img class="profile-image" src="{{$answer->chat_picture}} ">
                    </div>
                    <div class="form-group" style="display: inline-block; vertical-align:top;">
                        <p>{{$answer->name}}  <br/>  {{$answer->file}}</p>
                    </div>
                </div>
                    <div class="col-md-3">
                        <a href="{{ route('user.content.view', ['file'=>$answer->file] ) }}">
                        <button class="btn btn-primary">
                                Open
                            </button>
                        </a>
                            <br/>
                            <br/>
                            @if($answer->mark==0)
                            <button class="btn btn-primary" onclick="log({{$answer->id}})">
                                Mark
                            </button>
                            @else
                            <button class="btn btn-primary" onclick="log({{$answer->id}})">
                                Re-Mark
                            </button>
                            @endif

                        &nbsp&nbsp&nbsp&nbsp
                        <a href="{{ route('user.assignment.download', ['file'=>$answer->file]) }}">
                        <button class="btn">download</button>
                        </a>
                    </div>

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

   
    <div class="bg-modal" id="bg-modal">
         <form method="post" id="answer_grading" name="answer_grading" action="{{route('user.answer.grade')}}"   enctype="multipart/form-data">
        <div class="modal-content">
            
            <div class="contents">
                <div class="close" id="cls" onclick="cls()"> &times; </div>
                <div id="grade_hide">
                    <input id="answer_id" type="hidden"  name="answer_id">
                    <h2>Assignment Details</h2>
                    <p>Marks : <input type="text" name="marks"> /100</p>
                    <p>Comment :</p>
                    <textarea name="comment" id="answer_comment" cols="30" rows="10"></textarea>
                      </div>
    
            </div>
            <button class="btn btn-primary" id="grade_btn" style="float: right; ">
                Send
            </button>
          
             <h3 style="margin-top: 40%; display: none;" id="grade_success">You have successfully Awarded marks for the answer</h3>
        </div>
        </form>

       
           
      
    </div>


    @endsection 

@section('scripts')

<script type="text/javascript">
    function log(id){
        console.log(id);
        $("#answer_id").val(function (){
            return this.value+id;
        })
        document.getElementById('bg-modal').style.display ="block";
        }
    function cls(){
        document.getElementById('bg-modal').style.display ="none";
        }   
</script>

<script type="text/javascript">
        

   
      jQuery("form[name='answer_grading']").submit(function(e) {
   
           //prevent Default functionality
           e.preventDefault();
   
           //get the action-url of the form
           var actionurl = e.currentTarget.action;
   
           var form_data =new FormData($(this)[0]);
   
           if(form_data) {
   
               $("#grade_btn").html("Sending...");
   
               $("#grade_btn").attr('disabled', true);
   
   
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
                       
                       $("#grade_btn").html("Comment");
   
                       $("#grade_btn").attr('disabled', false);
                        document.getElementById('grade_hide').style.display ="none";
                        document.getElementById('grade_success').style.display ="block";
                        document.getElementById('grade_btn').style.display ="none";

   
                      
                   }
               });
           } else {
   
               alert("Please fill the comment field");
   
               return false;
   
           }
   
       });
   
    </script>

    @endsection


















