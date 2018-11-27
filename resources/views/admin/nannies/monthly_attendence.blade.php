@extends('layouts.admin')
@section('content')

<style>
.fc-day-grid-event .fc-time{display:none;}
</style>
<section class="content-header">
    <h1>Attendence</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Attendence</h3>
                </div>
                <!-- /.box-header -->
                <div class="attendence"></div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
    </div>
    </div>
</section>    

<script>

var timings = $.parseJSON('<?php echo json_encode($dates) ?>');

var events = [];
var i;		
for(i=0; i<Object.keys(timings).length; i++){

    // var start_split = timings[i]['start_time'].split(' ');
    // var start = start_split[0]+ 'T' +start_split[1];
    // var end_split = timings[i]['end_time'].split(' ');
    // var end = end_split[0]+ 'T' +end_split[1];

    // var difference = new Date(new Date(timings[i]['end_time']) - new Date(timings[i]['start_time'])).toUTCString().split(" ")[4];

    // difference_split = difference.split(':');

    // var title   =   difference_split[0]+':'+difference_split[1]+' - '+start_split[1]+'/'+end_split[1];

    var start = timings[i]['start_date'];
    var title = timings[i]['difference']+' - '+timings[i]['start_time']+'/'+timings[i]['end_time'];
    var end = timings[i]['end_date'];

  events.push({title: title,start: start, end: end} );
}

$('.attendence').fullCalendar({
        
        
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