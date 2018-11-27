@extends('layouts.default')
@section('content')

<section class="profile-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 m-auto">
                
                <div class="pr-inner-sec">
                    <div class="req-head">
                        <h5>{{ ucwords($type->title2) }}</h5>
                        <h6>{{ $type->content }}</h6>
                    </div>
                    <div class="alert-msg"></div>
                    <div class="row service">

                        <form class="form-horizontal" name="Time-Form" method="Post" action="#" style="display:flex; flex-wrap:wrap; flex-direction:row">
                            
                            {{ csrf_field() }}
                            
                            <div class="col-md-4">
                                @php $i = 0; @endphp
                                @foreach($services1 as $service)
                                @if(count($service->child_prices) > 0)
                                @if($service->service != null)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input login-check checkedd" name="services[{{$i}}][id]" value="{{ $service->service->id }}" data-price="{{ $service->child_prices[0]->price }}" checked="checked">
                                        <span class="checkbox-style"></span>
                                        <span class="checkbox-style-login login-text">{{ $service->service->title }} (${{ $service->child_prices[0]->price }}/hr)</span>
                                        
                                    </label>
                                    <input type="hidden" name="services[{{$i}}][title]" value="{{ $service->service->title }}">
                                    <input type="hidden" name="services[{{$i}}][price]" value="{{ $service->child_prices[0]->price }}">
                                </div>
                                @php $i++; @endphp
                                @endif
                                @endif
                                @endforeach

                                <h4>Please select add-on services</h4>

                                @foreach($services2 as $service)
                                @if(count($service->child_prices) > 0)
                                @if($service->service != null)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input login-check" name="services[{{$i}}][id]" value="{{ $service->service->id }}" data-price="{{ $service->child_prices[0]->price }}"><span class="checkbox-style"></span><span class="checkbox-style-login">{{ $service->service->title }} (${{ $service->child_prices[0]->price }}/hr)</span>
                                    </label>
                                    <input type="hidden" name="services[{{$i}}][title]" value="{{ $service->service->title }}">
                                    <input type="hidden" name="services[{{$i}}][price]" value="{{ $service->child_prices[0]->price }}">
                                </div>
                                @php $i++; @endphp
                                @endif
                                @endif
                                @endforeach
                                
                                <div class="tot-pr" style="margin-top:20px;">
                                <h1><strong>Total: </strong><span>$0.00/hr</span></h1>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8">

                                        <div id="datepicker"></div>

                                        <div id="selected_timings"></div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-time">
                                            <h6>Select Time</h6>
                                            <p>Wednesday</p>
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select class="form-control" name="start_time">
                                                    <option>--select--</option>
                                                    @php
                                                    $from = '12:00 am';
                                                    $to = '11:45 pm';
                                                    $finish_time  = DATE("H:i:s", strtotime($to));
                                                    $start_time  = DATE("H:i:s", strtotime($from));
                                                    $finish = strtotime(date($finish_time));
                                                    $k =-15;
                                                    @endphp

                                                    @for($i=1; $i<=96;$i++)
                                                    @php
                                                    $k+=15;
                                                    $selectedTime = date($start_time);
			                                        $endTime = strtotime("+".$k." minutes", strtotime($selectedTime));
                                                    @endphp
                                                    <option value="{{date('h:i a', $endTime)}}">{{date('h:i a', $endTime)}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select class="form-control" name="end_time">
                                                    <option>--select--</option>
                                                    @php
                                                    $from = '12:00 am';
                                                    $to = '11:45 pm';
                                                    $finish_time  = DATE("H:i:s", strtotime($to));
                                                    $start_time  = DATE("H:i:s", strtotime($from));
                                                    $finish = strtotime(date($finish_time));
                                                    $k =-15;
                                                    @endphp

                                                    @for($i=1; $i<=96;$i++)
                                                    @php
                                                    $k+=15;
                                                    $selectedTime = date($start_time);
			                                        $endTime = strtotime("+".$k." minutes", strtotime($selectedTime));
                                                    @endphp
                                                    <option value="{{date('h:i a', $endTime)}}">{{date('h:i a', $endTime)}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
										<div class="txt-area">
											<textarea rows="4" cols="30" name="comment" placeholder="Enter text here..."></textarea>
										</div>
                                    </div>
                                </div>

                            </div>
							
                        </form>
                    </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12">   
                            <div class="snd-req">
                                <a href="javascript:void(0)" role="button" class="btn btn-default btnsndreq" id="send-request"><img src="{{url('/')}}/images/website/arow.png" alt="arow"> Send Request</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>

var timings = [];

$(function(){
    $.session.clear();
    $("#datepicker").datepicker({ dateFormat: 'mm/dd/yy', minDate: 0 });

    $("#datepicker").trigger('change');
});

$("#datepicker").change(function(){
    $.session.set('date', $(this).val());

    var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

    var a = new Date($(this).val());

    $('.select-time p').html(weekday[a.getDay()]);

    $("select[name='start_time'], select[name='end_time']").prop('selectedIndex',0);

});

$("select[name='start_time']").change(function(){
    $.session.set('start_time', $(this).val());
    selectTime();
    $.session.delete('end_time');
});

$("select[name='end_time']").change(function(){

    $.session.set('end_time', $(this).val());
    selectTime();
    $.session.delete('end_time');

});

function selectTime(){
    if($.session.get('date') && $.session.get('start_time')){

        if($.session.get('timing_array')){
            var timings = JSON.parse($.session.get('timing_array'));
        }else{
            var timings = [];
        }    

        var exists = 0;

        $.each(timings, function(key, value) {
            if(value != null){
                if(value.date == $.session.get('date')){
                    exists = 1;

                    if($.session.get('end_time')){

                        var timeStart = new Date($.session.get('date') +' '+ $.session.get('start_time'));
                        var timeEnd = new Date($.session.get('date') +' '+ $.session.get('end_time'));
                        var hourDiff = ((timeEnd - timeStart)/1000/60/60);  
                        var diff= parseInt(hourDiff)

                        if(diff > 0){
                            timings[key]['start_time'] = $.session.get('start_time');
                            timings[key]['end_time'] = $.session.get('end_time');
                        }else{
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Please select end time greater one hour than start time'
                            })
                        }
                    }else{

                        var timeStart = new Date($.session.get('date') +' '+ $.session.get('start_time'));
                        var timeEnd = new Date($.session.get('date') +' '+ value.end_time);
                        var hourDiff = ((timeEnd - timeStart)/1000/60/60);  
                        var diff= parseInt(hourDiff)

                        if(diff > 0){
                            timings[key]['start_time'] = $.session.get('start_time');
                            timings[key]['end_time'] = value.end_time;
                        }else{
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Please select end time greater one hour than start time'
                            })
                        }
                    }
                }
            }
        });

        if(exists != 1 && $.session.get('end_time')){
            var timeStart = new Date($.session.get('date') +' '+ $.session.get('start_time'));
            var timeEnd = new Date($.session.get('date') +' '+ $.session.get('end_time'));
            var hourDiff = ((timeEnd - timeStart)/1000/60/60);  
            var diff= parseInt(hourDiff)
            
            if(diff > 0){
                timings.push({'date': $.session.get('date'), 'start_time': $.session.get('start_time'), 'end_time': $.session.get('end_time')});
            }else{
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Please select end time greater one hour than start time'
                })
            }
        }

        $.session.set('timing_array', JSON.stringify(timings));

        var new_arr = JSON.parse($.session.get('timing_array'));

        var html = '';

        $.each(new_arr, function(key, value) {
            if(value != null){
                html += "<span class='rtmp' data-id='"+ value.date +"'>"+value.date+" > "+ value.start_time +" > "+ value.end_time +" &nbsp;&nbsp;<label class='badge badge-danger remove_time'>Remove</label></span><br>";
            }
        });

        $("#selected_timings").html(html);
    }
}


$(document).delegate('.remove_time', 'click', function(){
    
    var id = $(this).parent().attr('data-id');

    var new_arr = JSON.parse($.session.get('timing_array'));

    
    $.each(new_arr, function(key, value) {
        if(value != null){
            if(value.date == id){
                delete new_arr[key];
            }
        }
    });

    $.session.set('timing_array', JSON.stringify(new_arr));
    new_arr = JSON.parse($.session.get('timing_array'));

    var html = '';

    $.each(new_arr, function(key, value) {
        if(value != null){
            html += "<span class='rtmp' data-id='"+ value.date +"'>"+value.date+" > "+ value.start_time +" > "+ value.end_time +" &nbsp;&nbsp;<label class='badge badge-danger remove_time'>Remove</label></span><br>";
        }
    });
    
    $("#selected_timings").html(html);

    $("select[name='start_time'], select[name='end_time']").prop('selectedIndex',0);

});

$("#send-request").click(function(){
    
    //if($('input[name="services[]"]:checked').val() == undefined || $('input[name="services[]"]:checked').val() == 'undefined'){
    if($('.form-check-input.login-check:checked').val() == undefined || $('.form-check-input.login-check:checked').val() == 'undefined'){
        swal({
                type: 'error',
                title: 'Oops...',
                text: 'Please select services'
            })
    }else if($.session.get('timing_array') == undefined || $.session.get('timing_array') == 'undefined' || $.session.get('timing_array') == '[]'){
        swal({
                type: 'error',
                title: 'Oops...',
                text: 'Please select dates'
            })
    }else{

        $.ajax({
            url: "<?php echo $url ?>",
            data: $('form[name="Time-Form"]').serialize() + "&timings="+$.session.get('timing_array'),
            method: 'post',
            dataType: 'html',
            success: function(res){

                res = $.parseJSON(res);

                console.log(res.data.isSuccess); 
                if(res.data.isSuccess == 'true'){
                    //$('.alert-msg').html(res.data.msg);
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: res.data.msg
                    })
                    $("select[name='start_time'], select[name='end_time']").prop('selectedIndex',0);
                    $("#selected_timings").html('');
                    $('input:checkbox').removeAttr('checked');
                }else{
                    //$('.alert-msg').html(res.data.msg);
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: res.data.msg
                    })
                }
            }
        })
    }    
});

/******************/

var pending_invoice = '<?php echo $pending ?>';

if(pending_invoice > 0){
    swal({
      title: 'Some Invoice Pending',
      text: 'You have some invoice pending. Please pay them first in order to request a care.',
      timer: 5000,
      allowOutsideClick: false,
      onOpen: () => {
        swal.showLoading()
      }
    }).then((result) => {
      if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.timer
      ) {
        window.location.href="{{ url('/') }}/user/payments";
      }
    })
}

/***************************/

var tot_pr = 0;

$(".login-check").click(function(e){

    if($(this).hasClass('checkedd') == true){
        e.preventDefault();
    }else{
        if ($(this).is(':checked')) {
            tot_pr = tot_pr + parseInt($(this).attr('data-price'));
        }else{
            tot_pr = tot_pr - parseInt($(this).attr('data-price'));
        }

        $(".tot-pr span").html('$'+tot_pr.toFixed(2)+'/hr');
    }


});

$.each($(".login-check.checkedd:checked"), function(){            
    tot_pr = tot_pr + parseInt($(this).attr('data-price'));
});

$(".tot-pr span").html('$'+tot_pr.toFixed(2)+'/hr');
</script>

<style type="text/css">
    #datepicker .ui-datepicker .ui-datepicker-prev{
        background-color:#fff;
        border:1px solid #cdcdcd;
        border-radius:0px;
        left:0;
        top:2px;
    }
    #datepicker .ui-datepicker .ui-datepicker-next{
        background-color:#fff;
        border:1px solid #cdcdcd;
        border-radius:0px;
        right:0;
        top:2px;
    }
    .row.service .ui-datepicker-title{
        display:block;
        border:1px solid #cdcdcd;
        margin-bottom:2px;
    }
	#datepicker .ui-datepicker .ui-datepicker-prev span.ui-icon{
		background-image: url('{{url("/")}}/images/website/ui-icons_222222_256x240.png') !important;
	}
    #datepicker .ui-datepicker .ui-datepicker-next span.ui-icon{
		background-image: url('{{url("/")}}/images/website/ui-icons_222222_256x240.png') !important;
	}
</style>

@endsection