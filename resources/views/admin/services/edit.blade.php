@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Edit Service</h1>
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
                    <h3 class="box-title">Edit service</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="service-add" method="post" action="{{route('editService', ['id' => $service->id])}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Title', null, ['class' => 'control-label']) }}
                            {{ Form::text('title', $service->title, ['class' => 'form-control', 'placeholder' => 'Enter Title', 'required']) }}
                            
                            @if ($errors->has('title'))
                                <label class="error">{{ $errors->first('title') }}</label>
                            @endif

                        </div>

                        <div class="checkbox">
                            <label>
                                @if($service->checked == 1)
                                <input type="checkbox" name="checked" value="1" checked> Check by default
                                @else
                                <input type="checkbox" name="checked" value="1"> Check by default
                                @endif
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                @if($service->status == 1)
                                <input type="checkbox" name="status" value="1" checked=""> Active
                                @else
                                <input type="checkbox" name="status" value="1"> Active
                                @endif
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