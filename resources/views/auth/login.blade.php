@extends('layouts.default')

@section('content')
<section class="login-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 m-auto">
                <div class="login-inner-sec">
                    <form role="form" method="POST" action="{{ route('login') }}" id="login-frm">
                        {{ csrf_field() }}
                        <div class="login-heading">
                            <div class="col-md-12">
                                <h5 class="login-title">Login</h5>
                                <p class="login-detail">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input login-check" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="checkbox-style"></span><span class="checkbox-style-login">Keep me logged in</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                                <button class="signin btn" type="submit">Sign In</button>
                        </div>
                        <div class="col-md-12 col-sm-12 forgot-pass">
                            <a href="{{ route('password.request') }}"><span>Forgot password?</span></a>
                        </div>
                        <!-- First Step End Here -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>
$("#login-frm").validate({
    rules: {
        email: {
            required: true,
            email: true
        },    
        password: "required"
    },
    messages: {
        email: {
            required: 'Please enter email address',
            email: 'Please enter valid email address'
        },  
        password: "Please enter password"
    }
});
</script>

@endsection
