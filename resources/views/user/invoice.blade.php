@extends('layouts.default')
@section('content')

<style>
#pay-load{
    width: 50px;
    height: 50px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    z-index: 999;
}

   #pay-load img{
    	width:100%;
    	float: left;
    }
</style>

<div id="pay-load" style="display: none;">
<img src="{{ url('/') }}/images/website/loader.gif">
</div>

<section class="profile-sec">
	<div class="container">
		<div class="row">
			<!-- Left Section End Here -->
			<div class="col-md-12 col-sm-12">
				<div class="pr-inner-sec">
						<div class="col-md-6 col-sm-6 m-auto">
							<div class="details_outer display-setting">
								<div class="pr_name-pay">
									<h5>Invoice Payment</h5>
								</div>
							</div>
						</div>
						<div class="col-md-12 pl-0">
							<h6 class="history">
								Booking details
							</h6>
						</div>
						<div class="row">
						<div class="col-md-6">
							<table class="col-md-12 table-bordered table-striped table-condensed cf">
							
							<tbody>
								<tr>
									<th>Total hours</th>
									<td data-title="Time">{{ $invoice['time'] }} hr</td>
								</tr>
								<tr>
									<th>Price</th>
									<td data-title="Nanny">${{ $invoice['price_per_hour'] }} per hour</td>
								</tr>
								<tr>
									<th>Childs</th>
									<td data-title="Nanny">{{ $invoice['order']['request']['childs'] }}</td>
								</tr>
								<tr>
									<th>Price</th>
									<td data-title="Price">${{ $invoice['price'] }}</td>
								</tr>
								<tr>
									<th>Due Price</th>
									<td data-title="Price">${{ $invoice['due_price'] }}</td>
								</tr>
								<tr>
									<th>Service Charge</th>
									<td data-title="Price">${{ $invoice['service_charge'] }} for {{count($invoice['months'])}} month</td>
								</tr>
								<tr>
									<th>Total Price</th>
									<td data-title="Price">${{ $invoice['price'] + $invoice['due_price'] + $invoice['service_charge'] }}</td>
								</tr>
							</tbody>
						</table>
						</div>
						<div class="col-md-6">
						<div class="form-outer">
							<form name="Change-Password" class="form-horizontal" role="" method="post" action="#" id="cc_invoice">
								<div class="col-md-8 col-sm-8 pl-0">										
									<div class="form-group">
										<label>Card Number</label>
										<input type="text" class="form-control" name="cc_number" id="" value="{{ $invoice['user']['cc_number'] }}" placeholder="1234  5678  9101 1213">
									</div>
								</div>
								<div class="col-md-4 col-sm-4 p-0">										
									<div class="form-group">
										<label>card Type</label>
											<div class="form-group">
												{{ Form::select('cc_type', ['MasterCard' => 'MasterCard', 'Visa' => 'Visa', 'Discover' => 'Discover', 'JCB' => 'JCB', 'American Express' => 'American Express'], $invoice['user']['cc_type'], ['class' => 'form-control']) }}
											</div>
										</div>
								</div>
								<!-- <div class="col-md-12 p-0">										
									<div class="form-group">
										<label>Cardholder Name</label>
										<input type="text" class="form-control" name="fn" id="" value="" placeholder="John Doe">
									</div>
								</div> -->
								<div class="col-md-8 col-sm-8 pl-0">										
									<div class="form-group">
									<label>Expiry month/Date</label>
									<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" name="cc_expire_date_month" id="" value="{{ $invoice['user']['cc_expire_date_month'] }}" placeholder="MM" maxlength="2">
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" name="cc_expire_date_year" id="" value="{{ $invoice['user']['cc_expire_date_year'] }}" placeholder="YYYY" maxlength="4">
										</div>
									</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 p-0">										
									<div class="form-group">
										<label>CVV</label>
										<input type="text" class="form-control" name="cvv" id="" value="" placeholder="123">
									</div>
								</div>
								<input type="button" class="btn btn-primary btn-block btnSub" value="Pay Now">
							</form>

							<span style="width: 100%; float: left; text-align: center; font-size: 17px; padding: 20px; font-weight: 600;">-OR-</span>

							<a href="{{ url('/') }}/user/iwpp/{{ base64_encode($invoice['id']) }}" class="btn btn-primary btn-block btnSub" style="background-color: #9054EF; float:left; border-color: #9054EF;">Pay with PayPal</a>

						</div>
					</div>
					</div>
				</div>
			</div><!-- Profile Right Section End Here -->
		</div>
	</div>
</section>

<script>
	var cc_pay = $("#cc_invoice").validate({
        rules: {
            cc_number: {
                required: true,
                minlength: 16,
                digits: true
            },
            cc_expire_date_month: {
                required: true,
                digits: true,
            },
            cc_expire_date_year: {
                required: true,
                digits: true,
                minlength: 4,
            },
            cvv: "required",
        },
        messages: {
            cc_number: {
                required: 'Please enter card number',
                minlength: 'Card number must be of atleast 16 characters long',
                digits: 'Please enter digits only'
            },
            cc_expire_date_month: {
                required: 'Please enter expiry month',
                digits: 'Please enter digits only'
            },
            cc_expire_date_year: {
                required: 'Please enter expiry year',
                digits: 'Please enter digits only',
                minlength: 'Please enter valid expiry year e.g 2020'
            },
            cvv: "Please enter cvv"
        }
    });

	$("#cc_invoice input[type='button']").click(function(){
		if(cc_pay.form()){
			$.ajax({
                url: '{{ url("/") }}/user/invoice_payment/{{ base64_encode($invoice["id"]) }}',
                method: 'post',
                data: $("#cc_invoice").serialize()+'&_token='+'{{ csrf_token() }}',
                dataType: 'json',
                beforeSend: function() {
                    $("#pay-load").show();
                    $(this).prop('disabled', true);
                },
                success: function(json) {
                	$(this).prop('disabled', false);

                	$("#pay-load").hide();

                    if (json['isSuccess'] == 'true') {
                        swal({
						  type: 'success',
						  title: 'Success',
						  text: 'Payment Successfull with transaction ID: '+json['transaction_id'],
						  showConfirmButton: false,
						  footer: '<a href="<?php echo url('/') ?>/user/payments" class="swal2-confirm swal2-styled">OK</a>',
						  allowOutsideClick: false
						})

                    }else{
                    	swal({
						  type: 'error',
						  title: 'Oops...',
						  text: json['error']
						})
                    }

                }
            });
		}
	});

</script>
@endsection