@extends('layouts.default')
@section('content')

<section class="login-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 m-auto">
                <div class="login-inner-sec">
                    <div class="alert alert-warning">You have not paid your service charge Yet. <a href="{{url('after/redirecttopaypal')}}">Pay now</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection