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
                                <h5>Booking History</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row borde-top">
                        <div class="col-md-4">
                            <h4>Pending Invoice</h4>
                        </div>
                        <div class="col-md-8">
                        <p><label>Late payment Warning:</label>If payment is not received by the day following your care there will be late charges incurred daily of $5.</p>
                        </div>
                    </div> -->
                    <div id="no-more-tables">
                        <table class="col-md-12 table-bordered table-striped table-condensed cf" id="payment-tbl">
                            <thead class="cf">
                                <tr>
                                    <th>ID</th>
                                    <th>Nanny</th>
                                    <th>Start Date</th>
                                    <th class="numeric">End Date</th>
                                    <th class="numeric">Type</th>
                                    <th class="numeric">Status</th>
                            </thead>
                            <tbody>
                                @if(count($bookings) > 0)
                                @foreach($bookings as $booking)
                                <tr>
                                    <td data-title="ID">{{ $booking->id }}</td>
                                    <td data-title="Nanny">
                                    @if($booking->nanny != null)
                                    {{ $booking->nanny->first_name.' '.$booking->nanny->last_name }}
                                    @endif
                                    </td>
                                    <td data-title="Start Date">{{ date('d/m/Y', strtotime($booking->start_date)) }}</td>
                                    <td data-title="End Date" class="numeric">{{ date('d/m/Y', strtotime($booking->end_date)) }}</td>
                                    <td data-title="Type" class="numeric">{{ ucwords($booking->request->type) }}</td>
                                    <td data-title="Status" class="numeric">
                                        @if($booking->status == 1)
                                        <span class="badge badge-info">Ongoing</span>
                                        @elseif($booking->status == 2)
                                        <span class="badge badge-success">Completed</span>
                                        @else
                                        <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                        <a href="{{ url('/') }}/user/bookings/{{ base64_encode($booking->id) }}" target="_blank">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No Bookings Yet</td>
                                </tr>
                                @endif
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
    $('#payment-tbl').DataTable({
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