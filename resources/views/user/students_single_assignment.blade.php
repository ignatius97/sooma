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

                <div style="margin-top:3%; display:inline-block;">
                    <P>Assignment Name <br/> <small>Class Name</small></P>
                </div>
                <div style="margin-top:3%; float:right; display:inline-block;">
                    <small>Date</small>
                </div>

                <div style="border:1px solid black;min-height: 5rem; padding: 2rem; margin-bottom:3rem;">
                    <div style=" float:right;">
                        <button class="btn btn-primary">Attach answer</button>
                    </div>
                    <p>
                        assignment intructions here.........
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </p>
                </div>

                @if(Auth::check())
                                   
                    <form class="teacher-post-form" role="form" method="POST" action="{{ url('/teacher_post') }}" enctype="multipart/form-data">
                        <div style="display: inline-block;">
                            <img class="profile-image" src="{{Auth::user()->picture ?: asset('placeholder.png')}}">
                        </div>
                        <div class="form-group" style="display: inline-block; width: 85%;">
                            <input type="text" value="{{Auth::user()->name}}" style="background-color: white; display:none;" >
                            <input type="text" value="{{Auth::user()->email}}" style="background-color: white; display:none;">
                            <input type="text" value="date" style=" display:none;" >
                            <!-- We need to upload the profile photo to -->
                            
                            <input type="text" required name="teacher-post" class="form-control" id="teacher-post" placeholder="Comment on assignment"  style="background-color: white;">
                        </div>
                        <div style="display: inline-block;">
                            <button class="btn btn-primary">Post</button>
                        </div>
                    </form>
                    <div style="border:1px solid black; padding: 10px; margin-bottom:5px;">
                        <div style="display: inline-block;">
                            <img class="profile-image" src="">
                        </div>
                        <div style="display: inline-block; color:black; vertical-align: middle;">
                            <P>Name of Person posting <br/> <small>Date when posted</small></P>
                        </div>

                        <div style="border:1px solid black; padding: 10px; margin-bottom:10px; color:black;">
                            The comment the teacher or student has sent <br/>.
                        </div>
                        <!-- comments on the post -->
                        <div style="display: inline-block;">
                            <img class="profile-image" src="">
                        </div>
                        <div style="display: inline-block; color:black; ">
                            <P>From Name of Person commenting &nbsp&nbsp&nbsp&nbsp <small>Date when posted</small></P>
                        </div>
                        <div style="color:black; margin:0 0 2rem 5rem">the comment here...</div>
                        <!-- comments on the post -->
                        <div style="display: inline-block;">
                            <img class="profile-image" src="">
                        </div>
                        <div style="display: inline-block; color:black; ">
                            <P>From Name of Person commenting &nbsp&nbsp&nbsp&nbsp <small>Date when posted</small></P>
                        </div>
                        <div style="color:black; margin:0 0 2rem 5rem">the comment here...</div>
                        <!--adding commenting on a post -->
                        <div style="display: inline-block;">
                            <img class="profile-image" src="{{Auth::user()->picture ?: asset('placeholder.png')}}">
                        </div>
                        <form class="comment-form" role="form" method="POST" action="{{ url('/comment') }}" enctype="multipart/form-data" style="display:inline;">
                            <div class="form-group" style="display: inline-block; width: 80%;">
                                <input type="text" value="{{Auth::user()->name}}" style="background-color: white; display:none;" >
                                <input type="text" value="{{Auth::user()->email}}" style="background-color: white; display:none;">
                                <input type="text" value="date" style=" display:none;" >
                                <!-- We need to upload the profile photo to -->
                                <input type="text" required name="comment" class="form-control" id="comment" placeholder="Add comment to this post"  style="background-color: white;">
                            </div>
                            <div style="display: inline-block;">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- repeating the comment -->


                @endif

            </div>
        </div>
    </div>    