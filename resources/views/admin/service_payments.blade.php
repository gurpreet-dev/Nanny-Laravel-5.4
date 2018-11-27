@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Website Service Payments</h1>
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
                <div class="box-body" style="overflow-x:auto;">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Profile ID</th>
                                <th>Created On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>   
                                <td>{{ $payment->id }}</td>
                                <td><a href="{{ url('/') }}/admin/users/view/{{ $payment->user->id }}" target="_blank">{{ $payment->user->first_name1 .' '. $payment->user->last_name1 }}</a></td>
                                <td>{{ $payment->start_date }}</td>
                                <td>{{ $payment->end_date }}</td>
                                <td>${{ $payment->amount }}</td>
                                <td>{{ $payment->profile_id }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                @if($payment->status == 'ongoing')
                                <span class="label label-success">{{ ucwords($payment->status) }}</span>
                                @else
                                <span class="label label-danger">{{ ucwords($payment->status) }}</span>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Profile ID</th>
                                <th>Created On</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<script>

// $(document).ready(function() {
//     // Setup - add a text input to each footer cell
//     $('#example tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//     } );
 
//     // DataTable
//     var table = $('#example').DataTable({
//       'paging'      : true,
//       'lengthChange': false,
//       'searching'   : true,
//       'ordering'    : false,
//       'info'        : true,
//       'autoWidth'   : true
//     });
 
//     // Apply the search
//     table.columns().every( function () {
//         var that = this;
 
//         $( 'input', this.footer() ).on( 'keyup change', function () {
//             if ( that.search() !== this.value ) {
//                 that
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
// } );

</script>

@endsection