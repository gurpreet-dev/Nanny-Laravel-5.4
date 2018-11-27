@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Edit Nanny</h1>
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
                    <h3 class="box-title">Edit nanny</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="contact-form"" id="nanny-add" method="post" action="{{route('editContact', ['id' => $contact->id])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Name', null, ['class' => 'control-label']) }}
                            {{ Form::text('name', $contact->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Email', null, ['class' => 'control-label']) }}
                            {{ Form::text('email', $contact->email, ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Message', null, ['class' => 'control-label']) }}
                            <textarea name="message" class="form-control">{{ $contact->message }}</textarea>
                        </div>
                        <div class="form-group">
                            {{ Form::label('Reply', null, ['class' => 'control-label']) }}
                            <textarea name="reply" class="form-control">{{ $contact->reply }}</textarea>
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
$(".contact-form").validate({
    rules:{
        email: {
            required: true,
            email: true
        },
        name: "required",
        message: "required",
        reply: "required"
    },
    messages:{
        email: {
            required: "Email is required",
            email: "Please enter valid email"
        },
        name: "Name is required",
        message: "Message is required",
        message: "Reply is required"
    }
});

</script>

@endsection