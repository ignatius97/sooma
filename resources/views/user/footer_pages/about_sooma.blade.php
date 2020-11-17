@extends('layouts.user.footerPagesLayout')

@section('content')

<Style>
    .common-form {
    max-width: 90%;
}
.text{
    font-size: 11px;
}

</Style>

<div class="login-space">

    <div class="common-form login-common text-center">



        @include('notification.notify')

        <div class="signup-head">
            <h3 style="margin-bottom: 0px;">About us</h3>
        </div><!--end  of signup-head-->
          
    </div><!--end of common-form-->  
    <div class="common-form login-common" style="margin-top: 10px !important; margin-bottom: 31px;">

        <div class="row">
            <div class="col-md-4">
                <div>
                    <img style="width: 70%;border-radius: 50%;" src="{{asset('prototype_icons/kids.jpg')}}" alt="" srcset="">
                </div>
                <div>
                    <h4>About SOOMA</h4>
                    <p style="width: 75%;">
                    

                        SOOMA is a curriculum-based e-learning 
                        platform focusing on formal education in
                        pre-primary, primary & secondary levels 
                        across four East African countries of Uganda,
                        Kenya, Tanzania & Rwanda. Its’ primary 
                        objective is to contribute to building a more
                        resilient education delivery system for a 
                        flexible, convenient and improved learning 
                        experience. By this, SOOMA seeks to support
                        remote learning through technology to
                        enable students study from anywhere

                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    
                    <h4>Why is this important?</h4> 
<p class="text">
SOOMA believes effective learning is one that is affordable, convenient and resilient. Threats such as pandemics & disease, wars, social unrest 
and natural disasters have proven to have a profound effect on the education system, with the most recent being COVID-19  pandemic which 
has affected educational systems worldwide, leading to the near-total closures of schools, universities and colleges. In response to the danger 
posed by the pandemic to learners for example in Uganda, the President on Wednesday 18th March 2020 announced the closure of all schools
and educational institutions from 20th March 2020 for a period of 30 days in a bid to avoid the possible rapid spread of new infections of 
COVID- 19. This measure resulted in the closure of more than 73,000 schools and institutions affecting more than 15,000,000 learners and 
548,000 teachers. This directive has since been upheld indefinitely.  East Africa and the world at large followed suite with most governments 
around the world temporarily closing educational institutions in an attempt to contain the spread of COVID-19. As of 4 September 2020, 
approximately 1.277 billion learners are currently affected due to school closures in response to the pandemic. According to UNICEF 
monitoring, 46 countries are currently implementing nationwide closures and 27 are implementing local closures, impacting about 72.9 
percent of the world's student population. 
</p>
 <h4>Innovation</h4>
<p class="text">
SOOMA solely focuses on formal curriculum-based learning at pre-primary, primary and secondary education levels. SOOMA believes that no 
child/student should halt learning completely amidst this current advanced technology era. By harnessing the power of technology through 
electronic learning, SOOMA empowers remote student teacher interactions through its curriculum-based e-learning platform, making it 
possible for learners to study anywhere and attain recognized formal education qualification and certification across the four East African 
countries.
</p>
<h4>How it works? </h4>
<p class="text">
SOOMA curriculum-based e-learning platform allows teachers and students to signup and have an account on the platform. Teachers can then
create and upload curriculum-based learning materials inform of videos, presentations and text content inline with the class level within the 
curriculum. Students depending on their class, access this content and learn at their convenience. The platform has an assignment function 
that enables teachers to create assignments for students in accordance to the learning material created. Students can work on the assignments 
and submit through the upload function for review and marking. The platform also provides a chat and comments window under each teacher’s
page to allow for direct interaction amongst learners in that class and teachers. This way, students are able to continue with formal learning 
and be prepared for final examination when the time id due.
</p>
 <h4>References:</h4>
<p class="text">
1.	(PML Daily, “FULL SPEECH: Education Minister Janet Museveni orders on school 
term, tertiary institutions”, April 23, 2020)
2.	https://en.wikipedia.org/wiki/Impact_of_the_COVID-19_pandemic_on_education


                    </p>
                </div>
            </div>
        </div>
    
    </div>  

</div><!--end of form-background-->

@endsection

@section('scripts')

<script src="{{asset('assets/js/jstz.min.js')}}"></script>
<script>
    
    $(document).ready(function() {

        var dMin = new Date().getTimezoneOffset();
        var dtz = -(dMin/60);
        // alert(dtz);
        $("#userTimezone").val(jstz.determine().name());
    });

</script>

@endsection
