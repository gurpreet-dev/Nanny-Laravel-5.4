@extends('layouts.default')
@section('content')

<section class="ser-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="head-sec">
					<h3>{{ $page->title }}</h3>
				</div>
				<div class="inner-sec">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
							{{ $page->content }}
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>
</section>				

@endsection