@extends('layouts.user')
@section('styles')
<style type="text/css">
.history-image{ 
    width: 30% !important;
}
.history-title {
    width: 65% !important;
}
</style>

<link rel="stylesheet" href="{{asset('admin-css/plugins/datepicker/datepicker3.css')}}">

@endsection


@section('content')

<div class="y-content">
    
    <div class="row y-content-row">

        @include('layouts.user.nav')

        <div class="page-inner profile-edit" >

            <div class="profile-content slide-area1">
               
                <div class="row no-margin">

                    @include('notification.notify')

                    <div class=" profile-view">
                        
                        <h2 class="mylist-head" style="text-align: center; font-size: 30px;">Fill to become a teacher</h2>
                       
                        <div class="edit-profile profile-view">
                            
                            <div class="edit-form profile-bg">
                                
                               

                                <div class="editform-content"> 
                                    
                                    <form  action="  " method="POST" enctype="multipart/form-data">

                                        

                                        @if(Auth::user()->login_by == 'manual')


                                        @endif
                                       

                                       

                                        <div class="form-group" hidden>
                                            <input type="text"  value="teacher" name="role" class="form-control"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="Qn1">How long have you been teaching ?</label>
                                            <input type="text" name="Qn1" class="form-control"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="Qn2">What is your best tought subject ?</label>
                                            <input type="text" name="Qn2" class="form-control"   >
                                        </div>

                                        <div class="form-group">
                                            <label for="Qn3">Are you ready to give time and attention to your students</label>
                                            <input type="text" name="Qn3" class="form-control"   >
                                        </div>

                                        

                                       
                                              
                                       
                                        <div style="margin-left: 12vw; display: inline; width: 25px;">
                                            <button type="submit" class="btn btn-info">{{tr('submit')}}</button>
                                            
                                        </div>                                              

                                    </form>

                                </div><!--end of editform-content-->
                                    
                            </div><!--end of edit-form-->                           
                        
                        </div><!--end of edit-profile-->
                    
                    </div><!--profile-view end-->  
                    
               

                </div><!--end of profile-content row-->
            
            </div>

            <div class="sidebar-back"></div> 
        </div>
    </div>
</div>

@endsection

@section('scripts')



@endsection