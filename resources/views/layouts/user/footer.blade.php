<style>
    ul.footer_links li{
        display:block;
    }
</style>
<div class="bottom-height"></div>
<footer class="footer">
    <div class="footer1 row">
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer">About Us</a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer">Who we are</a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer">Contact Us</a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Curriculum </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Subjects </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Teach on SOOMA </a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Discussion Forum </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Blog </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> FAQs </a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Terms of Service </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Privacy Policy </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Cookies Policy </a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Affiliate Schools </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Careers </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Help & Support </a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
            <ul class="footer_links">
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Donate </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> News Letter </a></li>
                <li><a href="http://" target="_blank" rel="noopener noreferrer"> Location Map </a></li>
            </ul>
        </div>
    </div>
    <div class="footer1 row">
        <!-- <div class="col-sm-3 col-md-3 col-lg-3">
                                            
        </div>end of col-sm-2 -->

        <div class="col-sm-12 col-md-12 col-lg-12 foot-content">
            <div class="tube-image text-center" style="display: inline-block;">
                @if(Setting::get('site_logo'))
                    <img src="{{Setting::get('site_logo')}}">
                @else
                    <img src="{{asset('logo.png')}}">
                @endif
            </div> 
            <ul class="term" style="display: inline-block;">
                <?php $pages = pages();?>
                @if (count($pages) > 0)
                    @foreach($pages as $page) 
                        <li><a  href="{{route('page_view', $page->id)}}" style="text-transform: capitalize;">{{$page->title}}</a></li> | 
                    @endforeach
                @endif
                <li><a href="{{url('/')}}" >&#169; {{date('Y')}} @if(Setting::get('site_name')) {{Setting::get('site_name') }} @else {{tr('site_name')}} @endif</a></li>
            </ul>
        </div>   
    </div><!--end of footer1-->
</footer>
