@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.structure.css">
<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.theme.css">
<!-- <link rel="stylesheet" href="{{url('/')}}/css/mdp.css">
<link rel="stylesheet" href="{{url('/')}}/css/pepper-ginder-custom.css"> -->

<script src="{{url('/')}}/js/jquery-ui.multidatespicker.js"></script>
<script src="{{url('/')}}/js/prettify.js"></script>
<script src="https://gurpreet.gangtask.com/trip/js/multidatespicker/jquery-ui-1.11.1.js"></script>

<style>
.ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
    background: #498ebe none;
    color: white;
}
.ui-datepicker { width: 100%;}
</style>

<section class="content-header">
  <h1 class="left"> Manage Availabilities </h1>
  <small>Select Unavailable dates</small>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-8">

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
          Select Unavailable dates
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div id="datepicker" class="datepick"></div>
            @php

			$dates = array();
			foreach($availabilities as $date){
			 $dates[] = $date['date'];
            }
            
			@endphp
            
            <form action="{{route('availability')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="dates" value="{{ implode(',', $dates) }}">
            <div class="box-footer">
				<button type="submit" class="btn btn-success pull-right">Submit</button>
            </div>  
            </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
var date = new Date();

var all_dates = [];

var selected_dates = [];

var availabilities = $.parseJSON('<?php echo json_encode($availabilities); ?>');


for(i=0; i<Object.keys(availabilities).length; i++){
    selected_dates.push(new Date(availabilities[i]['date']).getTime());
    all_dates.push(availabilities[i]['date']);
}


if(selected_dates.length != '0'){
    $( "#datepicker").multiDatesPicker({
        minDate: 0,
        addDates: selected_dates,
        //showButtonPanel: true,
        //changeMonth: true,
        //changeYear: true,
        onSelect: function(dateText, inst) { 
        

            if($.inArray(dateText, all_dates) !== -1){
                
                for(var i=0;i<all_dates.length;i++) {
                    if(all_dates[i] == dateText){
                        all_dates.splice(i,1);
                    }
                }
                
                var data = '';
                
                for(var i=0;i<all_dates.length;i++) {
                    if(i+1 == all_dates.length ){
                        data += all_dates[i];
                    }else{
                        data += all_dates[i]+',';
                    }
                }
                
                $('input[name="dates"]').val(data);
                
            }else{
                all_dates.push(dateText);
                var dates = $('input[name="dates"]').val();
                if(dates == ''){
                    $('input[name="dates"]').val(dateText);
                }else{
                    $('input[name="dates"]').val(dates+','+dateText);
                }
            }
            
        }
    });

}else{
    $( "#datepicker").multiDatesPicker({
    minDate: 0,
    //showButtonPanel: true,
    //changeMonth: true,
    //changeYear: true,
    onSelect: function(dateText, inst) { 
       

        if($.inArray(dateText, all_dates) !== -1){
            
            for(var i=0;i<all_dates.length;i++) {
                if(all_dates[i] == dateText){
                    all_dates.splice(i,1);
                }
            }
            
            var data = '';
            
            for(var i=0;i<all_dates.length;i++) {
                if(i+1 == all_dates.length ){
                    data += all_dates[i];
                }else{
                    data += all_dates[i]+',';
                }
            }
            
            $('input[name="dates"]').val(data);
            
        }else{
            all_dates.push(dateText);
            var dates = $('input[name="dates"]').val();
            if(dates == ''){
                $('input[name="dates"]').val(dateText);
            }else{
                $('input[name="dates"]').val(dates+','+dateText);
            }
        }
        
    }
});

}

</script>


@endsection