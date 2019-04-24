<header class="main-header">
    <!-- Logo -->
    <a href="https://www.ukfitnessevents.co.uk/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
        {{--@if(!empty(DB::table('flexible_pos_settings')->first()->fevicon_path))--}}
                {{--<img src="{{asset(DB::table('flexible_pos_settings')->first()->fevicon_path)}}" alt="" height="40px" width="40px">--}}
            {{--@else--}}
                <img src="{{asset('images/fevicon.png')}}" alt="" height="40px" width="40px">
            {{--@endif--}}

      </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          {{--@if(!empty(DB::table('flexible_pos_settings')->first()->logo_path))
                <img src="{{asset(DB::table('flexible_pos_settings')->first()->logo_path)}}" alt="" height="40px">
            @else--}}
                <img src="{{asset('images/default.png')}}" alt="" height="40px">
            {{--@endif--}}
        </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('dist/img/avatar.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{Auth::user()->created_at->format('Y-m-d')}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-6 text-center">
                                        <a href="{{url('/')}}">Settings</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="{{url('/')}}">Sales</a>
                                    </div>
                                    {{-- <div class="col-xs-4 text-center">
                                      <a href="#">Friends</a>
                                    </div> --}}
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('/')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
            @endif
            <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>