@extends('layouts.teacher.user_teacher')

@section('styles')

<style>

.redeem-content {
    margin:3em 0 1em 0;line-height: 1.8em;
}

table {
    box-shadow: 0px 1px 5px grey !important;
}
thead>tr>th {
    padding: 1% !important;
}
</style>

@endsection

@section('content')

    <div class="y-content">
    
        <div class="row content-row">

            @include('layouts.teacher.nav_teacher')

            <div class="history-content page-inner col-sm-9 col-md-8">

                @include('notification.notify')

                <div class="new-history">

                    <div class="content-head">

                        <div><h4>@if($channel) '{{$channel->name}}' {{tr('channel')}} @endif Student's Name in 'Class name' (Private Massaging)</h4></div>

                    </div>

                        
                        <div class="row">
                        <hr>
                                    <input class="form-control" style="width: 90%;display: inline-block;" type="text" placeholder="Message">
                                    <button class="btn btn-primary">Send</button>
                                    <hr>
                                         <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                                         
                                            <div style="text-align: right;">
                                                <P>Teacher's Message<br/> <small>Date of message</small></P>
                                            </div>
                                            <div >
                                                <P>Student's Message<br/> <small>Date of message</small></P>
                                            </div>
                                            

                                        </div>
                           
                        </div>

                    

                       
            
                </div>
            
                <div class="sidebar-back"></div> 
            </div>
    
        </div>
    </div>

@endsection