<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            @if(Auth::user()->image != '')
            <img src="{{url('/')}}/images/users/{{Auth::user()->image}}" class="img-circle" alt="User Image">
            @else
            <img src="{{url('/')}}/images/users/noimage.png" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <<li>
            <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-globe"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        @if(Auth::user()->role == 'admin')
        <li>
            <a href="{{url('admin/users')}}">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        
        
        <li>
            <a href="{{url('admin/nannies')}}">
            <i class="fa fa-female"></i> <span>Nannies</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        @php $types = DB::table('types')->get(); @endphp

        <li class="treeview">
            <a href="#">
            <i class="fa fa-exchange"></i> <span>Family Requests</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            @foreach($types as $type)
                <li><a href="{{ url('/') }}/admin/requests/{{$type->id}}"><i class="fa fa-circle-o"></i> {{ ucwords($type->title) }}</a></li>
            @endforeach    
            </ul>
        </li>

        <li>
            <a href="{{url('admin/bookings')}}">
            <i class="fa fa-cart-arrow-down"></i> <span>Bookings</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li>
            <a href="{{url('admin/contacts')}}">
            <i class="fa fa-phone"></i> <span>Contacts</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li>
            <a href="{{url('admin/services')}}">
            <i class="fa fa-cubes"></i> <span>Services</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li>
            <a href="{{url('admin/prices')}}">
            <i class="fa fa-money"></i> <span>Prices</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li class="treeview">
            <a href="#">
            <i class="fa fa-table"></i> <span>Payments</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/') }}/admin/service_payments"><i class="fa fa-circle-o"></i> Service</a></li>
                <li><a href="{{ url('/') }}/admin/order_payments"><i class="fa fa-circle-o"></i> Bookings</a></li>
            </ul>
        </li>
        
        <li>
            <a href="{{url('admin/pages')}}">
            <i class="fa fa-file-text"></i> <span>Static Pages</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        @endif

        @if(Auth::user()->role == 'nanny')
        <li>
            <a href="{{route('availability')}}">
            <i class="fa fa-calendar"></i> <span>Manage availability</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="{{url('admin/nanny/requests')}}">
            <i class="fa fa-exchange"></i> <span>Family Requests</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="{{url('admin/nanny/orders')}}">
            <i class="fa fa-cart-arrow-down"></i> <span>Your Bookings</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        <li>
            <a href="{{route('monthlyAttendence',['id' => 'auth'])}}">
            <i class="fa fa-check-square-o"></i> <span>Attendence</span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        @endif
        
    
    </ul>
</section>
<!-- /.sidebar -->