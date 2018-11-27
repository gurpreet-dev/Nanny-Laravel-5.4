<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="{{url('/')}}/images/website/fav-new.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@if (!empty($meta['title']))
   <title>{{ $meta['title'] }} - Portland Nanny</title>
@else
   <title>Portland Nanny</title>
@endif
<!-- Bootstrap Stylesheet Include Here -->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bootstrap-reboot.css">
<!-- Theme Main stylesheet Include Here -->
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/style.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/slick.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.6/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/slick.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/jquery-ui.js"></script>
<script type="text/javascript" src="{{url('/')}}/js/jquery-session.js"></script>



<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.6/sweetalert2.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<style>
label.error{color: red; font-size: 11px;}
.fc-content .fc-time{display: none;}
</style>

</head>
<body>
@if(!Auth::guest() && (Auth::user()->subscribed == 0 && url()->current() != url('/').'/user/notsubscribed'  && url()->current() != url('/').'/after/payment'))
<!-- <script>window.location.href = "{{url('/')}}/user/notsubscribed";</script> -->
@endif

    <main class="st_wrapper">
        <!-- Header Start -->
        <header class="st_header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-sec">
                                <ul class="mobile-left">
                                    <li><img src="{{url('/')}}/images/website/ic_settings_phone_24px.png" alt="Phone Icon"> Call Today 123 456 789</li>
                                    <li>Columbia, SC 29201</li>
                                </ul>
                                <ul class="social-right">
                                    <li><a href="#"><img src="{{url('/')}}/images/website/if_icon-social-facebook_211902.png" alt="Facebook Icon"></a></li>
                                    <li><a href="#"><img src="{{url('/')}}/images/website/Fill-1.png" alt="Twitter Icon"></a></li>
                                    <li><a href="#"><img src="{{url('/')}}/images/website/Group-9.png" alt="Google Icon"></a></li>
                                    <li><a href="#"><img src="{{url('/')}}/images/website/Group-10.png" alt="Linked In Icon"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div><!-- Header Top Section End Here -->
            <nav class="navbar navbar-expand-lg navbar-light st-nav">
                <div class="container">				
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/')}}/images/website/logo.png" alt="Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pricings') }}">Services & Pricing</a>
                            </li>
                            @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Request Care</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}/nanny/register">Apply to be a nanny</a>
                            </li>
                            <li class="nav-item login">
                                <a class="nav-link" href="{{ route('login') }}">Log In</a>
                            </li>
                            <li class="nav-item signup">
                                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('requestcare/pinch') }}">In a pinch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('requestcare/maintained') }}">Request Care</a>
                            </li>
                            <li class="nav-item signup profile-pro">
                                <a class="nav-link" href="{{ url('user/profile') }}">
                                @if(Auth::user()->image != '')
                                <img src="{{url('/')}}/images/users/{{ Auth::user()->image }}" alt="Logo">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Logo">
                                @endif
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </nav>
        </header><!-- Header Section End Here -->

        <article class="st_content">
        @yield('content')
        </atricle>

        <!-- Footer Start -->
        <footer class="st_footer">
            <div class="top_fot">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <div class="clear"></div>
            </div><!-- Top Footer Section End Here -->
            <div class="foot_middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="inner-sec">
                                <div class="head-sec">
                                    <h6>Portland Nanny</h6>
                                </div>
                                <div class="text-sec">							
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="inner-sec">
                                <div class="head-sec">
                                    <h6>Contact Info</h6>
                                </div>
                                <address>
                                    <p>99 S.t Jomblo Park Pekanbaru 28292. Indonesia </p>
                                    <a href="">(0761) 654-123987</a>
                                    <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="inner-sec">
                                <div class="head-sec">
                                    <h6>Quick Links</h6>
                                </div>
                                @php
                                $pages = DB::table('static_pages')->orderby('sort_order', 'asc')->get();
                                @endphp

                                <ul>
                                    @foreach($pages as $page)
                                    <li><a href="{{ url('/') }}/page/{{ $page->slug }}">{{ $page->title }}</a></li>
                                    @endforeach
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('reviews') }}">Testimonials</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="inner-sec">
                                <div class="head-sec">
                                    <h6>Get in Touch</h6>
                                </div>
                                <div class="social-sec">							
                                    <p>Lorem Ipsum is simply dummy</p>
                                    <ul>
                                        <li><a href="#"><img src="{{url('/')}}/images/website/if_icon-social-facebook_211902.png" alt="Facebook Icon"></a></li>
                                        <li><a href="#"><img src="{{url('/')}}/images/website/Fill-1.png" alt="Twitter Icon"></a></li>
                                        <li><a href="#"><img src="{{url('/')}}/images/website/Group-9.png" alt="Google Icon"></a></li>
                                        <li><a href="#"><img src="{{url('/')}}/images/website/Group-10.png" alt="Linked In Icon"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div><!-- Footer middle Section End Here -->
            <div class="copy-rigth">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-sec">
                                <p>&copy; Copyright Kids 2018. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- Footer Section End Here -->

    </main>

    <!-- <script type="text/javascript" src="{{url('/')}}/js/jquery-3.3.1.slim.min.js"></script> -->
    <script type="text/javascript" src="{{url('/')}}/js/popper.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/bootstrap.min.js"></script>
    
</body>
</html>    