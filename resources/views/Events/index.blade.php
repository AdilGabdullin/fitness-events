@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Events</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Events</a></li>
                <li class="active">All</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <!-- /.box -->
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Event List</h3><a class="btn btn-small btn-primary pull-right" href="{{route('events.create') }}"><i class="fa fa-plus"></i>&nbsp; Create Event </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="140"> Name</th>
                                    <th >Event Provider</th>
                                    <th width="30">Category</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->eventprovider->company_name }}</td>
                                        {{--  <td>{{ $value->tagCategory->name }}</td>  --}}
                                        <td></td>
                                        <td>{{ date('d M Y H:i A', strToTime($value->date_time))}}</td>
                                        <td class="item_btn_group">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-list"></i><span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route('events.edit',$value->id) }}"><i class="fa fa-pencil"></i>Edit</a></li>
                                                    <li>
                                                    {{--<li><a href="{{ url('events/' . $value->id ) }}"><i class="fa fa-eye"></i>View</a></li>--}}
                                                    <li>
                                                        <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><i class="fa fa-trash-o"></i>{!! Form::open(array('route' => ['events.destroy', $value->id], 'class' => 'form-inline')) !!}
                                                            {!! Form::hidden('_method', 'DELETE') !!}
                                                            {!! Form::submit('Delete', array('class' => 'delete-btn')) !!}
                                                            {!! Form::close() !!}</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $('#myTable').DataTable({
            });
        });
    </script>
@endsection