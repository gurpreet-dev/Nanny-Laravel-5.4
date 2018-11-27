<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    @if(Auth::user()->role == 'admin')
    {{"Super Admin"}}
    @else
    {{"Nanny Admin"}}
    @endif
    </title>

    <!-- Styles -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/admin/bootstrap-timepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/')}}/css/admin/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css"> -->


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- jQuery 3 -->
    <script src="{{url('/')}}/js/admin/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('/')}}/js/admin/jquery-ui.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{url('/')}}/js/admin/bootstrap.min.js"></script>

    <script src="{{url('/')}}/js/admin/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/js/admin/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="{{url('/')}}/js/admin/raphael.min.js"></script>
    <script src="{{url('/')}}/js/admin/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('/')}}/js/admin/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{url('/')}}/js/admin/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{url('/')}}/js/admin/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('/')}}/js/admin/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{url('/')}}/js/admin/moment.min.js"></script>
    <script src="{{url('/')}}/js/admin/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{url('/')}}/js/admin/bootstrap-datepicker.min.js"></script>
    <script src="{{url('/')}}/js/admin/bootstrap-timepicker.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{url('/')}}/js/admin/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('/')}}/js/admin/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/')}}/js/admin/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('/')}}/js/admin/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/')}}/js/admin/demo.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.6/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.6/sweetalert2.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        label.error{color: red; font-weight: 400; font-style: italic;}
    </style>

</head>

@if(Auth::user()->role == 'admin')
@php $class = 'skin-blue'; @endphp
@else
@php $class = 'skin-red'; @endphp
@endif

<body class="hold-transition {{$class}} sidebar-mini">
    <div class="wrapper">

    <!-- Header -->
    @component('components.admin.header')
    @endcomponent
        
    <!-- Header end -->

    <!-- Sidebar -->
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->

        @component('components.admin.sidebar')
                            
        @endcomponent
        
    </aside>
    <!-- Sidebar end -->

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2018-2018 <a href="https://adminlte.io">Portland nanny</a>.</strong> All rights
        reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    </div>
</body>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
  $(function () {
    $('#example2, .example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
    tinymce.init({
        selector: '.page-textarea',
        plugins: [
        "code", "charmap", "link"
        ],
        toolbar: [
        "undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
        ]
    });
</script>

</html>
