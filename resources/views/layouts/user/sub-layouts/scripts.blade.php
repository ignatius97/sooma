 <!--videoVideoPlugin.js is required only when the slider contains video or audio.-->
 <script src="video_audio_slider/VideoPlugin.js"></script>
<script src="video_audio_slider/video_audio_slider.js" type="text/javascript"></script>
<script type="text/javascript">
        //don't copy the script below into your page.
        if (!document.domain) alert("The video will not work properly if opening the page by local path. Please test this page through HTTP on a web or localhost server");    
    </script>

<script src="{{asset('streamtube/js/jquery.min.js')}}"></script>

<script src="{{asset('streamtube/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/bootstrap/js/jquery-ui.js')}}"></script>


<script type="text/javascript" src="{{asset('streamtube/js/jquery-migrate-1.2.1.min.js')}}"></script>

<script type="text/javascript" src="{{asset('streamtube/js/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('streamtube/js/script.js')}}"></script>

<script src="{{asset('admin-css/plugins/select2/select2.full.min.js')}}"></script>

<!-- input Mask -->

<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.js')}}"></script>

<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>

<script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>  




<script type="text/javascript">

    $(window).load(function() {
        
        $('.placeholder').each(function () {
            var imagex = jQuery(this);
            var imgOriginal = imagex.data('src');
            $(imagex).attr('src', imgOriginal);
        });
        
        $('#preloader').fadeOut(2000);

    });

    $(document).ready(function() {

        //Initialize Select2 Elements

        $(".select2").select2();

        $("[data-mask]").inputmask();

        $('.video-list-slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            arrows: true,
            slidesToScroll: 5,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    } 
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
        
        });

 
        $('.box').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            arrows: true,
            slidesToScroll: 5,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    } 
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
        
        });
        @if(Auth::check())
        $.post('{{ route("user.bell_notifications.index")}}', {'is_json': 1})

        .done(function(response) {




            if(response.success == false) {
                return false;
            }

            $('#global-notifications-count').html(response.data.length);
              $('#global-notifications-counts').html(response.data.length);
              

            $.each(response.data, function(key,notificationDetails) { 

                // console.log(JSON.stringify(notificationDetails));

                var global_notification_redirect_url = "/video/"+notificationDetails.video_tape_id;

                if(notificationDetails.notification_type == 'BELL_NOTIFICATION_NEW_SUBSCRIBER') {

                    var global_notification_redirect_url = "/channel/"+notificationDetails.channel_id;

                }
                if(notificationDetails.notification_type == 'Class_Post') {

                    var global_notification_redirect_url = "/channels/"+notificationDetails.channel_id;

                }

                if(notificationDetails.notification_type == 'Assignment_Upload') {

                    var global_notification_redirect_url = "/channels/"+notificationDetails.channel_id;

                }

                if(notificationDetails.notification_type == 'Answer_upload') {

                    var global_notification_redirect_url = "/channel/"+notificationDetails.channel_id;

                }


                var messageTemplate = '';

                messageTemplate = '<li class="notification-box">';

                messageTemplate += '<a href="'+global_notification_redirect_url+'" target="_blank">';

                messageTemplate += '<div class="row">';

                messageTemplate +=  '<div class="col-lg-3 col-sm-3 col-3 text-center">';

                messageTemplate +=  '<img src="'+notificationDetails.picture+'" class="w-50 rounded-circle">';

                messageTemplate +=  '</div>';

                messageTemplate +=  '<div class="col-lg-8 col-sm-8 col-8">';

                // messageTemplate +=  '<strong class="text-info">'+notificationDetails+'</strong>';

                messageTemplate +=  '<div>';

                messageTemplate +=  notificationDetails.message;
                          
                messageTemplate +=  '</div>';

                messageTemplate +=  '<small class="text-warning">27.11.2015, 15:00</small>';
                              
                messageTemplate +=  '</div>';

                messageTemplate +=  '</div>';

                messageTemplate +=  '</a>';

                messageTemplate +=  '</li>';
                
                $('#global-notifications-box').append(messageTemplate);


              


               //New Assignment solutions and notification



             


          

                // $(chatBox).animate({scrollTop: chatBox.scrollHeight}, 500);

            });

        })
        .fail(function(response) {
            console.log(response);
        })
        .always(function(response) {
            console.log(response);
        });

        function loadNotificationsCount() {

            $.post('{{ route("user.bell_notifications.count")}}', {'is_json': 1})

            .done(function(response) {

                $('#global-notifications-count').html(response.count);
                
            })
            .fail(function(response) {
                // console.log(response);
            })
            .always(function(response) {
                // console.log(response);
            });
  
        }

        setInterval(loadNotificationsCount, 10000);
    @endif
    });


    $(document).on("click", ".notification-link a", function(){ 

            alert("notificationsStatusUpdate");

            $.post('{{ route("user.bell_notifications.update")}}', {'is_json': 1})

            .done(function(response) {

                //$('#global-notifications-count').html(response.count);
                return true;
                
            })
            .fail(function(response) {
                console.log(response);
            })
            .always(function(response) {
                console.log(response);
            });


    });


    jQuery(document).ready( function () {
        //autocomplete
        jQuery("#auto_complete_search").autocomplete({
            source: "{{route('search')}}",
            minLength: 1,
            select: function(event, ui){

                // set the value of the currently focused text box to the correct value

                if (event.type == "autocompleteselect"){
                    
                    // console.log( "logged correctly: " + ui.item.value );

                    var username = ui.item.value;

                    if(ui.item.value == 'View All') {

                        // console.log('View AALLLLLLLLL');

                        window.location.href = "{{route('search-all', array('q' => 'all'))}}";

                    } else {
                        // console.log("User Submit");

                        jQuery('#auto_complete_search').val(ui.item.value);

                        jQuery('#userSearch').submit();
                    }

                }                        
            }      // select

        }); 

        jQuery("#auto_complete_search_min").autocomplete({
            source: "{{route('search')}}",
            minLength: 1,
            select: function(event, ui){

                // set the value of the currently focused text box to the correct value

                if (event.type == "autocompleteselect"){
                    
                    // console.log( "logged correctly: " + ui.item.value );

                    var username = ui.item.value;

                    if(ui.item.value == 'View All') {

                        // console.log('View AALLLLLLLLL');

                        window.location.href = "{{route('search-all', array('q' => 'all'))}}";

                    } else {
                        // console.log("User Submit");

                        jQuery('#auto_complete_search_min').val(ui.item.value);

                        jQuery('#userSearch_min').submit();
                    }

                }                        
            }      // select

        }); 

    });

</script>

<script type="text/javascript">

    $(window).load(function() {
        
        $('.placeholder').each(function () {
            var imagex = jQuery(this);
            var imgOriginal = imagex.data('src');
            $(imagex).attr('src', imgOriginal);
        });
        
        $('#preloader').fadeOut(2000);

    });

 

     

    $(document).ready(function() {

    @if(Auth::check())
        $.post('{{ route("user.envelop_notifications.index")}}', {'is_json': 1})

        .done(function(response) {


    
           
              
            
              $('#global-message_count_main').html(response.data.length);
              

            $.each(response.data, function(key,notificationDetails) { 

                // console.log(JSON.stringify(notificationDetails));

               

                var global_notification_redirect_url = "/channels/"+notificationDetails.channel_id;

               
                  $.each(response.redirect_urls, function(keys,notificationDetailss){
                    var t='{{Auth::user()->id}}';
                    console.log(t);
                    

                    if(notificationDetailss.user_id=={{Auth::user()->id}}){
                   global_notification_redirect_url="/channel/"+notificationDetails.channel_id;
                  }
                  else
                    global_notification_redirect_url = "/channels/"+notificationDetails.channel_id+'?user_id='+notificationDetailss.user_id;

                  })

            

                

              

                var messageTemplate = '';

                messageTemplate = '<li class="notification-box">';

                messageTemplate += '<a href="'+global_notification_redirect_url+'" target="_blank">';

                messageTemplate += '<div class="row">';

                messageTemplate +=  '<div class="col-lg-3 col-sm-3 col-3 text-center">';

                messageTemplate +=  '<img src="'+notificationDetails.picture+'" class="w-50 rounded-circle">';

                messageTemplate +=  '</div>';

                messageTemplate +=  '<div class="col-lg-8 col-sm-8 col-8">';

                // messageTemplate +=  '<strong class="text-info">'+notificationDetails+'</strong>';

                messageTemplate +=  '<div>';

                messageTemplate +=  notificationDetails.name;

                          
                messageTemplate +=  '</div>';
                 messageTemplate +=  '<div>';

                messageTemplate +=  notificationDetails.message;
                
                          
                messageTemplate +=  '</div>';

                messageTemplate +=  '<small class="text-warning">27.11.2015, 15:00</small>';
                              
                messageTemplate +=  '</div>';

                messageTemplate +=  '</div>';

                messageTemplate +=  '</a>';

                messageTemplate +=  '</li>';
                
                $('#global-notifications-message-box').append(messageTemplate);


              


               //New Assignment solutions and notification



             


          

                // $(chatBox).animate({scrollTop: chatBox.scrollHeight}, 500);

            });

        })
        .fail(function(response) {
            console.log("not success");
        })
        .always(function(response) {
            console.log("no last");
        });

        function loadNotificationsCount() {

            $.post('{{ route("user.bell_notifications.count")}}', {'is_json': 1})

            .done(function(response) {

                $('#global-notifications-count').html(response.count);
                
            })
            .fail(function(response) {
                // console.log(response);
            })
            .always(function(response) {
                // console.log(response);
            });
  
        }

        setInterval(loadNotificationsCount, 10000);
    @endif
    });


</script>


@yield('scripts')

<script type="text/javascript">
    @if(isset($page))
        $("#{{$page}}").addClass("active");
    @endif
</script>


<script type="text/javascript">

 $(document).ready(function() {
    
 @if(Auth::check())
        $.post('{{ route("user.bell_notifications.count")}}', {'is_json': 1})

        .done(function(response) {

            if(response.success == false) {
                return false;
            }

              if(response.count==0){
              
              }

              else

              {
               $('#global-notifications-student').html(response.count);
               $('#global-notifications-teacher').html(response.count);
               $('#global-notifications-student_channel').html(response.count);



              }


        })
        .fail(function(response) {
            console.log(response);
        })
        .always(function(response) {
            console.log(response);
        });

       if(response.count==0){
          function loadNotificationsCount(){
           return false;
          }
       }

       else{
        function loadNotificationsCount() {

            $.post('{{ route("user.bell_notifications.count")}}', {'is_json': 1})

            .done(function(response) {

                $('#global-notifications-student').html(response.count);
                
            })
            .fail(function(response) {
                // console.log(response);
            })
            .always(function(response) {
                // console.log(response);
            });
  
        }
    }

        setInterval(loadNotificationsCount, 10000);
    @endif
    });


    $(document).on("click", ".class_note", function(){ 

            

            $.post('{{ route("user.bell_notifications.update")}}', {'is_json': 1})

            .done(function(response) {

                //$('#global-notifications-count').html(response.count);

                console.log('True');
                return true;
                
            })
            .fail(function(response) {
                console.log('false response');
            })
            .always(function(response) {
                console.log('last respones');
            });


    });




    //Private message notifications with the student interface 


 


    

</script>



<?php echo Setting::get('body_scripts') ?: ""; ?>