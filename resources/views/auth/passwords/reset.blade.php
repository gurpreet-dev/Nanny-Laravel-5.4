@extends('layouts.default')

@section('content')
<section class="login-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 m-auto">
                <div class="login-inner-sec">
                    <form method="POST" action="{{ route('password.request') }}" role = "form">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="login-heading">
                            <div class="col-md-12">
                                <h5 class="login-title">Reset Password</h5>
                                <p class="login-detail">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email']) }}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Enter new password']) }}
                            
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password']) }}
                            
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                                <button class="signin btn" type="submit">Change Password</button>
                        </div>
                        <!-- First Step End Here -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->
@endsection
