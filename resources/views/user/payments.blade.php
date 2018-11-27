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
                                <h5>Payment History</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row borde-top">
                        <div class="col-md-4">
                            <h4>Pending Invoice</h4>
                        </div>
                        <div class="col-md-8">
                        <p><label>Late payment Warning:</label>If payment is not received by the day following your care there will be late charges incurred daily of $5.</p>
                        </div>
                    </div>
                    <div id="no-more-tables">
                        <table class="col-md-12 table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th class="numeric">Nanny</th>
                                    <th class="numeric">Amount Pending</th>
                                    <th class="numeric">Price Per Hour</th>
                                    <th class="numeric">Due Date</th>
                                    <th class="numeric">Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pending_invoices) > 0)
                                @foreach($pending_invoices as $pending)
                                <tr>
                                    <td data-title="ID">{{ $pending->id }}</td>
                                    <td data-title="Date">{{ date('d/m/Y', strtotime($pending->created_at)) }}</td>
                                    <td data-title="Nanny" class="numeric">{{ ucwords($pending->order->nanny->first_name.' '.$pending->order->nanny->last_name) }}</td>
                                    <td data-title="Amount Pending" class="numeric">${{ $pending->price + $pending->due_price + $pending->service_charge }}</td>
                                    <td data-title="Price Per Hour" class="numeric">${{ $pending->price_per_hour }}</td>
                                    <td data-title="Due Date" class="numeric">{{ date('d/m/Y', strtotime('+5 days', strtotime($pending->created_at))) }}</td>
                                    <td data-title="Pay"><a href="{{ url('/') }}/user/invoice/{{ base64_encode($pending->id) }}" class="paynow btn" type="button">Pay Now</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No Invoice pending</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 pl-0">
                        <h6 class="history">
                            Payment History
                        </h6>
                    </div>
                        <div id="no-more-tables">
                            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="payment-tbl">
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
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Paid through</th>
                                        <th class="numeric">Nanny</th>
                                        <th class="numeric">Amount Paid</th>
                                        <th class="numeric">Paid on</th>
                                        <!-- <th class="numeric">Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complete_invoices as $complete)
                                    <tr>
                                        <td data-title="ID">{{ $complete->id }}</td>
                                        <td data-title="Date">{{ date('d/m/Y', strtotime($complete->created_at)) }}</td>
                                        <td data-title="Card Number">
                                        {{ $complete->payment_gateway }}
                                        @if($complete->cc_number != '')
                                        <i class="fa fa-question-circle" data-toggle="tooltip" title="Card number: {{ $complete->cc_number }}"></i>
                                        @endif
                                        </td>
                                        <td data-title="Nanny" class="numeric">{{ ucwords($complete->order->nanny->first_name.' '.$complete->order->nanny->last_name) }}</td>
                                        <td data-title="Amount Paid" class="numeric">${{ $complete->amount_paid }}</td>
                                        <td data-title="Paid on" class="numeric">{{ date('d/m/Y', strtotime($complete->payment_date)) }}</td>
                                        <!-- <td data-title="Actions" class="numeric"><a href="#"><img src="images/pdf-file.png"></a><a href="#"><img src="images/Group-346.png"></a>
                                        <a href="#"><img src="images/Group-108.png"></a></td> -->
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

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

@endsection