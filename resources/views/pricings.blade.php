@extends('layouts.default')
@section('content')

<section class="ser-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="head-sec">
					<h3>Services</h3>
				</div>
				<div class="inner-sec">
					<div class="tab-head">							
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#care">Maintained Care</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#Pinch">In a Pinch</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#Hotel">Hotel</a>
							</li>
						</ul>
					</div>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="care" class="container tab-pane active">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="head-sec">
										<h5>Maintained Care</h5>
									</div>
									<div class="inner-sec">
										<h6>OCCASIONAL or SEMI-REGULAR CARE</h6>
										<p>If you need childcare assistance on a semi­-regular basis, or want to set up care with sufficient notice, from an exceptional nanny, you are in the right place!
										Our nannies specialize in date night and here or there care. You might not be in need of a full-time nanny, and our on-call services are what we specialize in.
										Our team of nannies are the best in the biz. They are trained, screened and ready to swoop in with support (even if you don’t need them EVERY single day).
										Let us help you when life happens!
										<h6>LONG TERM CARE</h6>
										<p>You are in need of a long-­term nanny to offer support to your family; anywhere from 3-40 hours a week. You desire a trustworthy nanny with a proven track record of providing exceptional support!
										</p>
										<p>The only problem is that you don’t have the time or resources to find the PERFECT MATCH and you don’t want to fuss with the taxes, etc.</p>
										<p>That’s where we come in! At Portland Nanny, we specialize in screening nannies and matching them with families who share similar values. You can rest easy knowing that Portland Nanny will do ALL of the heavy lifting for you.</p>
										<h6>Rates:</h6>
										<p>There is a monthly service fee of $13 charged at the end of the month for any usage in that past month. This does not change whether you use us 1 time, or 20 times within that month!</p>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="img-sec">
										<img src="{{ url('/') }}/images/website/services-sec.png" alt="Image">
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Regular Rates</h6>
											<li>$20 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
										</ul>
										<ul>
											<h6>Sleeping Rate (if during an overnight shift only)</h6>
											<li>$15/hour if all children asleep</li>
										</ul>
										<ul>
											<h6>Shared Care Rates (Nanny Share)</h6>
											<li>$25 per hour (2 kids total, from different families)</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about overnight shared care rates (booking@portlandnanny)</li>
										</ul>
										<ul>
											<h6>Infant Multiples (Under 12 months)</h6>
											<li>$23 per hour for twins</li>
											<li>$26 per hour for triplets</li>
											<li>$29 per hour for quadruplets</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Hotel care</h6>
											<li>$30 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about shared care (more than one family) hotel rates</li>
										</ul>
										<ul>
											<h6>*Holidays:</h6>
											<li>$25 per hour</li>
											<li>Please call for holiday shared-care rates</li>
											<li>Thanksgiving Day</li>
											<li>Christmas Day</li>
											<li>New Years Eve</li>
											<li>New Years Day</li>
											<li>Labor Day</li>
											<li>Memorial Day</li>
											<li>4th of July</li>
										</ul>
									</div>
								</div>
								<div class="col-md-12">
									<div class="list-outer transparent">
										<ul>
											<li>We guarantee a maximum ratio of 4:1 (children:nanny).  If you need child care for more than 4 children, please call us directly.  We’d be happy to work with you on this!</li>
											<li>We require a minimum of 4 hours for our services before 5pm; all services after 5pm  require a minimum of 3 hours.  Should you need less than this amount of hours, you will be billed for the minimum of 3 or 4 hours, depending on the  time of day.</li>
											<li>Keep in mind, rates are higher if children are from more than one family; i.e. shared care</li>
											<li>Mileage reimbursement: Families are responsible for directly reimbursing nannies for driving of the nannies’ own vehicles on the job. The standard rate of .53/per mile- taken from the State of Oregon website. This is due upon completion of care.</li>
											<li>Always check out our NEWS page for promotions!</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
														<div id="Pinch" class="container tab-pane">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="head-sec">
										<h5>In a pinch</h5>
									</div>
									<div class="inner-sec">
										<h6>OCCASIONAL or SEMI-REGULAR CARE</h6>
										<p>If you need childcare assistance on a semi­-regular basis, or want to set up care with sufficient notice, from an exceptional nanny, you are in the right place!
										Our nannies specialize in date night and here or there care. You might not be in need of a full-time nanny, and our on-call services are what we specialize in.
										Our team of nannies are the best in the biz. They are trained, screened and ready to swoop in with support (even if you don’t need them EVERY single day).
										Let us help you when life happens!
										<h6>LONG TERM CARE</h6>
										<p>You are in need of a long-­term nanny to offer support to your family; anywhere from 3-40 hours a week. You desire a trustworthy nanny with a proven track record of providing exceptional support!
										</p>
										<p>The only problem is that you don’t have the time or resources to find the PERFECT MATCH and you don’t want to fuss with the taxes, etc.</p>
										<p>That’s where we come in! At Portland Nanny, we specialize in screening nannies and matching them with families who share similar values. You can rest easy knowing that Portland Nanny will do ALL of the heavy lifting for you.</p>
										<h6>Rates:</h6>
										<p>There is a monthly service fee of $13 charged at the end of the month for any usage in that past month. This does not change whether you use us 1 time, or 20 times within that month!</p>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="img-sec">
										<img src="{{ url('/') }}/images/website/services-sec.png" alt="Image">
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Regular Rates</h6>
											<li>$20 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
										</ul>
										<ul>
											<h6>Sleeping Rate (if during an overnight shift only)</h6>
											<li>$15/hour if all children asleep</li>
										</ul>
										<ul>
											<h6>Shared Care Rates (Nanny Share)</h6>
											<li>$25 per hour (2 kids total, from different families)</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about overnight shared care rates (booking@portlandnanny)</li>
										</ul>
										<ul>
											<h6>Infant Multiples (Under 12 months)</h6>
											<li>$23 per hour for twins</li>
											<li>$26 per hour for triplets</li>
											<li>$29 per hour for quadruplets</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Hotel care</h6>
											<li>$30 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about shared care (more than one family) hotel rates</li>
										</ul>
										<ul>
											<h6>*Holidays:</h6>
											<li>$25 per hour</li>
											<li>Please call for holiday shared-care rates</li>
											<li>Thanksgiving Day</li>
											<li>Christmas Day</li>
											<li>New Years Eve</li>
											<li>New Years Day</li>
											<li>Labor Day</li>
											<li>Memorial Day</li>
											<li>4th of July</li>
										</ul>
									</div>
								</div>
								<div class="col-md-12">
									<div class="list-outer transparent">
										<ul>
											<li>We guarantee a maximum ratio of 4:1 (children:nanny).  If you need child care for more than 4 children, please call us directly.  We’d be happy to work with you on this!</li>
											<li>We require a minimum of 4 hours for our services before 5pm; all services after 5pm  require a minimum of 3 hours.  Should you need less than this amount of hours, you will be billed for the minimum of 3 or 4 hours, depending on the  time of day.</li>
											<li>Keep in mind, rates are higher if children are from more than one family; i.e. shared care</li>
											<li>Mileage reimbursement: Families are responsible for directly reimbursing nannies for driving of the nannies’ own vehicles on the job. The standard rate of .53/per mile- taken from the State of Oregon website. This is due upon completion of care.</li>
											<li>Always check out our NEWS page for promotions!</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
														<div id="Hotel" class="container tab-pane">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="head-sec">
										<h5>Hotel</h5>
									</div>
									<div class="inner-sec">
										<h6>OCCASIONAL or SEMI-REGULAR CARE</h6>
										<p>If you need childcare assistance on a semi­-regular basis, or want to set up care with sufficient notice, from an exceptional nanny, you are in the right place!
										Our nannies specialize in date night and here or there care. You might not be in need of a full-time nanny, and our on-call services are what we specialize in.
										Our team of nannies are the best in the biz. They are trained, screened and ready to swoop in with support (even if you don’t need them EVERY single day).
										Let us help you when life happens!
										<h6>LONG TERM CARE</h6>
										<p>You are in need of a long-­term nanny to offer support to your family; anywhere from 3-40 hours a week. You desire a trustworthy nanny with a proven track record of providing exceptional support!
										</p>
										<p>The only problem is that you don’t have the time or resources to find the PERFECT MATCH and you don’t want to fuss with the taxes, etc.</p>
										<p>That’s where we come in! At Portland Nanny, we specialize in screening nannies and matching them with families who share similar values. You can rest easy knowing that Portland Nanny will do ALL of the heavy lifting for you.</p>
										<h6>Rates:</h6>
										<p>There is a monthly service fee of $13 charged at the end of the month for any usage in that past month. This does not change whether you use us 1 time, or 20 times within that month!</p>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="img-sec">
										<img src="{{ url('/') }}/images/website/services-sec.png" alt="Image">
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Regular Rates</h6>
											<li>$20 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
										</ul>
										<ul>
											<h6>Sleeping Rate (if during an overnight shift only)</h6>
											<li>$15/hour if all children asleep</li>
										</ul>
										<ul>
											<h6>Shared Care Rates (Nanny Share)</h6>
											<li>$25 per hour (2 kids total, from different families)</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about overnight shared care rates (booking@portlandnanny)</li>
										</ul>
										<ul>
											<h6>Infant Multiples (Under 12 months)</h6>
											<li>$23 per hour for twins</li>
											<li>$26 per hour for triplets</li>
											<li>$29 per hour for quadruplets</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-md-6">
									<div class="list-outer">
										<ul>
											<h6>Hotel care</h6>
											<li>$30 per hour, up to 2 children</li>
											<li>$3 extra per hour, per additional child</li>
											<li>Ask us about shared care (more than one family) hotel rates</li>
										</ul>
										<ul>
											<h6>*Holidays:</h6>
											<li>$25 per hour</li>
											<li>Please call for holiday shared-care rates</li>
											<li>Thanksgiving Day</li>
											<li>Christmas Day</li>
											<li>New Years Eve</li>
											<li>New Years Day</li>
											<li>Labor Day</li>
											<li>Memorial Day</li>
											<li>4th of July</li>
										</ul>
									</div>
								</div>
								<div class="col-md-12">
									<div class="list-outer transparent">
										<ul>
											<li>We guarantee a maximum ratio of 4:1 (children:nanny).  If you need child care for more than 4 children, please call us directly.  We’d be happy to work with you on this!</li>
											<li>We require a minimum of 4 hours for our services before 5pm; all services after 5pm  require a minimum of 3 hours.  Should you need less than this amount of hours, you will be billed for the minimum of 3 or 4 hours, depending on the  time of day.</li>
											<li>Keep in mind, rates are higher if children are from more than one family; i.e. shared care</li>
											<li>Mileage reimbursement: Families are responsible for directly reimbursing nannies for driving of the nannies’ own vehicles on the job. The standard rate of .53/per mile- taken from the State of Oregon website. This is due upon completion of care.</li>
											<li>Always check out our NEWS page for promotions!</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- Form Section End Here -->

@endsection