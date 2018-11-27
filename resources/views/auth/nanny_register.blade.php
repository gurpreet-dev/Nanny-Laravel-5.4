
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
											<h5>Be a Nanny</h5>
										</div>
									</div>
								</div>
                                
								<div class="row">
								
								<div class="col-md-12">

								@if(Session::has('success'))
					                <div class="alert alert-success">{{ Session::get('success') }}</div>
					            @endif

					            @if(Session::has('error'))
					                <div class="alert alert-danger">{{ Session::get('error') }}</div>
					            @endif
                                
								<div class="form-outer">
									<form name="Change-Password" id="nanny-add" class="form-horizontal d-block" role="" method="post" action="{{ url('nanny/register')}}">
                            			{{ csrf_field() }}

										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>First name</label>
													<input type="text" class="form-control" name="first_name" id="" value="{{ old('first_name') }}" placeholder="Enter First Name" required="">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
												<label>Last Name</label>
													<input type="text" class="form-control" name="last_name" id="" value="{{ old('last_name') }}" placeholder="Enter Last Name" required="">
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" name="email" id="" value="{{ old('email') }}" placeholder="Enter Email" required="">

													@if ($errors->has('email'))
														<label class="error">{{ $errors->first('email') }}</label>
													@endif
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Gender</label>
													<div class="form-group">
														<select class="form-control" name="gender">
															<option value="male">Male</option>
															<option value="female">Female</option>
														</select>
													</div>
												</div>
											</div>
										</div>



										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="npassword" id="npassword" value="" placeholder="Enter Password">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="password" id="" value="" placeholder="Enter Confirm Password">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
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
											<div class="col">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" class="form-control" name="mobile" id="" value="{{ old('mobile') }}" placeholder="Enter Mobile Number">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Alternative number</label>
													<input type="text" class="form-control" name="alt_mobile" id="" value="{{ old('alt_mobile') }}" placeholder="Enter Alternative Number">
												</div>
											</div>
											<div class="col">
											<div class="form-group">
												{{ Form::label('Do you have any allergies or aversions?', null, ['class' => 'control-label']) }}
												{{ Form::text('allergies_or_aversions', old('allergies_or_aversions'), ['class' => 'form-control']) }}
											</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group">
													{{ Form::label('Have you worked with an agency before?', null, ['class' => 'control-label']) }}
													{{ Form::text('worked_before', old('worked_before'), ['class' => 'form-control']) }}
												</div>
											</div>
											<div class="col">
											<div class="form-group">
												{{ Form::label('Prefered Age of Children?', null, ['class' => 'control-label']) }}
												{{ Form::text('children_age', old('children_age'), ['class' => 'form-control']) }}
											</div>
											</div>
										</div>


										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" name="address_1" id="" value="{{ old('address_1') }}" placeholder="Enter Address">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label>Address 2</label>
													<input type="text" class="form-control" name="address_2" id="" value="{{ old('address_2') }}" >
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" name="city" id="" value="{{ old('city') }}" placeholder="Enter City">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													{{ Form::label('State', null, ['class' => 'control-label']) }}
													{{ Form::select('state',  ["AL" => "Alabama", "AK" => "Alaska", "AS" => "American Samoa", "AZ" => "Arizona", "AR" => "Arkansas", "AE" => "Armed Forces - Europe", "AP" => "Armed Forces - Pacific", "AA" => "Armed Forces - USA/Canada", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MH" => "Marshall Islands", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VI" => "Virgin Islands", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming"], old('state'), ['class' => 'form-control', 'placeholder' => '--select--']) }}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group">
													<label>Zip</label>
													<input type="text" class="form-control" name="zip" id="" value="{{ old('zip') }}" placeholder="Enter Zipcode">
												</div>
											</div>
											<div class="col">
												
											</div>
										</div>
                                        
										<button type="submit" class="btn btn-primary btn-block btnSub" style="float: none;border-radius: 50px;padding: 0.49rem 2rem;width:  auto;margin: 40px auto 0;">
                                        <img src="http://gurpreet.gangtask.com/nanny/images/website/arow.png" alt="arow">Submit
                                        </button>

                                    
									</form>
								</div>
                                
							</div>
							</div>
						</div>
					</div><!-- Profile Right Section End Here -->
				</div>
			</div>
		</section>


<script>
$("#nanny-add").validate({
    rules: {
        first_name: "required",
        last_name: "required",
        email: {
            required: true,
            email: true
        },
        gender: "required",
        education: "required",
        mobile: {
            required: true,
            digits: true
        },
        allergies_or_aversions: "required",
        worked_before: "required",
        children_age: "required",
        address_1: "required",
        city: "required",
        state: "required",
        zip: "required",
        image: {
            required: true,
            extension: "jpg|jpeg|png"
        },
        npassword: {
            required: true,
            minlength: 6
        },
        password: {
            required: true,
            minlength: 6,
            equalTo: "#npassword"
        },

    },
    messages: {
        first_name: "Please enter firstname",
        last_name: "Please enter lastname",
        email: {
            required: "Please enter email",
            email: "Please enter valid email address"
        },
        gender: "Please select gender",
        education: "Please select education",
        mobile: {
            required: "Please enter mobile number",
            digits: "Mobile number should contain digits only"
        },
        allergies_or_aversions: "Please fill Do you have any allergies or aversions? field",
        worked_before: "Please fill Have you worked with an agency before? field",
        children_age: "Please fill Prefered Age of Children? field",
        address_1: "Address cannot be blank.",
        city: "City cannot be blank.",
        state: "State cannot be blank.",
        zip: "Zipcode cannot be blank.",
        image: {
            required: "Profile photo is required",
            extension: "Only jpg, jpeg and png formats are accepted"
        },
        npassword: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"

        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"

        },
    }
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#upload").change(function() {
  readURL(this);
});

</script>

@endsection