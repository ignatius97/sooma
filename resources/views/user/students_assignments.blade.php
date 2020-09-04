@extends('layouts.user')

@section('styles')

<style type="text/css">

    
.list-inline {
  text-align: center;
}
.list-inline > li {
  margin: 10px 5px;
  padding: 0;
}
.list-inline > li:hover {
  cursor: pointer;
}
.list-inline .selected img {
  opacity: 1;
  border-radius: 15px;
}
.list-inline img {
  opacity: 0.5;
  -webkit-transition: all .5s ease;
  transition: all .5s ease;
}
.list-inline img:hover {
  opacity: 1;
}

.item > img {
  max-width: 100%;
  height: auto;
  display: block;
}

.carousel-inner .active {

    background-color: none;
}

.carousel-inner .item {

    padding: 0px;

}
</style>
@endsection

    
@section('content')

    <div class="y-content">
       
        <div class="row content-ro">

        @include('layouts.user.nav')

            <div class="page-inner col-xs-12 col-sm-12 col-md-8">

                <div style="margin-top:3%;">
                    Assignments
                </div>

                <a href="{{route('user.students_single_assignment')}}">
                    <div style="border:1px solid black; padding:1rem;">
                        <div style='border:1px solid black; width:15rem; height:11.5rem; display: inline-block;'>
                            
                        </div>
                        <div style="display: inline-block;">
                            <P>Assignment Name <br/> <small>Class Name</small></P>
                            <br/>
                            <br/>
                            <br/>
                            <small>Date</small>

                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>        