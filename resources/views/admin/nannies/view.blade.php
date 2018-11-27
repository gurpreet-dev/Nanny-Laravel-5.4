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
    <h1>
    Profile
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{$user->name }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  
                </tr>
                <tr>
                    <th>Id</th>
                    <td>{{$user->id }}</td>
                </tr>
                <tr>
                  <th> Image </th>
                  <td>
                    <?php if($user->image != ''){ ?>
                    <img src="{{url('/')}}/images/users/{{$user->image}}" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php }else{ ?>
                    <img src="{{url('/')}}/images/users/noimage.png" style="width: 190px; margin-bottom: 20px;
                    " class="previewHolder"/>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <th>First Name</th>
                  <td>{{ $user->first_name }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $user->last_name }}</td>
                </tr>
                
                <tr>
                  <th> gender </th>
                  <td>{{ $user->gender }}</td>
                </tr>
                <tr>
                  <th> education </th>
                  <td>{{ $user->education }}</td>
                </tr>
                <tr>
                  <th> Mobile </th>
                  <td>{{ $user->mobile }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $user->alt_mobile }}</td>
                </tr>
                <tr>
                  <th> Do you have any allergies or aversions? </th>
                  <td>{{ $user->allergies_or_aversions }}</td>
                </tr>
                <tr>
                  <th> Have you worked with an agency before? </th>
                  <td>{{ $user->worked_before }}</td>
                </tr>
                <tr>
                  <th> Prefered Age of Children?  </th>
                  <td>{{ $user->children_age }}</td>
                </tr>
                <tr>
                  <th> Address 1 </th>
                  <td>{{ $user->address_1 }}</td>
                </tr>
                <tr>
                  <th> Address 2 </th>
                  <td>{{ $user->address_2 }}</td>
                </tr>
                <tr>
                  <th> City </th>
                  <td>{{ $user->city }}</td>
                </tr>
                <tr>
                  <th> State </th>
                  <td>{{ $user->state }}</td>
                </tr>
                <tr>
                  <th> Zipcode </th>
                  <td>{{ $user->zip }}</td>
                </tr>
                
                  <td>
                  <a href="{{url('admin/editnanny/'.$user->id) }}" class="btn btn-success">Edit</a>
                  <a href="{{url('admin/cpnanny/'.$user->id) }}" class="btn btn-warning">Change Password</a>
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

        @php

        $dates = array();
        foreach($user->unavailabilities as $date){
        $dates[] = $date['date'];
              }
              
        @endphp

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Availablity <small>Selected dates are unavailable dates</small></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="avai"></div>
            <input type="hidden" name="dates" value="{{ implode(',', $dates) }}">
          </div>
          <!-- /.box-body -->
        </div>

    </div>
</section>  

<script>
var date = new Date();

var all_dates = [];

var selected_dates = [];

var availabilities = $.parseJSON('<?php echo json_encode($user->unavailabilities); ?>');


for(i=0; i<Object.keys(availabilities).length; i++){
    selected_dates.push(new Date(availabilities[i]['date']).getTime());
    all_dates.push(availabilities[i]['date']);
}

if(selected_dates.length != '0'){
    $( ".avai").multiDatesPicker({
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
    $( ".avai").multiDatesPicker({
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