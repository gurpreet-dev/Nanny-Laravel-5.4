@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Family requests (In a pinch) </h1>
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
                                <th>Created on</th>
                                <th>Requested for</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>   
                                <td>{{ $request->id }}</td>
                                <td><a href="{{ url('/') }}/admin/users/view/{{ $request->user->id }}" target="_blank"> {{ $request->user->first_name1 .' '. $request->user->last_name1 }}</a></td>
                                <td>{{ $request->user->email }}</td>
                                <td>
                                {{ $request->created_at }}
                                @if($request->status == 2)
                                    <br>
                                    @php

                                    $datetime1 = new DateTime($request->created_at);
                                    $datetime2 = new DateTime();
                                    $interval = $datetime1->diff($datetime2);

                                    @endphp

                                    <h4 class="counter">
                                        @if($interval->format('%h') < 3)
                                            <span class="label label-success">{{ $interval->format('%h')." hr ".$interval->format('%i')." min " }}</span>
                                        @elseif($interval->format('%h') < 6 && $interval->format('%h') >= 3)
                                            <span class="label label-warning">{{ $interval->format('%h')." hr ".$interval->format('%i')." min " }}</span>
                                        @elseif($interval->format('%h') >= 6)
                                            <span class="label label-danger">{{ $interval->format('%h')." hr ".$interval->format('%i')." min " }}</span>
                                        @endif
                                    </h4>
                                @endif
                                </td>
                                <td>
                                    @php
                                    $dates = [];
                                    $min_date = '';
                                    $max_date = '';

                                    if(count($requests) > 0){
                                        foreach($requests as $req){
                                            $start_dates[] = strtotime($req->date.' '.$req->start_time);
                                            $end_dates[] = strtotime($req->date.' '.$req->end_time);
                                        }
                                        $min_date = date('Y-m-d H:i:s', min($start_dates));
                                        $max_date = date('Y-m-d H:i:s', max($end_dates));
                                    }
                                    @endphp
                                    {{ $min_date }}
                                </td>
                                <td>

                                    @if($request->status == '0')
                                        <span class="label label-danger">Cancelled</span> 
                                    @elseif($request->status == '3')
                                        <span class="label label-danger">Expired</span>
                                    @else
                                        <a href="{{url('admin/requests/interests/'.$request->id)}}" class="btn btn-info btn-xs">
                                        @if($request->recommended == 0)
                                        Assign nanny
                                        @else
                                        Recommended Nanny
                                        @endif
                                        </a>
                                    
                                        @if($request->status == 1)
                                        <span class="label label-success">Nanny Assigned</span>
                                        @endif

                                        @if($request->recommended == 1)
                                        <span class="label label-warning">Recommended</span>
                                        @endif
                                        
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

<script>
// setInterval(function()
// {
//     //$('.col-sm-8 .chat_area').load('.chat_area');
//     $("#example2 tbody tr td h4.counter").load(location.href+" .counter>*","");
    
    
// }, 2000);
</script>

@endsection