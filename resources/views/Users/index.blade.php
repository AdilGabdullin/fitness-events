@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (User header) -->
    <section class="content-header">
      <h1>Users</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
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
              <h3 class="box-title">Users List</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('users.create') }}"><i class="fa fa-plus"></i>&nbsp; Create User</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box">
              <div class="box-header"></div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> Name</th>
                        <th >Email</th>
                        {{--<th width="30">Logo</th>--}}
                        {{--<th>Phone</th>--}}
                        {{--<th>Email</th>--}}
                        {{--<th>Facebook</th>--}}
                        {{--<th>Twitter</th>--}}
                        {{--<th>Information</th>--}}
                        {{--<th>Created By</th>--}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    	@foreach($users as $value)
        <tr>
          <td>{{ $value->name }}</td>
          {{--<td><img src="{{ asset($value->logo_path) }}" alt="" width="100" /></td>--}}
            <td>{{ $value->email }}</td>
            {{--<td>{{ $value->phone }}</td>--}}
            {{--<td>{{ $value->email }}</td>--}}
            {{--<td>{{$value->facebook}}</td>--}}
            {{--<td>{{$value->twitter}}</td>--}}
{{--          <td>{{$value->company_information}}</td>--}}
          {{--<td>{{$value->created_at}}</td>--}}
          <td class="item_btn_group">
              <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-list"></i><span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('users.edit', $value->id) }}"><i class="fa fa-pencil"></i>Edit</a></li>
                  <li>
                  {{--<li><a href="{{ url('users/' . $value->id ) }}"><i class="fa fa-eye"></i>View</a></li>--}}
                  <li>
                      <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><i class="fa fa-trash-o"></i>{!! Form::open(array('route' => ['users.destroy', $value->id], 'class' => 'form-inline')) !!}
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