@extends('layouts.default')

@section('content')

<section class="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-sec">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="head-sec">
                                <h3>Contact Us</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-sec">
                                <p>Feel free to call us at - <a href="skype:5035864775?call">503-586-4775</a> or mail at <a href="mailto:booking@portlandnanny.com">booking@portlandnanny.com</a> if you would prefer to speak with someone. Otherwise, fill out our form below and we'll respond to you promptly via email or a phone call if your inquiry could use a little conversation.</p>
                            </div>
                            <div class="img-sec">
                                <img src="{{ url('/') }}/images/website/contact-img.png" alt="Contact Us">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif

                            <div class="form-outer">
                                <form class="contact-form" method="post" action="{{ route('contact') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email address']) }}
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="" name="message" value="" placeholder="Message"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-default btnSub" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>
$(".contact-form").validate({
    rules:{
        email: {
            required: true,
            email: true
        },
        name: "required",
        message: "required"
    },
    messages:{
        email: {
            required: "Email is required",
            email: "Please enter valid email"
        },
        name: "Name is required",
        message: "Message is required"
    }
});
</script>

@endsection