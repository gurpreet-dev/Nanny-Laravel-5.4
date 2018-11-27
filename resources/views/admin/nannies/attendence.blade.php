@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>Time Counter</h1>
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

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Attendence -  <strong>{{ date('d M, Y') }}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                @php

                $current_date = time();
                $start_date = strtotime($order->start_date);

                @endphp

                @if($current_date >= $start_date)

                    @if(count($checkin)<1)
                        
                        @if($minutes < (40 * 60))

                            <form action="{{ route('attendence', ['id' => base64_encode($order->id)]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="checkin">
                                <button type="submit" class="btn btn-primary">Checkin</button>
                            </form>

                        @else

                            <div class="alert alert-warning">You've reached the 40 hours weekly limit.</div>

                        @endif

                    @else

                        <ul class="list-group">
                            <li class="list-group-item"><strong>Start Time:</strong> {{ $checkin->start_time }}</li>
                        </ul>

                        @if($checkin->end_time == '')
                            
                            <form action="{{ route('attendence', ['id' => base64_encode($order->id)]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="type" value="checkout">
                                <input type="hidden" name="id" value="{{ $checkin->id }}">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>

                        @else

                            <ul class="list-group">
                                <li class="list-group-item"><strong>End Time:</strong> {{ $checkin->end_time }}</li>
                            </ul>

                            @php

                            $total_time = date('H:i', strtotime($checkin->end_time) - strtotime($checkin->start_time));

                            @endphp

                            <ul class="list-group">
                                <li class="list-group-item"><strong>Total Time:</strong> {{ $total_time }}</li>
                            </ul>



                        @endif

                    @endif

                @endif    
                </div>
                <!-- /.box-body -->
            </div>
            </div>

            <div class="col-md-6">
            @if(count($checkin)<1)
            <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title">Add time manualy</h3>
                </div>
                <div class="box-body">
                @if($minutes < (40 * 60))
                <form action="{{ route('manualCheckin', ['id' => base64_encode($order->id)]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="bootstrap-timepicker">
                                    <label>Start time</label>
                                    <input type="text" name="checkin" class="form-control" id="timepicker1" placeholder="Start time">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="bootstrap-timepicker">
                                    <label>End time:</label> 
                                    <input type="text" name="checkout" class="form-control" id="timepicker2" placeholder="End time">
                                </div> 
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary">Submit</button>    
                            </div>
                        </div>    
                    </div>
                </form> 
                @else

                    <div class="alert alert-warning">You've reached the 40 hours weekly limit.</div>

                @endif   
                </div>
                <!-- /.box-body -->
            </div>
            @endif 

        </div>
    </div>
</section>

<script>
$('#timepicker1').timepicker({
    disableFocus: true,
    showInputs: false,
    showSeconds: true,
    showMeridian: false,
    minuteStep: 1
});

$('#timepicker2').timepicker({
    disableFocus: true,
    showInputs: false,
    showSeconds: true,
    showMeridian: false,
    minuteStep: 1
});
</script>

@endsection