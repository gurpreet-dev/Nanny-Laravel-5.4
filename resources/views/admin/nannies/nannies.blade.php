@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>All Nannies  <a href="{{url('admin/nannies/add')}}" class="btn btn-warning">Add Nanny</a></h1>
    
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol> -->
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

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

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th class="center">Current week hours</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nannies as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->first_name}}</td>
                                <td>{{$data->last_name}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                @php
                                $hours = date('H', mktime(0, $data->hours));
                                $minutes = date('i', mktime(0, $data->hours));
                                @endphp

                                @if($hours >= 0 && $hours < 40)
                                <span class="label label-success">{{ $hours.' hr '. $minutes.' min' }}</span>
                                @else
                                <span class="label label-danger">{{ $hours.' hr '. $minutes.' min' }}</span>
                                @endif
                                </td>
                                <td>
                                @if($data->status == 1)
                                <span class="label label-success">Active</span>
                                @else
                                <span class="label label-danger">Inactive</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/viewnanny/'.$data->id)}}" class="btn btn-xs btn-info" target="_blank">View</a>
                                    <a href="{{url('admin/editnanny/'.$data->id)}}" class="btn btn-xs btn-success">Edit</a>
                                    <a href="{{url('admin/cpnanny/'.$data->id)}}" class="btn btn-xs btn-warning">Change Password</a>
                                    <!-- <a href="{{url('admin/nannies/delete/'.$data->id)}}" class="btn btn-xs btn-danger" onclick="if (confirm('Are you sure you want to delete this nanny?')) { return true; } return false;">Delete</a> -->
                                    <a href="{{url('admin/nanny/schedule/'.$data->id)}}" class="btn btn-xs btn-info" target="_blank">Schedule</a>
                                    
                                    @if($data->status == 1)
                                    <a href="{{url('admin/nanny/changestatus/'.$data->id.'/0')}}" class="btn btn-xs btn-default"><i class="fa fa-thumbs-down"></i> Disable</a>
                                    @else
                                    <a href="{{url('admin/nanny/changestatus/'.$data->id.'/1')}}" class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Enable</a>
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