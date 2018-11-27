@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Change Password</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">

            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ID: {{$user->id}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="nanny-add" method="post" action="{{route('cpuser', ['id' => $user->id])}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('New Password', null, ['class' => 'control-label']) }}
                            {{ Form::password('npassword',  ['class' => 'form-control', 'id' => 'npassword', 'placeholder' => 'Enter New Password']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Confirm Password', null, ['class' => 'control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
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
    rules:{
        npassword: {
            required: true,
            minlength: 6
        },
        password: {
            required: true,
            minlength: 6,
            equalTo: "#npassword"
        }

    },
    messages: {
        npassword: {
            required: "New password required",
            minlength: "Your password must be at least 6 characters long"
        },
        password: {
            required: "Confirm password required",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"

        }
    }
});

</script>

@endsection