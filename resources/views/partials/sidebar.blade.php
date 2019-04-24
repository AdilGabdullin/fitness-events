@if (Auth::check())
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- Sidebar user panel -->
           {{-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>--}}
            <!-- search form -->
            {{--<form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>--}}
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class=""><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                @if(Auth::user()->hasAnyRole(['Editor','Admin']))
                <li class="{{(Route::is('eventproviders')) ? 'active' : ''}} "><a href="{{ route('eventproviders.index') }}"><i class="fa fa-users"></i> <span>Event Providers</span></a></li>
                <li class="{{(Route::is('events')) ? 'active' : ''}} "><a href="{{ route('events.index') }}"><i class="fa fa-calendar"></i> <span>Events</span></a></li>
                <li class="{{(Route::is('pages')) ? 'active' : ''}} "><a href="{{ route('pages.index') }}">
                        <i class="fa fa-sitemap"></i> <span>Pages</span></a>
                </li>
                @endif
            {{--<!-- <li><a href="{{ route('item-kits') }}">{{trans('menu.item_kits')}}</a></li> -->--}}
                @if(Auth::user()->hasAnyRole(['Editor', 'Admin', 'User']))
                <li class="{{(Route::is('blogs')) ? 'active' : ''}} "><a href="{{ route('blogs.index') }}"><i class="fa fa-pencil"></i> <span>Blogs</span></a></li>
                <li class="{{(Route::is('tags')) ? 'active' : ''}} "><a href="{{ route('tags.index') }}"><i class="fa fa-tags"></i> <span>Tags</span></a></li>
                <li class="{{(Route::is('medias')) ? 'active' : ''}} "><a href="{{ route('medias.index') }}"><i class="fa fa-youtube-play"></i> <span>Medias</span></a></li>
                @endif

                {{--<li class="{{(Request::is('accounts')) ? 'active' : ''}} treeview">--}}
                    {{--<a href="#"><i class="fa fa-university"></i> <span>{{trans('menu.accounts')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li class="{{(Request::is('accounts')) ? 'active' : ''}} ">--}}
                            {{--<a href="{{ url('/accounts') }}"><i class="fa fa-circle-o"></i> <span>{{trans('menu.accounts')}}</span></a>--}}
                        {{--</li>--}}
                        {{--<li class="{{(Request::is('transactions')) ? 'active' : ''}}">--}}
                            {{--<a href="{{ url('transactions') }}"><i class="fa fa-circle-o"></i> Transactions</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="{{(Request::is('expense')) ? 'active' : ''}} treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-dollar"></i> <span>{{trans('menu.expense')}}</span>--}}
                        {{--<span class="pull-right-container">--}}
          {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li class="{{(Request::is('expense')) ? 'active' : ''}}"><a href="{{ url('/expense') }}"><i class="fa fa-circle-o"></i> <span>{{trans('menu.expense')}}</span></a></li>--}}
                        {{--<li class="{{(Request::is('expensecategory')) ? 'active' : ''}}"><a href="{{ url('expensecategory') }}"><i class="fa fa-circle-o"></i> Expense Category</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="{{(Request::is('reports')) ? 'active' : ''}} treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-money"></i> <span>{{trans('menu.reports')}}</span>--}}
                        {{--<span class="pull-right-container">--}}
          {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li class="{{(Request::is('reports/receivings')) ? 'active' : ''}}"><a href="{{ url('/reports/receivings') }}"><i class="fa fa-circle-o"></i> {{trans('menu.receivings_report')}}</a></li>--}}
                        {{--<li class="{{(Request::is('reports/sales')) ? 'active' : ''}}"><a href="{{ url('/reports/sales') }}"><i class="fa fa-circle-o"></i> {{trans('menu.sales_report')}}</a></li>--}}
                        {{--<li class="{{(Request::is('reports/getsale')) ? 'active' : ''}}"><a href="{{ url('/reports/getsale') }}"><i class="fa fa-circle-o"></i> {{trans('menu.print_sales_report')}}</a></li>--}}
                        {{--<li class="{{(Request::is('reports/dailyreport/create')) ? 'active' : ''}}"><a href="{{ url('/reports/dailyreport/create') }}"><i class="fa fa-circle-o"></i> {{trans('menu.daily_report')}}</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                @if(Auth::user()->hasRole('Admin'))
                <li class=""><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                @endif
                {{-- <li class=""><a href="{{ url('/barcode') }}"><i class="fa fa-list"></i>  <span>{{trans('menu.barcode')}}</span></a></li> --}}
            </ul>



        </section>
    </aside>
@endif