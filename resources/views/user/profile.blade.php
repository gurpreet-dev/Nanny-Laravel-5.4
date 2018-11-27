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
                    <div class="col-md-6 col-sm-6 m-auto">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                        <div class="details_outer">
                            <div class="avatar">
                                @if($user->image != '')
                                <img src="{{url('/')}}/images/users/{{ $user->image }}" alt="Avatar">
                                @else
                                <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                @endif
                            </div>
                            <div class="pr_name">
                                <a href="{{ url('/') }}/user/editprofile"><img src="{{url('/')}}/images/website/edit-pencil.png" alt="Pencil Icon"> Edit Profile</a>
                            </div>
                            <div class="pr_details">
                                <ul>
                                    <li><span class="left">Name:</span> <span class="right">{{$user->first_name1.' '.$user->last_name1}}</span></li>
                                    <li><span class="left">Email:</span> <span class="right">{{$user->email}}</span></li>
                                    <li><span class="left">Address:</span> <span class="right">123 6th St. Melbourne, FL 32904</span></li>
                                    <li><span class="left">Contact:</span> <span class="right">9815282351</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->


@endsection