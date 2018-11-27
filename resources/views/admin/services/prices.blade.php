@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>All prices  <a href="{{url('admin/prices/add')}}" class="btn btn-warning">Add Price</a></h1>
    
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
                                <th>Service</th>
                                <th>Price</th>
                                <th>Childs</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prices as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->service->title}} (Id: {{$data->service->id}})</td>
                                <td>{{ ucwords($data->type->title) }}</td>
                                <td>
                                    <ul class="list-group">
                                    @foreach($data->child_prices as $price)
                                        <li class="list-group-item no-padding">{{ $price->child }} : ${{ $price->price }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{url('admin/prices/edit/'.$data->id)}}" class="btn btn-xs btn-success">Edit</a>
                                    <a href="{{url('admin/prices/delete/'.$data->id)}}" class="btn btn-xs btn-danger" onclick="if (confirm('Are you sure you want to delete this entry?')) { return true; } return false;">Delete</a>
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