@extends( 'layouts.teacher.user_teacher' ) 


@section('content')


 <div class="y-content" style="">

        <div class="row content-row">

            @include('layouts.teacher.nav_teacher')

         <div class="page-inner col-xs-12 col-sm-12 col-md-8">

         	<div id="edit_success" style="text-align: center; margin-top: 20%; display: none;">
         		
         		<h5>Assignment Edited succesfully</h5>

         	

         		 	<a href="{{route('user.channel.assignment', ['assignment_id'=>$assignment->id])}}"> <button class="btn btn-primary" type="submit" >click to view changes</button></a>
                                            
                      
         	</div>

         	<div class="recom-area abt-sec edit_main" >
                                <div class="abt-sec-head">
                                    <h2 style="text-align: center;"> Edit  Assignment</h2>


                                     <form method="post" id="class_assignment_edit" name="class_assignment_edit" action="{{route('user.assignment_edit.save', ['assignment_unique_id'=>$assignment->id])}}"   enctype="multipart/form-data">
                                         <input type="hidden" value="" name="assignment_id">
                                   
                                        <div class="form-group" >
                                            <input type="text" required name="assignment_name" class="form-control" id="assignment-title"  style="background-color: white;"  value="{{$assignment->title}}">
                                        </div>
                                        <div>
                                            <textarea id="class_assignment" name="assignment_text"   rows="8" style="background-color: white; color:black; width:100%;">{{$assignment->text}}</textarea>
                                        </div>

                                        <div  style="color: black; margin-top: 10px; margin-bottom: 10px;">                        
                                        <label for="picture" >Attach a file (optional) {{$assignment->created_at}}</label>
                                         <input type="file" id="picture" name="picture">
                   
                                       </div>
                                        <div style="text-align: right;">
                                            <button class="btn btn-primary" type="submit"  id="class_assignment_edit_btn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

           </div>


  </div>
</div>


@endsection 

@section('scripts')

 



<script type="text/javascript">
        

        
   
      jQuery("form[name='class_assignment_edit']").submit(function(e) {
   
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

                        var edit_success =document.querySelector('#edit_success');
                         edit_success.style.display='block';


                       var edit_main=document.querySelector('.edit_main');
                         edit_main.style.display='none';
   
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
