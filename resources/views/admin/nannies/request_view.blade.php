@extends('layouts.admin')
@section('content')

<section class="content-header">
@if($data->recommended == 0)
  @if($data->status == 1)
    <h1>Family request <span class="label label-success">Nanny Assigned</span></h1>
  @else
    @if(count($interest) > 0)
    <h1>Family request <a href="{{url('admin/nanny/requestaction/'.$data->id.'?action=view')}}" class="btn btn-danger">Cancel</a> <span class="label label-success">Accepted</span> </h1>
    @else
    <h1>Family request <a href="{{url('admin/nanny/requestaction/'.$data->id.'?action=view')}}" class="btn btn-success">Accept</a></h1>
    @endif
  @endif  
@else
<h1>Family request 
<span class="label label-warning">Recommended</span>
@if($data->status == 1)
<span class="label label-success">Assigned</span>
@endif
</h1>
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

        </div>

        <div class="col-md-6">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Primary Parent</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>

                <tr>
                  <th>First Name</th>
                  <td>{{ $data->user->first_name1 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $data->user->last_name1 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $data->user->mobile1 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $data->user->alt_mobile1 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>                

          <div class="box">
          <div class="box-header">
            <h3 class="box-title">Secondary Parent</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>

                <tr>
                  <th>First Name</th>
                  <td>{{ $data->user->first_name2 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $data->user->last_name2 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $data->user->mobile2 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $data->user->alt_mobile2 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->      
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Basic</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  
                </tr>
                <tr>
                    <th>Id</th>
                    <td>{{$data->user->id }}</td>
                </tr>
                <tr>
                  <th> Image </th>
                  <td>
                    <?php if($data->user->image != ''){ ?>
                    <img src="{{url('/')}}/images/users/{{$data->user->image}}" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php }else{ ?>
                    <img src="{{url('/')}}/images/users/noimage.png" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{ $data->user->address_1 }}</td>
                </tr>
                <tr>
                  <th>Address 2</th>
                  <td>{{ $data->user->address_2 }}</td>
                </tr>
                
                <tr>
                  <th> City </th>
                  <td>{{ $data->user->city }}</td>
                </tr>
                <tr>
                  <th> State </th>
                  <td>{{ $data->user->state }}</td>
                </tr>
                <tr>
                  <th> Zipcode </th>
                  <td>{{ $data->user->zip }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div> 

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Additional Information</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>Household Info</th>
                  <td>{{ $data->user->household_info }}</td>
                </tr>
                <tr>
                  <th>Pet Info</th>
                  <td>{{ $data->user->pet_info }}</td>
                </tr>
                
                <tr>
                  <th>{{ $data->user->q1 }} </th>
                  <td>{{ $data->user->a1 }}</td>
                </tr>
                <tr>
                  <th>{{ $data->user->q2 }} </th>
                  <td>{{ $data->user->a2 }}</td>
                </tr>
                <tr>
                  <th>{{ $data->user->q3 }} </th>
                  <td>{{ $data->user->a3 }}</td>
                </tr>

                <tr>
                  <th>{{ $data->user->q4 }} </th>
                  <td>{{ $data->user->a4 }}</td>
                </tr>

                <tr>
                  <th>{{ $data->user->q5 }}</th>
                  <td>{{ $data->user->a5 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>


                       <div class="box">
          <div class="box-header">
            <h3 class="box-title">How did You Hear About Us</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>How did You Hear About Us?</th>
                  <td>{{ $data->user->hear_aboutus }}</td>
                </tr>
                <tr>
                  <th>Which type of Social Media?</th>
                  <td>{{ $data->user->which_hear_aboutus }}</td>
                </tr>
                
                <tr>
                  <th>Name of Family / Friend Who Referred You</th>
                  <td>{{ $data->user->referred_by }}</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

       <div class="box">
          <div class="box-header">
            <h3 class="box-title">Child details</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>Number of child</th>
                  <td>{{ $data->user->childs }}</td>
                </tr>
                <tr>
                  <th>Ages</th>
                  <td>
                  @php $ages = explode(',',$data->user->ages); @endphp
                  @if(!empty($ages))
                  <ul class="list-group">
                  @foreach($ages as $age)
                    <li class="list-group-item">{{$age}} Yrs.</li>
                  @endforeach
                  </ul>
                  @endif
                  </td>
                </tr>
                
                <tr>
                  <th>Gender</th>
                  <td>{{ ucwords($data->user->gender) }}</td>
                </tr>

                <tr>
                  <th>Requirement of nanny</th>
                  <td>{{ ucwords($data->user->nanny_requirement) }}</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        

</div>
        
        <div class="col-md-6">
      
        
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Request Info</h3>
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
    </div>
</section>  

<script>

var timings = $.parseJSON('<?php echo json_encode($data->dates) ?>');

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