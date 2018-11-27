@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Invoice Payments</h1>
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
                    <div style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Time (in hrs)</th>
                                <th>Price per hour</th>
                                <th>Price</th>
                                <th>Due Price</th>
                                <th>Nanny</th>
                                <th>Amount Paid</th>
                                <th>Transaction ID</th>
                                <th>Paid through</th>
                                <th>Paid on</th>
                                <th>Due Date</th>
                                <th>Created on</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>   
                                <td>{{ $payment->id }}</td>
                                <td><a href="{{ url('/') }}/admin/nanny/orders/{{ base64_encode($payment->order_id) }}" target="_blank"> {{ $payment->order_id }}</a></td>
                                <td><a href="{{ url('/') }}/admin/users/view/{{ $payment->user_id }}" target="_blank">{{ $payment->user_id }}</a></td>
                                <td>{{ $payment->time }} hrs</td>
                                <td>${{ $payment->price_per_hour }}</td>
                                <td>${{ $payment->price }}</td>
                                <td>${{ $payment->due_price }}</td>
                                <td><a href="{{ url('/') }}/admin/viewnanny/{{ $payment->order->nanny->id }}" target="_blank">{{ $payment->order->nanny->first_name.' '.$payment->order->nanny->last_name }}</a></td>
                                <td>${{ $payment->amount_paid }}</td>
                                <td>{{ ($payment->transaction_id != '') ? $payment->transaction_id : '-' }}</td>
                                <td>{{ ($payment->payment_gateway != '') ? $payment->payment_gateway : '-' }}</td>
                                <td>{{ ($payment->payment_date != '') ? $payment->payment_date : '-' }}</td>
                                <td>{{ date('d/m/Y', strtotime('+5 days', strtotime($payment->created_at))) }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                @if($payment->status == '1')
                                <span class="label label-success">Paid</span>
                                @else
                                <span class="label label-danger">Not Paid</span>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Amount Paid</th>
                                <th>Transaction ID</th>
                                <th>Paid through</th>
                                <th>Paid on</th>
                                <th>Status</th>
                            </tr>
                        </tfoot> -->
                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection