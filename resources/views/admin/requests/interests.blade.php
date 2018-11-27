@extends('layouts.admin')
@section('content')

<section class="content-header">
    @if($request->recommended == 1)
    <h1>Recommended nanny </h1>
    @else
    <h1>Interests </h1>
    @endif
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
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
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Request Info (ID: {{ $request->id }})</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th>Services</th>
                                <td>
                                    <ul class="list-group">
                                        @foreach($services as $service)
                                        <li class="list-group-item">{{$service->service->title}}</li>
                                        @endforeach  
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" id="calender"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        @if($request->recommended == 0 && $request->type_id != 2)

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <!-- <h3 class="box-title">Interested Nannies</h3> -->
                    <h3 class="box-title">Nannies</h3>
                    <!-- <small>&nbsp;&nbsp;({{count($interests)}} nannies are interested)</small> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php

                            $interested_nannies = [];
                            @endphp
                            @foreach($interests as $interested)
                            @if($interested->interestednanny != null)
                            @php $interested_nannies[] = $interested->interestednanny->id; @endphp
                            @endif
                            @endforeach

                            @foreach($nannies as $nanny)
                            <tr>   
                                <td>{{ $nanny->id }} 
                                @if(in_array($nanny->id, $interested_nannies))
                                <span class="label label-info">Interested</span>
                                @endif
                                </td>
                                <td><a href="{{url('admin/viewnanny/'.$nanny->id)}}" target="_blank">{{ ucwords($nanny->first_name.' '.$nanny->last_name) }}</a>
                                @if($request->assigned_admin == $nanny->id)
                                <span class="label label-warning">Assigned</span>
                                @endif
                                </td>
                                <td>{{ $nanny->email }}</td>
                                <td>
                                <a href="{{url('admin/nanny/schedule/'.$nanny->id)}}" class="btn btn-warning btn-xs" target="_blank"><strong>Schedule</strong></a>
                                @if($request->assigned_admin == $nanny->id)
                                <a href="{{url('admin/requests/unassign/'.$request->id)}}" class="btn btn-danger btn-xs"><strong>Cancel</strong></a>
                                @else
                                <a href="{{url('admin/requests/assign/'.$request->id.'/'.$nanny->id)}}" class="btn btn-success btn-xs"><strong>Assign</strong></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        @elseif($request->recommended == 1)

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Recommended Nanny</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="" class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $request->recommendedadmin->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $request->recommendedadmin->first_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><a href="{{ url('/') }}/admin/viewnanny/{{ $request->recommendedadmin->id }}"> {{ $request->recommendedadmin->email }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url('admin/nanny/schedule/'.$request->recommendedadmin->id)}}" class="btn btn-default btn-xs" target="_blank"><strong>Schedule</strong></a>
                    @if($request->assigned_admin != '')
                    <a href="{{url('admin/requests/unassign/'.$request->id)}}" class="btn btn-danger btn-xs pull-right"><strong>Cancel</strong></a>
                    @else
                    <a href="{{url('admin/requests/assign/'.$request->id.'/'.$request->recommendedadmin->id)}}" class="btn btn-success btn-xs pull-right"><strong>Assign</strong></a>
                    @endif
                  </div>
            </div>
            <!-- /.box -->
        </div>

        @elseif($request->type_id == '2')

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">All Nannies</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nannies as $nanny)
                            <tr>   
                                <td>{{ $nanny->id }}</td>
                                <td><a href="{{url('admin/viewnanny/'.$nanny->id)}}" target="_blank">{{ ucwords($nanny->first_name.' '.$nanny->last_name) }}</a>
                                @if($request->assigned_admin == $nanny->id)
                                <span class="label label-warning">Assigned</span>
                                @endif
                                </td>
                                <td>{{ $nanny->email }}</td>
                                <td>
                                <a href="{{url('admin/nanny/schedule/'.$nanny->id)}}" class="btn btn-warning btn-xs" target="_blank"><strong>Schedule</strong></a>
                                @if($request->assigned_admin == $nanny->id)
                                <a href="{{url('admin/requests/unassign/'.$request->id)}}" class="btn btn-danger btn-xs"><strong>Cancel</strong></a>
                                @else
                                <a href="{{url('admin/requests/assign/'.$request->id.'/'.$nanny->id)}}" class="btn btn-success btn-xs"><strong>Assign</strong></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        @endif


    </div>
</section>

<script>

var timings = $.parseJSON('<?php echo json_encode($request->dates) ?>');

var events = [];
var i;		
for(i=0; i<Object.keys(timings).length; i++){

  var split_start = timings[i]['date'].split('/');
  var new_date = split_start[2]+'-'+split_start[0]+'-'+split_start[1]
  var start = new_date+ 'T' +timings[i]['start_time'];
  var end = new_date+ 'T' +timings[i]['end_time'];
  events.push({title: '',start: start,end: end} );
}

console.log(events);

$('#calender').fullCalendar({
        
        
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
        events: events
      });
</script>

@endsection