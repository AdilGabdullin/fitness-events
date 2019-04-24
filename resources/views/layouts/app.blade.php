<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FitnessEvents</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="css/jquery-ui.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css"/>
<!-- <link href="{{ asset('/css/datatables.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <link href="{{ asset('/dist/css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    {{--@if(!empty(DB::table('flexible_pos_settings')->first()->fevicon_path))
        <link rel="icon" href="{{asset(DB::table('flexible_pos_settings')->first()->fevicon_path)}}"  />
    @else
        <link rel="icon" href="{{asset('images/logo-top.png')}}"  />
@endif--}}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('partials.navbar')

    @include('partials.sidebar')
    <div id="app">
        @yield('content')
    </div>



<!-- <footer class="footer hidden-print">
      <div class="container">
        <p class="text-muted branding">Design & Developed by <a href="http://flexibleit.net/"><img src="{{asset("images/flexibleit_logo.png")}}" alt=""></a>.
        </p>
      </div>
    </footer> -->
    @include('partials.footer')
<!-- Scripts -->
    <!-- <script	src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script	src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->

    <script src="{{asset('js/app.js')}}"></script>
<!-- <script src="{{asset('js/datatables.js')}}"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script> -->
    {{--<script src="{{asset("/js/filesaver.js")}}"></script>--}}
    {{--<script src="{{asset("/js/jquerywordexport.js")}}"></script>--}}
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->

    @yield('script')
</div>
</body>
</html>
