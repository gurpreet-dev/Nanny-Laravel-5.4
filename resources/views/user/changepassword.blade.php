@extends('layouts.default')

@section('content')

<section class="profile-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="inner-sec">
                    <div class="sidebar-outer">
                        <div class="head-sec">
                            <h5>Account Settings</h5>
                        </div>
                        <div class="menu_sec">
                            @component('components.user_sidebar')
                            
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div><!-- Left Section End Here -->
            <div class="col-md-9 col-sm-9">
                <div class="pr-inner-sec">
                    <div class="col-md-5 col-sm-5 m-auto">
                        <div class="form-outer">
                            <div class="head-sec">
                                <h6>Change Password</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            </div>


                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>    
                            @endif

                             @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>    
                            @endif

                            <form class="form-horizontal" role="" id="changepass" method="post" action="{{url('user/changepassword')}}" autocomplete="nope">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="password" class="form-control" value="" name="opassword" placeholder="Current Password" autocomplete="nope">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="npassword" id="npassword" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="cpassword" placeholder="Retype New Password">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block btnSub" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>

$("#changepass").validate({
    rules: {
        opassword: {
            required: true
        },
        npassword: {
            required: true,
            minlength: 6
        },
        cpassword: {
            required: true,
            minlength: 6,
            equalTo: "#npassword"
        },

    },
    messages: {
        opassword: {
            required: 'Please enter old password',
        },
        npassword: {
            required: "Please enter new password",
            minlength: "New password must be at least 6 characters long"
        },
        cpassword: {
            required: "Please confirm a password",
            minlength: "Confirm password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"
        }
    }
});

</script>

@endsection