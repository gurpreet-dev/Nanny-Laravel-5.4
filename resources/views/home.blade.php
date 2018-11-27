@extends('layouts.default')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<section class="slider-sec">
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url('/')}}/images/website/slider.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE IN YOUR NEIGHBORHOOD</h3>
                    <h2>Connecting families<br />Caring for the Child</h2>
                    <a href="{{ url('/') }}/requestcare/hotel">Hotel Care</a>
                </div>
                <div class="overlay"></div>
            </div>
			<div class="carousel-item">
                <img src="{{url('/')}}/images/website/slider-1.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE IN YOUR NEIGHBORHOOD</h3>
                    <h2>Connecting families<br />Caring for the Child</h2>
                    <a href="{{ url('/') }}/requestcare/hotel">Hotel Care</a>
                </div>
                <div class="overlay"></div>
            </div>
			<div class="carousel-item">
                <img src="{{url('/')}}/images/website/slider-2.png" alt="Slider">
                <div class="carousel-caption">
                    <h3>HIRE IN YOUR NEIGHBORHOOD</h3>
                    <h2>Connecting families<br />Caring for the Child</h2>
                    <a href="{{ url('/') }}/requestcare/hotel">Hotel Care</a>
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
<section class="recomnded-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-sec">
                    @if(count($orders) > 0)
                    <h3>Recommended</h3>
                    @else
                    <h3>Nanny History</h3>
                    @endif
                    <p>Lorem Ipsum is simply dummy text of the</p>
                </div>
                <div class="row nanny-slider">
                    @php print_r($orders); @endphp
                    @if(count($orders) > 0)
                    @php $nanniess = []; @endphp
                    @foreach($orders as $order)
                    @if($order->nanny != null)
                    @if(!in_array($order->nanny->id, $nanniess))
                    <div class="col-md-12">
                        <div class="inner-sec">
                            <div class="avatar-sec">
                                @if($order->nanny->image != '')
                                <img src="{{url('/')}}/images/users/{{ $order->nanny->image }}" alt="Avatar">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                @endif
                            </div>
                            <div class="details">
                                <h5>{{ $order->nanny->first_name.' '.$order->nanny->last_name }}</h5>
                                <!-- <button type="button" class="btn btn-default btnIntr">Intrested</button> -->
                                <a href="{{url('/')}}/requestcare/maintained?nanny={{ base64_encode($order->nanny->id) }}" class="btn btn-default btnIntr">Intrested</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @php $nanniess[] = $order->nanny->id; @endphp
                    @endif
                    @endforeach

                    @else

                    @foreach($nannies as $nanny)
                    <div class="col-md-12">
                        <div class="inner-sec">
                            <div class="avatar-sec">
                                @if($nanny->image != '')
                                <img src="{{url('/')}}/images/users/{{ $nanny->image }}" alt="Avatar">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                @endif
                            </div>
                            <div class="details">
                                <h5>{{ $nanny->first_name.' '.$nanny->last_name }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @endif

                    
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section><!-- End Here -->
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
$('.test-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300
});
</script>

@endsection
