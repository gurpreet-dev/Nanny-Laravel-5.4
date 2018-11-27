@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Change Nanny</h1>
    <small>Order ID: {{ $order->id }}</small>
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
                    <h3 class="box-title">Current Nanny</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                	<table class="table table-condensed">
                        <tbody>
                            <tr><th>ID</th><td>{{ $order->nanny->id }}</td></tr>
                            <tr><th>Name</th><td>{{ ucwords($order->nanny->first_name.' '.$order->nanny->last_name) }}</td></tr>
                            <tr>
                                <td colspan="2" id="calender"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Previous Nannies</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                	<table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assign Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($previous_nannies as $nanny)
                            <tr>
                            	<td>{{ $nanny->nanny->id }}</td>
                                <td><a href="{{url('admin/viewnanny/'.$nanny->nanny->id)}}" target="_blank">{{ ucwords($nanny->nanny->first_name.' '.$nanny->nanny->last_name) }}</a>
                                </td>
                                <td>{{ $nanny->nanny->email }}</td>
                                <td>{{ $nanny->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">All Nannies</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover example2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nannies as $nanny)
                            <tr>
                                <td><a href="{{url('admin/viewnanny/'.$nanny->id)}}" target="_blank">{{ ucwords($nanny->first_name.' '.$nanny->last_name) }}</a>
                                @if($order->admin_id == $nanny->id)
                                <span class="label label-warning">Assigned</span>
                                @endif
                                </td>
                                <td>{{ $nanny->email }}</td>
                                <td>
                                <a href="{{url('admin/nanny/schedule/'.$nanny->id)}}" class="btn btn-warning btn-xs" target="_blank"><strong>Schedule</strong></a>
                                @if($order->admin_id == $nanny->id)
                                <span class="label label-info">Assigned</span>
                                @else
                                <a href="{{url('admin/bookings/changenanny/'.$order->id.'/'.$nanny->id)}}" class="btn btn-success btn-xs"><strong>Assign</strong></a>
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


    </div>
</section>                

@endsection