@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Add Service</h1>
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
                    <h3 class="box-title">Add new service</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="service-add" method="post" action="{{route('addService')}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Title', null, ['class' => 'control-label']) }}
                            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter Title', 'required']) }}
                            
                            @if ($errors->has('title'))
                                <label class="error">{{ $errors->first('title') }}</label>
                            @endif

                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checked" value="1"> Check by default
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" value="1"> Active
                            </label>
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
$("#service-add").validate();

</script>

@endsection