@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Your Bookings</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Requested By</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>   
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->request->user->first_name1 .' '. $order->request->user->last_name1 }}</td>
                                <td>{{ date('d-M-Y h:i a', strtotime($order->start_date)) }}</td>
                                <td>{{ date('d-M-Y h:i a', strtotime($order->end_date)) }}</td>
                                <td>
                                @if($order->status == 0)
                                <span class="label label-danger">Expired</span>
                                @elseif($order->status == 2)
                                <span class="label label-success">Completed</span>
                                @else
                                @if(strtotime($order->start_date) > time())
                                <span class="label label-warning">New Booking</span>
                                @else
                                <span class="label label-info">Ongoing</span>
                                @endif
                                @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/nanny/orders/'.base64_encode($order->id)) }}" class="btn btn-xs btn-warning" target="_blank">View</a>
                                    <a href="{{ url('admin/bookings/attendence/'.base64_encode($order->id)) }}" class="btn btn-xs btn-success" target="_blank">Attendence</a>
                                    <a href="{{ url('admin/nanny/order/attendence/'.base64_encode($order->id)) }}" class="btn btn-xs btn-info">Checkin</a>
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
    </div>
</section>

@endsection