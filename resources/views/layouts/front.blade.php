<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FLEXIBLEPOS v2.0</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{--@if(!empty(DB::table('flexible_pos_settings')->first()->fevicon_path))
  <link rel="icon" href="{{asset(DB::table('flexible_pos_settings')->first()->fevicon_path)}}"  />
  @else --}}
  <link rel="icon" href="{{asset('images/logo-top.png')}}"  />
  {{-- @endif --}}
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap-datetimepicker.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/blue.css')}}">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
        	.wrapper{

        	}
        </style>
</head>
<body class="hold-transition login-page">



  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  

<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="{{asset('js/app.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<!-- <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="../../bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<!-- page script -->
@yield('script')
<script src="{{asset('dist/js/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
