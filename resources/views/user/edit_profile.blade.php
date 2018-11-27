@extends('layouts.default')

@section('content')

<section class="profile-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="inner-sec">
                    <div class="sidebar-outer">
                        <div class="head-sec">
                            <h5>Account Settings</h5>
                        </div>
                        <div class="menu_sec">
                        @component('components.user_sidebar')
                            
                        @endcomponent
                        </div>
                    </div>
                </div>
            </div><!-- Left Section End Here -->
            <div class="col-md-9 col-sm-9">
                <div class="pr-inner-sec">
                    <div class="col-md-6 col-sm-6 m-auto">

                        @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                        @endif

                        <form action="{{ url('/') }}/user/editprofile" method="post" id="edit-frm" enctype="multipart/form-data">
                            <div class="details_outer">
                            <div class="full">
                            <div class="outer_img">
                                <div class="avatar">
                                    @if($user->image != '')
                                    <img src="{{url('/')}}/images/users/{{ $user->image }}" alt="Avatar" class="previewHolder">
                                    @else
                                    <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar" class="previewHolder">
                                    @endif
                                </div>
								
									<a class="click_inner"><div class="click-background"><i class="fa fa-camera"> <input type="file" name="image" accept="image/*" id="profilePic"></i></div></a>
								
                            </div>
                            </div>
                            
                                <div class="pr_name">
                                    <h5>Edit Profile</h5>
                                </div>

                                
                                {{ csrf_field() }}
                                <div class="pr_details">
                                    <ul>
                                        <li><span class="left">Email:</span> <span class="right"><input type="text" name="email" value="{{ $user->email }}" disabled="" class="form-control"></span></li>
                                        <li><span class="left">First Name:</span> <span class="right"><input type="text" name="first_name1" value="{{ $user->first_name1 }}" class="form-control" required=""></span></li>
                                        <li><span class="left">Last Name:</span> <span class="right"><input type="text" name="last_name1" value="{{ $user->last_name1 }}" class="form-control" required=""></span></li>
                                        <li><span class="left">Address:</span> <span class="right"><textarea name="address_1" class="form-control" required="">{{ $user->address_1 }}</textarea></span></li>
                                        <li><span class="left">Contact:</span> <span class="right"><input type="text" name="mobile1" value="{{ $user->mobile1 }}" class="form-control" required=""></span></li>
                                        <li><span class="left">Childs:</span> <span class="right"><input type="number" min='1' max='4' name="childs" value="{{ $user->childs }}" class="form-control" required=""></span></li>
                                        <li><span class="left">Child ages:</span>
                                            <span class="right childages">
                                            @php
                                            $ages = json_decode($user->ages);
                                            $ages = json_decode(json_encode($ages),TRUE)
                                            @endphp
                                                @for($i = 0; $i < count($ages); $i++)
                                                <input type="text" name="ages[{{$i}}][age]" value="{{ $ages[$i]['age'] }}" class="form-control" required="">
                                                {{ Form::select('ages[$i][gender]', ['male' => 'Male', 'female' => 'Female'], $ages[$i]['gender'], ['class' => 'form-control']) }}
                                                @endfor
                                            </span>
                                        </li>
                                    </ul>
										<div class="profile-sub-btn m-auto">
										<input type="submit" class="btn btnIntr" value="Save">
									</div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>

$("input[name='childs']").bind('keyup mouseup', function(){
    var value = $(this).val();

    var html = '';

    for(var i=0; i<value; i++){
        html += '<input type="text" class="form-control" id="" name="ages['+i+'][age]" placeholder="Enter age" required>';
        html += '<select name="ages['+i+'][gender]" class="form-control">';
        html += '<option value="male">Male</option>'
        html += '<option value="female">Female</option>'
        html += '</select>'
    }

    $(".childages").html(html);
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
$("#profilePic").change(function() {
  readURL(this);
});
</script>

@endsection