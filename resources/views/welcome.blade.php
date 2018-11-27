@extends('layouts.default')

@section('content')

@if(!Auth::guest()))
<script>window.location.href = "{{url('/')}}/home";</script>
@endif

<style>
.home-test .main-wrap .test-outer .slick-list{
    background: #9054EF;
    border-radius: 20px;
}

.home-test .main-wrap .test-outer .test-wrap{
    background:transparent;
    border-radius:0px;
}

</style>

<section class="slider-sec">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url('/')}}/images/website/slider.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE PROFESSIONAL & VETED NANNIES</h3>
                    <h2>Matching Exceptional <br />Families with Exceptional<br /> Childcare</h2>
                    <a href="{{ url('/') }}/requestcare/pinch">In a pinch</a>
                </div>
                <div class="overlay"></div>
            </div>
			<div class="carousel-item">
                <img src="{{url('/')}}/images/website/slider-1.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE IN YOUR NEIGHBORHOOD</h3>
                    <h2>Connecting families<br />Caring for the Child</h2>
                    <a href="{{ url('/') }}/requestcare/pinch">In a pinch</a>
                </div>
                <div class="overlay"></div>
            </div>
			<div class="carousel-item">
                <img src="{{url('/')}}/images/website/slider-2.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE IN YOUR NEIGHBORHOOD</h3>
                    <h2>Connecting families<br />Caring for the Child</h2>
                    <a href="{{ url('/') }}/requestcare/pinch">In a pinch</a>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
             <img src="{{url('/')}}/images/website/left-icon.png" alt="lefticon">
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <img src="{{url('/')}}/images/website/right-icon.png" alt="righticonrighticon">
        </a>
    </div>
    <div class="clear"></div>
</section><!-- Slider Section End Here -->
<section class="home-test">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-wrap">						
                    <div class="test-outer home-test-slider">

                        @foreach($reviews as $review)
                        <div class="test-wrap">
                            <div class="avatar-sec">
                                @if($review->user->image != '')
                                <img src="{{url('/')}}/images/users/{{ $review->user->image }}" alt="Avatar">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                @endif
                            </div>
                            <div class="avatar-details">
                                <h6>{{ $review->user->name }}</h6>
                                <div class="rating-date">
                                    <span class="rating">
                                        <span class="rated">
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="rated">
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="rated">
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="">
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="">
                                            <i class="far fa-star"></i>
                                        </span>
                                    </span>
                                    <span class="date">
                                        {{ date('d F Y', strtotime($review->created_at)) }}
                                    </span>
                                </div>
                                <p>
                                    {{ $review->review }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<!--/.home-test-->
<section class="my-service-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 m-auto">
                <div class="head-sec">
                    <h2>How our service works</h2>
                    <p>We help Portland area families find exceptional nannies for all their needs!</p>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="inner-sec">
                            <div class="img-sec">
                                <img src="{{url('/')}}/images/website/infancy-clipart-baby-feet.png" alt="Image">
                            </div>
                            <div class="text-sec">
                                <h5>Professional Nanny</h5>
                                <p>We find the cities best nannies, check their references, ensure clean backgrounds etc.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                    <div class="col-sm-4">
                        <div class="inner-sec">
                            <div class="img-sec">
                                <img src="{{url('/')}}/images/website/if_home_559874.png" alt="Image">
                            </div>
                            <div class="text-sec">
                                <h5>Modern Day Family</h5>
                                <p>We match our nannies with families depending on their availability, location, experience with age of children and the amount of care the family needs.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                    <div class="col-sm-4">
                        <div class="inner-sec">
                            <div class="img-sec">
                                <img src="{{url('/')}}/images/website/if_user_female3_172623.png" alt="Image">
                            </div>
                            <div class="text-sec">
                                <h5>Let Us Do the Work</h5>
                                <p>We withhold taxes conveniently pay the nannies, are professional schedulers and juggle everyone's needs.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>	
<!--/.my-service-sec-->
<section class="service-provide-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="img-sec">
                    <img src="{{url('/')}}/images/website/service-img.png" alt="Service-Image">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="inner-sec">
                    <div class="head-sec">
                        <h2>Services Provided</h2>
                        <p>Have a special request not listed below? Just ask!<br>Booking@portlandnanny.com</p>
                    </div>
                    <div class="list-outer">
                        <ul>
                            <li>Day Night Care</li>
                            <li>Temporary Care</li>
                            <li>Long Term Care</li>
                            <li>Full Time Care</li>
                            <li>Part Time Care</li>
                            <li>Mother's Helper Duty</li>
                            <li>Overnight Infant Care</li>
                            <li>Multiples Care</li>
                            <li>Nanny Shares</li>
                            <li>Last Minute Care</li>
                            <li>Hotel Care</li>
                            <li>Driving Children</li>
                        </ul>
                        <a href="{{url('/')}}/pricings">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/.service-provide-sec-->
<section class="testimonial-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 m-auto">
                <div class="inner-sec">						
                    <div class="head-sec">
                        <h3>Testimonials</h3>
                    </div>
                    <div class="test-outer test-slider">

                        @foreach($reviews as $review)
                        <div class="wrap">
                            <div class="avatar-sec">
                                @if($review->user->image != '')
                                <img src="{{url('/')}}/images/users/{{ $review->user->image }}" alt="Avatar">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                @endif
                            </div>
                            <div class="details">
                                <h5>{{ $review->user->name }}</h5>
                                <p>"{{ $review->review }}"</p>
                            </div>  
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Here Testimonials Section -->

<script>
$('.nanny-slider').slick({
    dots: false,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
        breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
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
$('.test-slider, .home-test-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300
});
</script>

@endsection