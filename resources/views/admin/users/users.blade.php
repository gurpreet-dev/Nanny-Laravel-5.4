@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>All Users  <a href="{{url('admin/users/add')}}" class="btn btn-warning">Add User</a></h1>
    
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

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Primary First name</th>
                                <th>Primary Last name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->first_name1}}</td>
                                <td>{{$data->last_name1}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                @if($data->status == 1)
                                <span class="label label-success">Active</span>
                                @else
                                <span class="label label-danger">Inactive</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/users/view/'.$data->id)}}" class="btn btn-xs btn-info" target="_blank">View</a>
                                    <a href="{{url('admin/users/edit/'.$data->id)}}" class="btn btn-xs btn-success">Edit</a>
                                    <a href="{{url('admin/users/cp/'.$data->id)}}" class="btn btn-xs btn-warning">Change Password</a>
                                    <!-- <a href="{{url('admin/users/delete/'.$data->id)}}" class="btn btn-xs btn-danger" onclick="if (confirm('Are you sure you want to delete this user?')) { return true; } return false;">Delete</a> -->
                                    @if($data->status == 1)
                                    <a href="{{url('admin/users/cs/'.$data->id.'/0')}}" class="btn btn-xs btn-default"><i class="fa fa-thumbs-down"></i> Disable</a>
                                    @else
                                    <a href="{{url('admin/users/cs/'.$data->id.'/1')}}" class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Enable</a>
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