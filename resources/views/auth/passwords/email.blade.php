@extends('layouts.default')

@section('content')
<section class="login-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 m-auto">

                @if(Session::has('status'))
                <div class="alert alert-info">
                    {{ Session::get('status') }}
                </div>
                @endif

                <div class="login-inner-sec">
                    <form role="form" method="POST" action="{{ route('password.email') }}" id="reset-frm">
                        {{ csrf_field() }}
                        <div class="login-heading">
                            <div class="col-md-12">
                                <div class="imgs">
                                    <img src="{{url('/')}}/images/website/icons8-time.png"/>
                                </div>
                                <h5 class="login-title">Forgot Password</h5>
                                <p class="login-detail">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="Enter Your Register Email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button class="signin btn" type="submit">Send</button>
                        </div>
                        <!-- First Step End Here -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>
$("#reset-frm").validate();
</script>

@endsection
