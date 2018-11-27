@extends('layouts.admin')
@section('content')
<section class="content-header">
    <h1>
    User view
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
            <h3 class="box-title">Primary Parent</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>

                <tr>
                  <th>First Name</th>
                  <td>{{ $user->first_name1 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $user->last_name1 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $user->mobile1 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $user->alt_mobile1 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>                

          <div class="box">
          <div class="box-header">
            <h3 class="box-title">Secondary Parent</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>

                <tr>
                  <th>First Name</th>
                  <td>{{ $user->first_name2 }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $user->last_name2 }}</td>
                </tr>
                
                <tr>
                  <th> Mobile </th>
                  <td>{{ $user->mobile2 }}</td>
                </tr>
                <tr>
                  <th> Alternative number </th>
                  <td>{{ $user->alt_mobile2 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->      
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Basic</h3>
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
                  <th>Address</th>
                  <td>{{ $user->address_1 }}</td>
                </tr>
                <tr>
                  <th>Address 2</th>
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
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div> 

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Additional Information</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>Household Info</th>
                  <td>{{ $user->household_info }}</td>
                </tr>
                <tr>
                  <th>Pet Info</th>
                  <td>{{ $user->pet_info }}</td>
                </tr>
                
                <tr>
                  <th>{{ $user->q1 }} </th>
                  <td>{{ $user->a1 }}</td>
                </tr>
                <tr>
                  <th>{{ $user->q2 }} </th>
                  <td>{{ $user->a2 }}</td>
                </tr>
                <tr>
                  <th>{{ $user->q3 }} </th>
                  <td>{{ $user->a3 }}</td>
                </tr>

                <tr>
                  <th>{{ $user->q4 }} </th>
                  <td>{{ $user->a4 }}</td>
                </tr>

                <tr>
                  <th>{{ $user->q5 }}</th>
                  <td>{{ $user->a5 }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>


                       <div class="box">
          <div class="box-header">
            <h3 class="box-title">How did You Hear About Us</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>How did You Hear About Us?</th>
                  <td>{{ $user->hear_aboutus }}</td>
                </tr>
                <tr>
                  <th>Which type of Social Media?</th>
                  <td>{{ $user->which_hear_aboutus }}</td>
                </tr>
                
                <tr>
                  <th>Name of Family / Friend Who Referred You</th>
                  <td>{{ $user->referred_by }}</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

       <div class="box">
          <div class="box-header">
            <h3 class="box-title">Child details</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>Number of child</th>
                  <td>{{ $user->childs }}</td>
                </tr>
                <tr>
                  <th>Ages</th>
                  <td>
                  @php $ages = json_decode($user->ages); @endphp
                  @if(!empty($ages))
                  <ul class="list-group">
                  @foreach($ages as $age)
                    <li class="list-group-item">{{$age->age}} Yrs || {{ $age->gender }}</li>
                  @endforeach
                  </ul>
                  @endif
                  </td>
                </tr>
                
                <tr>
                  <th>Gender</th>
                  <td>{{ ucwords($user->gender) }}</td>
                </tr>

                <tr>
                  <th>Requirement of nanny</th>
                  <td>{{ ucwords($user->nanny_requirement) }}</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Card Details</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th>Card Number</th>
                  <td>{{ $user->cc_number }}</td>
                </tr>
                <tr>
                  <th>Card type</th>
                  <td>{{ $user->cc_type }}</td>
                </tr>
                <tr>
                  <th>Card Expiry Date</th>
                  <td>{{ $user->cc_expire_date_month.'/'.$user->cc_expire_date_year }}</td>
                </tr>
                
                <tr>
                  <th>Profile ID</th>
                  <td>{{ $user->profile_id }}</td>
                </tr>

                <tr>
                  <th>Member since</th>
                  <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
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


    </div>
</section>  
@endsection     