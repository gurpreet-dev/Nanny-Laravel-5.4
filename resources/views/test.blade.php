@extends('layouts.default')
@section('content')
<section class="profile-sec">
			<div class="container">
				<div class="row">
					<!-- Left Section End Here -->
					<div class="col-md-12 col-sm-12">
						<div class="pr-inner-sec">
								<div class="col-md-6 col-sm-6 m-auto">
									<div class="details_outer display-setting">
										<div class="pr_name-pay">
											<h5>Add Nanny</h5>
										</div>
									</div>
								</div>
                                
								<div class="row">
								
								<div class="col-md-12">
                                
								<div class="form-outer">
									<form name="Change-Password" class="form-horizontal" role="" method="post" action="#">
                            
                                        <div class="col-md-6">
										<div class="col-md-12 col-sm-12 pl-0">										
											<div class="form-group">
												<label>Email Address</label>
												<input type="text" class="form-control" name="ed" id="" value="" placeholder="Enter Email">
											</div>
										</div>
										<div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>First Name</label>
													<input type="text" class="form-control" name="fn" id="" value="" placeholder="Enter First Name">
												</div>
										</div>
										<div class="col-md-12 p-0">										
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" name="ln" id="" value="" placeholder="Enter Last Name">
											</div>
										</div>
                                        
                                        <div class="col-md-12 p-0">										
											<div class="form-group">
												<label>New Password</label>
												<input type="password" class="form-control" name="ep" id="" value="" placeholder="Enter Password">
											</div>
										</div>
                                        
                                        <div class="col-md-12 p-0">										
											<div class="form-group">
												<label>Confirm Password</label>
												<input type="password" class="form-control" name="ep" id="" value="" placeholder="Enter Confirm Password">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Gender</label>
													<div class="form-group">
																<select class="form-control">
																	<option>--select--</option>
																	<option>Male</option>
																	<option>Female</option>
																</select>
													</div>
												</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Education</label>
													<div class="form-group">
                                    <select class="form-control" name="education">
                                    <option selected="selected" value="">--select--</option>
                                    <option value="High School">High School</option>
                                    <option value="Currently in College">Currently in College</option>
                                    <option value="Associates Degree">Associates Degree</option>
                                    <option value="Undergraduate Degree">Undergraduate Degree</option>
                                    <option value="Currently in Graduate School">Currently in Graduate School</option>
                                    <option value="Graduate Degree">Graduate Degree</option>
                                    </select>
													</div>
												</div>
										</div>
                                        
                                        <div class="col-md-12 p-0">										
											<div class="form-group">
												<label>Mobile</label>
												<input type="password" class="form-control" name="ep" id="" value="" placeholder="Enter Mobile Number">
											</div>
										</div>
                                        
                                        
                                        </div>
                                        
                                        
                                <div class="col-md-6">
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Do You Have Any Allergies Or Aversions?</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Have You Worked With An Agency Before?</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Prefered Age Of Children?</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="Enter Address">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Address 2</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="Enter Address">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>City</label>
												<input type="text" class="form-control" name="fn" id="" value="" placeholder="Enter City">
											</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Gender</label>
													<div class="form-group">
                                        <select class="form-control" name="state">
                                        <option selected="selected" value="">--select--</option>
                                        <option value="AL">Alabama</option><option value="AK">Alaska</option>
                                        <option value="AS">American Samoa</option><option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option></select>
													</div>
												</div>
										</div>
                                        
                                        <div class="col-md-12 col-sm-12 p-0">										
											<div class="form-group">
												<label>Zip</label>
												<input type="number" class="form-control" name="fn" id="" value="" placeholder="Enter Zipcode">
											</div>
										</div>
                                        
                                        </div>
                                        
										<input style="float: none;border-radius: 50px;padding: 0.49rem 2rem;width:  auto;margin: 40px auto 0;" type="submit" class="btn btn-primary btn-block btnSub" value="submit">
									</form>
								</div>
                                
							</div>
							</div>
						</div>
					</div><!-- Profile Right Section End Here -->
				</div>
			</div>
		</section>
@endsection