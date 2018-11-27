@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Add Price</h1>
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
                    <h3 class="box-title">Add new price</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="price-add" method="post" action="{{route('addPrice')}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Service', null, ['class' => 'control-label']) }}

                            {{ Form::select('service_id', $services, '', ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('Type', null, ['class' => 'control-label']) }}

                            {{ Form::select('type_id', $types, '', ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">

                            {{ Form::label('Pricing', null, ['class' => 'control-label']) }}

                            <div class="row">

                                <div class="col-xs-4">
                                    {{ Form::label('Childs', null, ['class' => 'control-label']) }}
                                </div>

                                <div class="col-xs-8">
                                    {{ Form::label('Price', null, ['class' => 'control-label']) }}
                                </div>

                            </div>

                            @for($i=1; $i<=4; $i++)
                            <div class="row">

                                <div class="col-xs-4">
                                    <input type="text" class="form-control" value="{{ $i }}" disabled="">
                                    <input type="hidden" name="pricing[{{$i}}][child]" class="form-control" value="{{ $i }}" >
                                </div>

                                <div class="col-xs-8">
                                    <input class="form-control chprice" name="pricing[{{$i}}][price]" placeholder="Enter Price" type="number" min=0 step="0.01">
                                </div>

                            </div>
                            @endfor

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
$().ready(function () {
    $("#price-add").validate();
    $(".chprice").each(function (item) {
        $(this).rules("edit", {
            decimal: true
        });
    });
});

</script>

@endsection