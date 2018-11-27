@extends('layouts.default')

@section('content')

<section class="profile-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="inner-sec">
                    <div class="sidebar-outer">
                        <div class="head-sec">
                            <h5>Account Settings</h5>
                        </div>
                        <div class="menu_sec">
                            @component('components.user_sidebar')
                            
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div><!-- Left Section End Here -->
            <div class="col-md-9 col-sm-9">
                <div class="pr-inner-sec">
                    <div class="col-md-6 col-sm-6 m-auto">
                        <div class="details_outer">
                            <div class="pr_name-pay">
                                <h5>Request History</h5>
                            </div>
                        </div>
                    </div>

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-success">
                        {{ Session::get('error') }}
                    </div>
                    @endif

                        <div id="no-more-tables">
                            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="request-tbl">
                                <!-- <div class="table-top">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="" name="search" value="" placeholder="Search..">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <label>Show Details:</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <thead class="cf">
                                    <tr>
                                        <th>Date</th>
                                        <th>Services</th>
                                        <th>Type</th>
                                        <th class="numeric">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $request)
                                    <tr>
                                        <td data-title="Date">{{ date('d/m/Y H:i a', strtotime($request['created_at'])) }}</td>
                                        <td data-title="Services">
                                        @php
                                            $services = [];
                                            foreach($request['services'] as $serv){
                                                $services[] = $serv['service']['title'];
                                            }

                                            $services = implode(', ',$services);

                                        @endphp
                                        {{ $services }}
                                        </td>
                                        <td data-title="Type">{{ ucwords($request['type']['title']) }}</td>
                                        <td data-title="Actions" class="numeric">
                                            @if($request['status'] == 2)
                                            <form id="logout-form" action="{{ route('cancelRequest') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $request['id'] }}">
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                            </form>
                                            @elseif($request['status'] == 0)
                                            <span class="badge badge-danger">Cancelled</span>
                                            @elseif($request['status'] == 3)
                                            <span class="badge badge-danger">Expires</span>
                                            @elseif($request['status'] == 1)
                                            <span class="badge badge-success">Nanny Assigned</span>
                                            @endif

                                            <!-- <a href="#"><img src="{{url('/')}}/images/website/pdf-file.png"></a>
                                            <a href="#"><img src="{{url('/')}}/images/website/Group-346.png"></a>
                                            <a href="#"><img src="{{url('/')}}/images/website/Group-108.png"></a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>
  $(function () {
    $('#request-tbl').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

@endsection