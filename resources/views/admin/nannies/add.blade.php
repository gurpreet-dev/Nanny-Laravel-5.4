@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Add Nanny</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new nanny</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="nanny-add" method="post" action="{{route('addnanny')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Email Address', null, ['class' => 'control-label']) }}
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email']) }}
                        
                            @if ($errors->has('email'))
                                <label class="error">{{ $errors->first('email') }}</label>
                            @endif

                        </div>
                        <div class="form-group">
                            {{ Form::label('First Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'Enter First Name']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Last Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Last Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('New Password', null, ['class' => 'control-label']) }}
                            {{ Form::password('npassword',  ['class' => 'form-control', 'id' => 'npassword', 'placeholder' => 'Enter New Password']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Confirm Password', null, ['class' => 'control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Gender', null, ['class' => 'control-label']) }}
                            {{ Form::select('gender',  ['male' => 'Male', 'female' => 'Female'], null , ['class' => 'form-control', 'placeholder' => '--select--']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Education', null, ['class' => 'control-label']) }}
                            {{ Form::select('education',  
                                [
                                    'High School' => 'High School',
                                    'Currently in College' => 'Currently in College',
                                    'Associates Degree' => 'Associates Degree',
                                    'Undergraduate Degree' => 'Undergraduate Degree',
                                    'Currently in Graduate School' => 'Currently in Graduate School',
                                    'Graduate Degree' => 'Graduate Degree'
                                ],
                                null , ['class' => 'form-control', 'placeholder' => '--select--']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Mobile', null, ['class' => 'control-label']) }}
                            {{ Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'Enter Mobile number']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Alternative Number', null, ['class' => 'control-label']) }}
                            {{ Form::text('alt_mobile', '', ['class' => 'form-control', 'placeholder' => 'Enter alternative number']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Do you have any allergies or aversions?', null, ['class' => 'control-label']) }}
                            {{ Form::text('allergies_or_aversions', '', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Have you worked with an agency before?', null, ['class' => 'control-label']) }}
                            {{ Form::text('worked_before', '', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Prefered Age of Children?', null, ['class' => 'control-label']) }}
                            {{ Form::text('children_age', '', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Address', null, ['class' => 'control-label']) }}
                            {{ Form::text('address_1', '', ['class' => 'form-control', 'placeholder' => 'Enter home address']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Address 2', null, ['class' => 'control-label']) }}
                            {{ Form::text('address_2', '', ['class' => 'form-control', 'placeholder' => 'Enter address']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('City', null, ['class' => 'control-label']) }}
                            {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Enter city name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('State', null, ['class' => 'control-label']) }}
                            {{ Form::select('state',  ["AL" => "Alabama", "AK" => "Alaska", "AS" => "American Samoa", "AZ" => "Arizona", "AR" => "Arkansas", "AE" => "Armed Forces - Europe", "AP" => "Armed Forces - Pacific", "AA" => "Armed Forces - USA/Canada", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MH" => "Marshall Islands", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VI" => "Virgin Islands", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming"], null , ['class' => 'form-control', 'placeholder' => '--select--']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Zip', null, ['class' => 'control-label']) }}
                            {{ Form::text('zip', '', ['class' => 'form-control', 'placeholder' => 'Enter zipcode']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Profile image', null, ['class' => 'control-label']) }}
                            {{ Form::file('image', ['class' => 'form-control', 'id' => 'upload']) }}
                        </div>
                        <div class="form-group">
                            <img src="" class="previewHolder" style="height: 120px;"/>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
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