@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Family requests </h1>
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
                                <th>Request ID</th>
                                <th>User Primary Name</th>
                                <th>User Email</th>
                                <th>Type</th>
                                <th>Requested On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)

                            @if($request->recommended == 1 && $request->recommended_admin == Auth::user()->id)

                            <tr>   
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user->first_name1 .' '. $request->user->last_name1 }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>{{ ucwords($request->type->title) }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>
                                @if($request->status == '0')
                                    <span class="label label-danger">Cancelled</span> 
                                @elseif($request->status == '3')
                                    <span class="label label-danger">Expired</span>
                                @else
                                    <a href="{{url('admin/nanny/requestview/'.$request->id)}}" class="btn btn-info btn-xs">View</a>
                                    @if($request->status == '1')
                                        <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-success btn-xs" disabled>Nanny Assigned</a>
                                    @else
                                        @if(count($request->interests) > 0)
                                            <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-danger btn-xs">Cancel</a>
                                            <span class="label label-success pull-right">Interested</span>
                                        @else

                                            @if($request->recommended == 0)
                                                <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-success btn-xs">Accept</a>
                                            @endif

                                        @endif  
                                    @endif      
                                @endif 

                                @if($request->recommended == 1)
                                <span class="label label-warning">Recommended</span>
                                @endif

                                </td>
                            </tr>
                            @elseif($request->recommended == 0)
                            <tr>   
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user->first_name1 .' '. $request->user->last_name1 }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>{{ ucwords($request->type->title) }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>
                                @if($request->status == '0')
                                    <span class="label label-danger">Cancelled</span> 
                                @elseif($request->status == '3')
                                    <span class="label label-danger">Expired</span>
                                @else
                                    <a href="{{url('admin/nanny/requestview/'.$request->id)}}" class="btn btn-info btn-xs">View</a>
                                    @if($request->status == '1')
                                        <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-success btn-xs" disabled>Nanny Assigned</a>
                                    @else
                                        @if(count($request->interests) > 0)
                                            <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-danger btn-xs">Cancel</a>
                                            <span class="label label-success pull-right">Interested</span>
                                        @else

                                            @if($request->recommended == 0)
                                                <a href="{{url('admin/nanny/requestaction/'.$request->id)}}" class="btn btn-success btn-xs">Accept</a>
                                            @endif

                                        @endif  
                                    @endif      
                                @endif 

                                @if($request->recommended == 1)
                                <span class="label label-warning">Recommended</span>
                                @endif

                                </td>
                            </tr>
                            @endif

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