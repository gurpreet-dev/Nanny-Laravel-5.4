@extends('layouts.default')
@section('content')

<section class="thank-sec">
	<div class="container">
		<div class="row">
		@if($data['type'] == 'success')
			<div class="thankyou">
				<img src="{{ url('/') }}/images/website/pay_success.png" alt="success">
				<h3>Thank You</h3>
				<p>Transaction ID: {{ $data['transaction_id'] }}</p>
				<p>Your invoice has been paid successfully</p>
				<a href="{{ url('/') }}/user/payments" class="btn btn-default back-btnn">Back to payments page</a>
			</div>
		@else
			<div class="thankyou">
				<img src="{{ url('/') }}/images/website/pay_error.png" alt="success">
				<h3 style="color: #dd4322; font-size: 30px;">Transaction Failed</h3>
				<p>Transaction has not been completed. Please try again later.</p>
				<a href="{{ url('/') }}/user/iwpp/{{ $data['invoice_id'] }}" class="btn btn-default back-btnn">Try again</a>
			</div>
		@endif

		</div>
	</div>
</section><!-- Form Section End Here -->

@endsection