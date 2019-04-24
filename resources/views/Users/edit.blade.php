@extends('layouts.admin')

@section('content')
	{{--{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}--}}
	{{--{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}--}}
	<div class="content-wrapper">
		<!-- Content Header (User header) -->
		<section class="content-header">
			<h1>Users</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Users</a></li>
				<li class="active">Create</li>
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
					{!! Html::ul($errors->all()) !!}
					<div class="box">
						<div class="box-header">
							<div class="box-header">
								<h3 class="box-title">Create User</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('users.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
							</div>
						</div>
					</div>
					<div class="box">

						<!-- /.box-header -->
						<div class="box-body">
							<div class="box-header"></div>
							{{--{!! Form::open(array('url' => 'users', 'files' => true,)) !!}--}}
							{!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'files' => true,)) !!}
							<div class="col-md-6" >
								<div class="form-group">
									{!! Form::label('name', 'Name' .' *',['class'=>'text-right']) !!}
									{!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
								</div>
								<div class="form-group">
									{!! Form::label('email', 'Email' .' *',['class'=>'text-right']) !!}
									{!! Form::text('email', null, array('class' => 'form-control')) !!}
								</div>
								<div class="form-group">
									{!! Form::label('role_id', 'User Role' .' *',['class'=>'text-right']) !!}
									{!! Form::select('role_id', $roles, $role_user->role_id, array('class' => 'form-control')) !!}
								</div>
								<div class="form-group">
									{!! Form::label('password', 'Password', ['class'=>'text-right']) !!}
									{!! Form::password('password', array('class' => 'form-control')) !!}
								</div>

								<div class="form-group">
									{!! Form::label('password-confirm', __('Confirm Password'), ['class'=>'text-right']) !!}
									{!! Form::password('password_confirmation', array('class' => 'form-control', 'id'=>'password-confirm')) !!}
								</div>
								<div class="">
									{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
								</div>
							</div>

							{!! Form::close() !!}
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
	<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
	<script>
        $("document").ready(function () {
            tinymce.init({
                selector: '#short_description,#main_content',
                width: "700",
                height: "100",
                plugins: [
                    "code"
                ],
                toolbar: "code"
            });
        });
	</script>
@endsection