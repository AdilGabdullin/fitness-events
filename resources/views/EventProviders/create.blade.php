@extends('layouts.admin')

@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}
<div class="content-wrapper" ng-app="automateApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Event Providers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Event Providers</a></li>
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
		              <h3 class="box-title">Create Event Providers</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('eventproviders.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
		            </div>
            	</div>
            </div>
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body" ng-controller="automateController">
					<div class="box-header"></div>
					{!! Form::open(array('route' => 'eventproviders.store', 'files' => true,)) !!}
				<div class="col-md-6" >
					<div class="form-group">
						{!! Form::label('company_type', 'Select a Company Type' .' *',['class'=>'text-right']) !!}
						{!! Form::select('company_type', ['Provider'=>'Provider', 'Charity'=>'Charity', 'Club'=>'Club'] , null, array('class' => 'form-control', 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('company_name', 'Company Name' .' *',['class'=>'text-right']) !!}
						{!! Form::text('company_name', null, array('class' => 'form-control', 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('url', 'Url', ['class'=>'text-right']) !!}
						{!! Form::text('url', null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email' .' *',['class'=>'text-right']) !!}
						{!! Form::text('email', null, array('class' => 'form-control', )) !!}
					</div>
					<div class="form-group">
						{!! Form::label('phone', 'Phone',['class'=>'text-right']) !!}
						{!! Form::number('phone', null, array('class' => 'form-control', 'ng-model'=>'qty', )) !!}
					</div>
					<div class="form-group">
						{!! Form::label('facebook', 'Facebook',['class'=>'text-right']) !!}
						{!! Form::text('facebook', null, array('class' => 'form-control', 'ng-model'=>'qty', 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('twitter', 'Twitter',['class'=>'text-right']) !!}
						{!! Form::text('twitter', null, array('class' => 'form-control', 'ng-model'=>'qty', 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('company_information', 'Company Information', ['class'=>'text-right']) !!}
						{!! Form::textarea('company_information', null, array('class' => 'form-control',  'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('logo_path', 'Company Logo', ['class'=>'text-right']) !!}
						{!! Form::file('logo_path', null, array('class' => 'form-control',  'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('logo_name', 'Image Name', ['class'=>'text-right']) !!}
						{!! Form::text('logo_name', null, array('class' => 'form-control', 'ng-model'=>'qty')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('logo_alt_tag_name', 'Image Alt Tag',['class'=>'text-right']) !!}
						{!! Form::text('logo_alt_tag_name', null, array('class' => 'form-control', 'ng-model'=>'qty')) !!}
					</div>
					<div class="">
					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
					</div>

				</div>
				<div class="col-md-6">

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