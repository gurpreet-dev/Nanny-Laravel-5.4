@extends('layouts.default')

@section('content')

<style>#tands-error{width: 100%;}</style>

<section class="register-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 m-auto">
                <div class="inner-sec">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step"> 
                                <a href="#step-1" type="button" class="btn btn-success btn-circle"></a>
                            </div>
                            <div class="stepwizard-step"> 
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            </div>
                            <div class="stepwizard-step"> 
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            </div>
                            <div class="stepwizard-step"> 
                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            </div>
                        </div>
                    </div>

                    <form role="form" method="POST" action="{{ url('/register') }}" id="signup-frm">
                        {{ csrf_field() }}
                        <div class="panel panel-primary setup-content" id="step-1">
                            <div class="panel-heading">
                                <div class="col-md-12">
                                    <h5 class="panel-title">Create Account</h5>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <label class="error">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h6>Primary Parent</h6>
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" class="form-control" id="" name="first_name1" value="{{ old('first_name1') }}" placeholder="Enter your name" required>
                                        @if ($errors->has('first_name1'))
                                            <label class="error">This Field is required</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" class="form-control" id="" name="last_name1" value="{{ old('last_name1') }}" placeholder="Enter your name" required>
                                        @if ($errors->has('last_name1'))
                                            <label class="error">This Field is required</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number<span>*</span></label>
                                        <input type="tel" class="form-control" id="" name="mobile1" value="{{ old('mobile1') }}"  placeholder="Enter mobile number" required>
                                        @if ($errors->has('mobile1'))
                                            <label class="error">This Field is required</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h6>Secondary Parent</h6>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="" name="first_name2" value="{{ old('first_name2') }}"  placeholder="Enter your name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="" name="last_name2" value="{{ old('last_name2') }}"  placeholder="Enter your name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="tel" class="form-control" id="" name="mobile2" value="{{ old('mobile2') }}" placeholder="Enter mobile number">
                                    </div>
                                </div>
                                <div class="dis-flex">
                                    <div class="col-md-12 col-sm-12">
                                        <h6>Local Address</h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Address<span>*</span></label>
                                            <input type="text" class="form-control" id="" name="address_1" value="{{ old('address_1') }}" placeholder="Enter local address" required>
                                            @if ($errors->has('address_1'))
                                                <label class="error">This Field is required</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" id="" name="address_2" value="{{ old('address_2') }}" placeholder="Enter additional address">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Country<span>*</span></label>
                                            <select class="form-control">
                                                <option>Select Country</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>City<span>*</span></label>
                                            <input type="text" class="form-control" id="" name="city" value="{{ old('city') }}" placeholder="Enter city" required>
                                            @if ($errors->has('city'))
                                                <label class="error">This Field is required</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>State<span>*</span></label>
                                            {{ Form::select('state',  ["AL" => "Alabama", "AK" => "Alaska", "AS" => "American Samoa", "AZ" => "Arizona", "AR" => "Arkansas", "AE" => "Armed Forces - Europe", "AP" => "Armed Forces - Pacific", "AA" => "Armed Forces - USA/Canada", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MH" => "Marshall Islands", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VI" => "Virgin Islands", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming"], null , ['class' => 'form-control', 'placeholder' => '--select--', 'required']) }}
                                            @if ($errors->has('state'))
                                                <label class="error">This Field is required</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Zip Code<span>*</span></label>
                                            <input type="text" class="form-control" id="" name="zip" value="{{ old('zip') }}" placeholder="Enter zipcode" required>
                                            @if ($errors->has('zip'))
                                                <label class="error">This Field is required</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary nextBtn" type="button">Next</button>
                                </div>
                            </div>
                        </div><!-- First Step End Here -->
                        <div class="panel panel-primary setup-content" id="step-2">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6>Additional Information</h6>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Household Info<span>*</span></label>
                                        <textarea class="form-control" id="" name="household_info" placeholder="'Special house rules, parking instruction, etc" required>{{ old('household_info') }}</textarea>
                                        @if ($errors->has('household_info'))
                                            <label class="error">This Field is required</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Pet Info<span>*</span></label>
                                        <textarea class="form-control" id="" name="pet_info" placeholder="" required>{{ old('pet_info') }}</textarea>
                                        @if ($errors->has('pet_info'))
                                            <label class="error">This Field is required</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{Lang::get('questions.q1')}}<span>*</span></label>
                                        <input type="hidden" class="form-control" id="" name="q1" value="{{Lang::get('questions.q1')}}">
                                        <input type="text" class="form-control" id="" name="a1" value="{{ old('a1') }}" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>{{Lang::get('questions.q2')}}<span>*</span></label>
                                        <input type="hidden" class="form-control" id="" name="q2" value="{{Lang::get('questions.q2')}}">
                                        <input type="text" class="form-control" id="" name="a2" value="{{ old('a2') }}" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>{{Lang::get('questions.q3')}}<span>*</span></label>
                                        <input type="hidden" class="form-control" id="" name="q3" value="{{Lang::get('questions.q3')}}">
                                        <input type="text" class="form-control" id="" name="a3" value="{{ old('a3') }}" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>{{Lang::get('questions.q4')}}<span>*</span></label>
                                        <input type="hidden" class="form-control" id="" name="q4" value="{{Lang::get('questions.q4')}}">
                                        <input type="text" class="form-control" id="" name="a4" value="{{ old('a4') }}" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>{{Lang::get('questions.q5')}}<span>*</span></label>
                                        <input type="hidden" class="form-control" id="" name="q5" value="{{Lang::get('questions.q5')}}">
                                        <input type="text" class="form-control" id="" name="a5" value="{{ old('a5') }}" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary nextBtn prewBtn" data-id="2" type="button">Preview</button>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary nextBtn submit" type="button">Next</button>
                                </div>
                            </div>
                        </div><!-- Second Step End Here -->
                        <div class="panel panel-primary setup-content" id="step-3">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h6>How did You Hear About Us</h6>
                                </div>
                                <div class="col-md-12">
                                    <label>How did You Hear About Us<span>*</span></label>
                                    <div class="radio">
                                        <label><input type="radio" name="hear_aboutus" value="Social Media" required><span class="radio-style"></span>Social Media</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="hear_aboutus" value="Web Search" required><span class="radio-style"></span>Web Search</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="hear_aboutus" value="Print Advertising" required><span class="radio-style"></span>Print Advertising</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="hear_aboutus" value="Friend Family" required><span class="radio-style"></span>Friend Family</label>
                                    </div>
                                </div>
                                <div class="col-md-12 which_hear">    
                                    
                                </div>
                                <div class="col-md-12">    
                                    <div class="form-group">
                                        <label>Name of Family / Friend Who Referred You</label>
                                        <input type="text" class="form-control" id="" name="referred_by" value="{{ old('referred_by') }}" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h6>Your Password</h6>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Password<span>*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <label class="error">This Field is required</label>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password<span>*</span></label>
                                        <input type="password" class="form-control" name="cpassword" placeholder="Retype Password">
                                    </div>
                                    @if ($errors->has('cpassword'))
                                        <label class="error">This Field is required</label>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <h6>Terms Of Services</h6>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="tands" value="" required>By clicking the checkbox below, you are agreeing to the Portland Nanny <a href="#">Terms and Conditions.</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary nextBtn prewBtn" data-id="3" type="button">Preview</button>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary nextBtn submit" type="button">Next</button>
                                </div>
                            </div>
                        </div><!-- Third Step End Here -->
                        <div class="panel panel-primary setup-content" id="step-4">
                            <div class="col-md-12 col-sm-12 m-auto">
                                <div class="panel-heading">
                                    <div class="col-md-12">
                                        <h5 class="panel-title">Child Details</h5>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <h6>Please enter child details.</h6>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Number of child</label>
                                            <input type="number" class="form-control" name="childs" min=1 max="4">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Child age</label>
                                            <div class="childages row">
                                                <div class="col-md-6 col-sm-6">
                                                    <input type="number" class="form-control" name="ages[0][age]" min=1>
                                                </div>
                                                <div class="col-md-6 col-sm-6">    
                                                    <select class="form-control" name="ages[0][gender]">
                                                        <option value="male">Male</option>
                                                        <option value="male">Female</option>
                                                    </select>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Gender</label>
                                        <div class="radio">
                                            <label class="radio-inline"><input type="radio" name="gender" value="male" required> <span class="radio-style"></span>Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="female" required> <span class="radio-style"></span>Female</label>
                                        </div>
                                        @if ($errors->has('gender'))
                                            <label class="error">Please select gender</label>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary nextBtn doneBtn" type="submit">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Fourth Step End Here -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->

<script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    // navListItems.click(function (e) {
    //     e.preventDefault();
    //     var $target = $($(this).attr('href')),
    //         $item = $(this);

    //     if (!$item.hasClass('disabled')) {
    //         navListItems.removeClass('btn-success').addClass('btn-default');
    //         $item.addClass('btn-success');
    //         //allWells.hide();
    //         //$target.show();
    //         $target.find('input:eq(0)').focus();
    //     }

    // });

    $('div.setup-panel div:first-child a.btn-success').click(function(e){
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div:first-child a.btn-success').trigger('click');
});

function progress(href){
    $('div.setup-panel div a').removeClass('btn-success');
    $('div.setup-panel div a[href="#'+href+'"]').addClass('btn-success');
}

function hideshow(hide, show){
    $(hide).hide();
    $(show).show();
}

$('.prewBtn').click(function(){
    var step = $(this).attr('data-id');
    hideshow("#step-"+step, "#step-"+parseInt(step-1));
    progress('step-'+parseInt(step-1));
});

</script>

<script>
/*** Vaildation Start ***/

var step1 = $("#signup-frm").validate({
    rules:{
        email: {
            required: true,
            email: true
        },
        first_name1: "required",
        last_name1: "required",
        password: {
            required: true,
            minlength: 6
        },
        cpassword: {
            required: true,
            minlength: 6,
            equalTo: "#password"
        }
    },
    messages:{
        email: {
            required: "Email is required",
            email: "Please enter valid email"
        },
        first_name1: "This field is requried",
        last_name1: "This field is required",
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
        },
        cpassword: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"
        }
    }
});

$("#step-1 button").click(function() {
    if(step1.form()){
        hideshow('#step-1', '#step-2');
        progress("step-2");
    }
});

/*------------*/

var step2 = $("#signup-frm").validate();

$("#step-2 .submit").click(function(event) {
    if(step2.form()){
        hideshow('#step-2', '#step-3');
        progress("step-3");
    }
});

/*-------------*/

var step3 = $("#signup-frm").validate();

$("#step-3 .submit").click(function(event) {
    if(step3.form() && step1.form()){
        hideshow('#step-3', '#step-4');
        progress("step-4");
    }
});

/*** Validation End ****/


$("input[name='hear_aboutus']").change(function(){
    var value = $(this).val();

    var html = '';
    html += '<div class="form-group">';
    html += '<label>Which type of '+value+'?</label>';
    html += '<input type="text" class="form-control" id="" name="which_hear_aboutus" value="{{ old("which_hear_aboutus") }}" placeholder="" required>';
    html += '</div>';

    $('.which_hear').html(html);

});

$("input[name='childs']").bind('keyup mouseup', function(){
    var value = $(this).val();

    var html = '';

    if(value <= 4){
        for(var i=0; i<value; i++){
            html += '<div class="col-md-6 col-sm-6">';
            html += '<input type="number" class="form-control" name="ages['+i+'][age]" min=1 placeholder="Enter age" required>';
            html += '</div>';
            html += '<div class="col-md-6 col-sm-6">';    
            html += '<select class="form-control" name="ages['+i+'][gender]" required>';
            html += '<option value="male">Male</option>';
            html += '<option value="male">Female</option>';
            html += '</select>';
            html += '</div>';
        }
    }else{
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Maximum 4 childs are allowed',
        })
    }    

    $(".childages").html(html);
});
</script>

@endsection
