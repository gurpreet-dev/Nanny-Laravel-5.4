@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Edit Price</h1>
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
                    <h3 class="box-title">Edit price</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="price-add" method="post" action="{{route('editPrice', ['id' => $data['id']])}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Service', null, ['class' => 'control-label']) }}

                            {{ Form::select('service_id', $services, $data['service_id'], ['class' => 'form-control']) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('Type', null, ['class' => 'control-label']) }}

                            {{ Form::select('type_id', $types, $data['type_id'], ['class' => 'form-control']) }}

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

                            @php

                            $array = [];

                            foreach($data['child_prices'] as $price){
                                $array[$price['child']] = $price;
                            }


                            @endphp

                            @for($i=1; $i <= 4; $i++)

                            @php
                            $j = $i;
                            @endphp

                            <div class="row">

                            @if (array_key_exists($i,$array))
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" value="{{ $j }}" disabled="">
                                    <input type="hidden" name="pricing[{{$j}}][child]" class="form-control" value="{{ $j }}" >
                                </div>

                                <div class="col-xs-8">
                                    <input class="form-control chprice" name="pricing[{{$j}}][price]" placeholder="Enter Price" type="number" min=0 step="0.01" value="<?php echo $array[$j]['price'] ?>">
                                </div>
                            @else
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" value="{{ $j }}" disabled="">
                                    <input type="hidden" name="pricing[{{$j}}][child]" class="form-control" value="{{ $j }}" >
                                </div>

                                <div class="col-xs-8">
                                    <input class="form-control chprice" name="pricing[{{$j}}][price]" placeholder="Enter Price" type="number" min=0 step="0.01" value="">
                                </div>
                            @endif
                                    
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