@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Edit User</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            {{ Form::open(['url' => '/admin/users/edit/'.$user->id, 'role' => 'form', 'id' => 'add-user', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            {{ csrf_field() }}

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Email</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Email Address', null, ['class' => 'control-label']) }}
                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Enter email', 'disabled']) }}
                        
                            @if ($errors->has('email'))
                                <label class="error">{{ $errors->first('email') }}</label>
                            @endif

                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    
                
            </div>
            <!-- /.box -->


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Primary Parent</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('First Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('first_name1', $user->first_name1, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Last Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('last_name1', $user->last_name1, ['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Mobile', null, ['class' => 'control-label']) }}
                            {{ Form::text('mobile1', $user->mobile1, ['class' => 'form-control', 'placeholder' => 'Enter Mobile number', 'required']) }}
                        </div>


                    </div>
                    <!-- /.box-body -->
                
            </div>
            <!-- /.box -->


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Secondary Parent</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('First Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('first_name2', $user->first_name2, ['class' => 'form-control', 'placeholder' => 'Enter First Name']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Last Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('last_name2', $user->last_name2, ['class' => 'form-control', 'placeholder' => 'Enter Last Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Mobile', null, ['class' => 'control-label']) }}
                            {{ Form::text('mobile2', $user->mobile2, ['class' => 'form-control', 'placeholder' => 'Enter Mobile number']) }}
                        </div>

                    </div>
                    <!-- /.box-body -->
                
            </div>
            <!-- /.box -->

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Local Address</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('Address', null, ['class' => 'control-label']) }}
                            {{ Form::text('address_1', $user->address_1, ['class' => 'form-control', 'placeholder' => 'Enter Local Address', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Address 2', null, ['class' => 'control-label']) }}
                            {{ Form::text('address_2', $user->address_2, ['class' => 'form-control', 'placeholder' => 'Enter Additional Address']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('City', null, ['class' => 'control-label']) }}
                            {{ Form::text('city', $user->city, ['class' => 'form-control', 'placeholder' => 'Enter city', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('State', null, ['class' => 'control-label']) }}
                            {{ Form::select('state',  ["AL" => "Alabama", "AK" => "Alaska", "AS" => "American Samoa", "AZ" => "Arizona", "AR" => "Arkansas", "AE" => "Armed Forces - Europe", "AP" => "Armed Forces - Pacific", "AA" => "Armed Forces - USA/Canada", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MH" => "Marshall Islands", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VI" => "Virgin Islands", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming"], $user->state , ['class' => 'form-control', 'placeholder' => '--select--', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Zipcode', null, ['class' => 'control-label']) }}
                            {{ Form::text('zip', $user->zip, ['class' => 'form-control', 'placeholder' => 'Enter zipcode', 'required']) }}
                        </div>

                    </div>
                    <!-- /.box-body -->
                    
                
            </div>
            <!-- /.box -->

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Additional Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('Household Info', null, ['class' => 'control-label']) }}
                            {{ Form::text('household_info', $user->household_info, ['class' => 'form-control', 'placeholder' => 'Enter Household Info', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Pet Info', null, ['class' => 'control-label']) }}
                            {{ Form::text('pet_info', $user->pet_info, ['class' => 'form-control', 'placeholder' => 'Enter Pet Info', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label($user->q1, null, ['class' => 'control-label']) }}
                            {{ Form::text('a1', $user->a1, ['class' => 'form-control']) }}
                            <input type="hidden" name="q1" value="{{$user->q1}}">
                        </div>
                        <div class="form-group">
                            {{ Form::label($user->q2, null, ['class' => 'control-label']) }}
                            {{ Form::text('a2', $user->a1, ['class' => 'form-control']) }}
                            <input type="hidden" name="q2" value="{{$user->q2}}">
                        </div>
                        <div class="form-group">
                            {{ Form::label($user->q3, null, ['class' => 'control-label']) }}
                            {{ Form::text('a3', $user->a3, ['class' => 'form-control']) }}
                            <input type="hidden" name="q3" value="{{$user->q3}}">
                        </div>
                        <div class="form-group">
                            {{ Form::label($user->q4, null, ['class' => 'control-label']) }}
                            {{ Form::text('a4', $user->a4, ['class' => 'form-control']) }}
                            <input type="hidden" name="q4" value="{{$user->q4}}">
                        </div>
                        <div class="form-group">
                            {{ Form::label($user->q5, null, ['class' => 'control-label']) }}
                            {{ Form::text('a5', $user->a5, ['class' => 'form-control']) }}
                            <input type="hidden" name="q5" value="{{$user->q5}}">
                        </div>

                    </div>
                    <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">How did You Hear About Us</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('How did You Hear About Us?', null, ['class' => 'control-label']) }}
                            <div class="radio">
                                <label><input type="radio" name="hear_aboutus" value="Social Media" {{ ($user->hear_aboutus == 'Social Media') ? 'checked' : ''}} required><span class="radio-style"></span>Social Media</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="hear_aboutus" value="Web Search" {{ ($user->hear_aboutus == 'Web Search') ? 'checked' : ''}} required><span class="radio-style"></span>Web Search</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="hear_aboutus" value="Print Advertising" {{ ($user->hear_aboutus == 'Print Advertising') ? 'checked' : ''}} required><span class="radio-style"></span>Print Advertising</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="hear_aboutus" value="Friend Family" {{ ($user->hear_aboutus == 'Friend Family') ? 'checked' : ''}} required><span class="radio-style"></span>Friend Family</label>
                            </div>   
                        </div>

                        <div class="which_hear">
                            <div class="form-group">
                                <label>Which type of {{$user->hear_aboutus}}?</label>
                                <input class="form-control" id="" name="which_hear_aboutus" value="{{$user->which_hear_aboutus}}" placeholder="" required="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Name of Family / Friend Who Referred You', null, ['class' => 'control-label']) }}
                            {{ Form::text('referred_by', $user->referred_by, ['class' => 'form-control']) }}
                        </div>

                    </div>
                    <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Child Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('Number of childs', null, ['class' => 'control-label']) }}
                            {{ Form::number('childs', $user->childs, ['class' => 'form-control', 'min' => 1, 'required']) }}    
                        </div>

                        <div class="form-group">
                            {{ Form::label('Ages', null, ['class' => 'control-label']) }}
                            <div class="child-ages">
                            @php $ages = json_decode($user->ages); @endphp
                            @for($i=0;$i < count($ages); $i++)

                            <div class="col-xs-6">
                            <input type="text" class="form-control" name="ages[{{$i}}][age]" value="{{ $ages[$i]->age }}" placeholder=".col-xs-3">
                            </div>
                            <div class="col-xs-6">
                            <select name="ages[{{$i}}][gender]" class="form-control">
                                @if($ages[$i]->gender == 'male')
                                <option value="male" selected="">Male</option>
                                <option value="female">Female</option>
                                @else
                                <option value="male">Male</option>
                                <option value="female" selected="">Female</option>
                                @endif
                            </select>
                            </div>

                            @endfor
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Gender', null, ['class' => 'control-label']) }}
                            {{ Form::select('gender',  ["male" => "Male", "female" => "Female"], $user->gender , ['class' => 'form-control', 'placeholder' => '--select--', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Requirement of nanny', null, ['class' => 'control-label']) }}
                            {{ Form::select('nanny_requirement',  ["male" => "Male", "female" => "Female"], $user->nanny_requirement , ['class' => 'form-control', 'placeholder' => '--select--', 'required']) }}
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            <!-- /.box -->

            
        </div>
        <!-- /.box -->

        </form>
    </div>
    </div>
</section>    

<script>
$("#add-user").validate({
    rules:{
        first_name1: "required",
        last_name1: "required",
        childs: {
            required: true,
            digits: true
        }
    },
    messages:{
        first_name1: "This field is requried",
        last_name1: "This field is required",
        childs: {
            required: 'This field is requried',
            digits: 'Please enter number only.'
        }
    }
});

$("input[name='childs']").bind('keyup mouseup', function(){
    var value = $(this).val();

    var html = '';

    if(value <= 4){

        for(var i=0; i<value; i++){

            html += '<div class="col-xs-6">';
            html += '<input type="number" class="form-control" name="ages['+i+'][age]" min=1 placeholder="Enter age" required>';
            html += '</div>';
            html += '<div class="col-xs-6">';
            html += '<select name="ages['+i+'][gender]" class="form-control">';
            html += '<option value="male">Male</option>';
            html += '<option value="female">Female</option>';
            html += '</select>';
            html += '</div>';

        }
        $(".child-ages").html(html);

    }else{
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Maximum 4 childs are allowed'
        })
    }

});

$("input[name='hear_aboutus']").change(function(){
    var value = $(this).val();

    var html = '';
    html += '<div class="form-group">';
    html += '<label>Which type of '+value+'?</label>';
    html += '<input type="text" class="form-control" id="" name="which_hear_aboutus" value="{{ old("which_hear_aboutus") }}" placeholder="" required>';
    html += '</div>';

    $('.which_hear').html(html);

});


</script>

@endsection