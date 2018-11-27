@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Booking Details</h1>
</section>

<section class="content">
	<div class="row">
      <div class="col-md-12">
      @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        

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
                  <td>{{ $data->request->user->first_name1 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $data->request->user->last_name1 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $data->request->user->mobile1 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $data->request->user->alt_mobile1 }}</td>
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
                  <td>{{ $data->request->user->first_name2 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $data->request->user->last_name2 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $data->request->user->mobile2 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $data->request->user->alt_mobile2 }}</td>
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
                    <td>{{$data->request->user->id }}</td>
                </tr>
                <tr>
                  <th> Image </th>
                  <td>
                    <?php if($data->request->user->image != ''){ ?>
                    <img src="{{url('/')}}/images/users/{{$data->request->user->image}}" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php }else{ ?>
                    <img src="{{url('/')}}/images/users/noimage.png" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{ $data->request->user->address_1 }}</td>
                </tr>
                <tr>
                  <th>Address 2</th>
                  <td>{{ $data->request->user->address_2 }}</td>
                </tr>
                
                <tr>
                  <th> City </th>
                  <td>{{ $data->request->user->city }}</td>
                </tr>
                <tr>
                  <th> State </th>
                  <td>{{ $data->request->user->state }}</td>
                </tr>
                <tr>
                  <th> Zipcode </th>
                  <td>{{ $data->request->user->zip }}</td>
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
                  <td>{{ $data->request->user->household_info }}</td>
                </tr>
                <tr>
                  <th>Pet Info</th>
                  <td>{{ $data->request->user->pet_info }}</td>
                </tr>
                
                <tr>
                  <th>{{ $data->request->user->q1 }} </th>
                  <td>{{ $data->request->user->a1 }}</td>
                </tr>
                <tr>
                  <th>{{ $data->request->user->q2 }} </th>
                  <td>{{ $data->request->user->a2 }}</td>
                </tr>
                <tr>
                  <th>{{ $data->request->user->q3 }} </th>
                  <td>{{ $data->request->user->a3 }}</td>
                </tr>

                <tr>
                  <th>{{ $data->request->user->q4 }} </th>
                  <td>{{ $data->request->user->a4 }}</td>
                </tr>

                <tr>
                  <th>{{ $data->request->user->q5 }}</th>
                  <td>{{ $data->request->user->a5 }}</td>
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
                  <td>{{ $data->request->user->hear_aboutus }}</td>
                </tr>
                <tr>
                  <th>Which type of Social Media?</th>
                  <td>{{ $data->request->user->which_hear_aboutus }}</td>
                </tr>
                
                <tr>
                  <th>Name of Family / Friend Who Referred You</th>
                  <td>{{ $data->request->user->referred_by }}</td>
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
                  <td>{{ $data->request->user->childs }}</td>
                </tr>
                <tr>
                  <th>Ages</th>
                  <td>
                  @php $ages = json_decode($data->request->user->ages); @endphp
                  @if(!empty($ages))
                  <ul class="list-group">
                  @foreach($ages as $age)
                    <li class="list-group-item">{{$age->age}} Yrs || {{ $age->gender }}</li>
                  @endforeach
                  </ul>
                  @endif
                  </td>
                </tr>
                
                <tr>
                  <th>Gender</th>
                  <td>{{ ucwords($data->request->user->gender) }}</td>
                </tr>

                <tr>
                  <th>Requirement of nanny</th>
                  <td>{{ ucwords($data->request->user->nanny_requirement) }}</td>
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

var timings = $.parseJSON('<?php echo json_encode($data->request->dates) ?>');

var events = [];
var i;		
for(i=0; i<Object.keys(timings).length; i++){

  var split_start = timings[i]['date'].split('/');
  var new_date = split_start[2]+'-'+split_start[0]+'-'+split_start[1]
  var start = new_date+ 'T' +timings[i]['start_time'];
  var end = new_date+ 'T' +timings[i]['end_time'];
  events.push({title: '',start: start,end: end} );
}

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