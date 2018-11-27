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
                        <div class="details_outer">
                            <div class="pr_name-pay">
                                <h5>Booking</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row borde-top">
                        <div class="col-md-12">
                            <h4>Services</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        @foreach($order->services as $service)
                        <li class="list-group-item">{{ $service->service->title }}</li>
                        @endforeach
                    </ul>

                    <div class="col-md-12 pl-0">
                        <h6 class="history">Attendence</h6>
                    </div>
                    <div class="attendence"></div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->


<script>

var timings = $.parseJSON('<?php echo json_encode($dates) ?>');

var events = [];
var i;      
for(i=0; i<Object.keys(timings).length; i++){

    var start = timings[i]['start_date'];
    var title = timings[i]['difference']+' - '+timings[i]['start_time']+'/'+timings[i]['end_time'];
    var end = timings[i]['end_date'];

  events.push({title: title,start: start, end: end} );
}

$('.attendence').fullCalendar({
        themeSystem: 'bootstrap4',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        footer: {
          // left: 'prev,next today',
          // right: 'month,basicWeek,basicDay'
        },
        defaultDate: Date.now(),
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: events,
        eventColor: '#378006'
      });
</script>

@endsection