<ul>
    <li><a href="{{url('user/profile')}}"><img src="{{url('/')}}/images/website/ic_account_circle_24px.png" alt="Icon">Profile</a></li>
    <li><a href="{{url('user/changepassword')}}"><img src="{{url('/')}}/images/website/ic_brightness_7_24px.png" alt="Icon">Change Password</a></li>
    <!-- <li><a href="{{url('user/card')}}"><img src="{{url('/')}}/images/website/ic_subtitles_24px.png" alt="Icon">Card Details</a></li> -->
    <li><a href="{{url('user/requests')}}"><img src="{{url('/')}}/images/website/ic_subtitles_24px.png" alt="Icon">Request History</a></li>
    <li><a href="{{url('user/payments')}}"><img src="{{url('/')}}/images/website/ic_subtitles_24px.png" alt="Icon">Payment History</a></li>
    <li><a href="{{url('user/bookings')}}"><img src="{{url('/')}}/images/website/ic_subtitles_24px.png" alt="Icon">Bookings</a></li>
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><img src="{{url('/')}}/images/website/Group-269.png" alt="Icon">Sigh out</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</ul>