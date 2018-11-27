@extends('layouts.admin')
@section('content')

<section class="content-header">
    <h1>Edit Page</h1>
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
                    <h3 class="box-title">Edit page</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="page-edit" method="post" action="{{route('editpage', ['id' => $page->id])}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('Title', null, ['class' => 'control-label']) }}
                            {{ Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Enter title', 'required']) }}
                        
                            @if ($errors->has('title'))
                                <label class="error">{{ $errors->first('title') }}</label>
                            @endif

                        </div>

                        <div class="form-group">
                            {{ Form::label('Content', null, ['class' => 'control-label']) }}
                            <textarea name="content" class="form-control page-textarea" required>{{ $page->content }}</textarea>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Sort Order', null, ['class' => 'control-label']) }}
                            {{ Form::number('sort_order', $page->sort_order, ['class' => 'form-control', 'placeholder' => 'Enter Sort Order', 'min' => 0,  'required']) }}
                        
                            @if ($errors->has('sort_order'))
                                <label class="error">{{ $errors->first('sort_order') }}</label>
                            @endif

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
$("#page-edit").validate();

</script>

@endsection