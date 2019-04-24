@extends('layouts.admin')

@section('content')
    {{--{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}--}}
    {{--{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Tags</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tags</a></li>
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
                                <h3 class="box-title">Create Tag</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('tags.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
                            </div>
                        </div>
                    </div>
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-header"></div>
                            {{--  {!! Form::open(array('url' => 'tags', 'files' => true,)) !!}  --}}
                            {!! Form::model($tag, array('route' => array('tags.update', $tag->id), 'method' => 'PUT', 'files' => true,)) !!}
                            <div class="col-md-6" >
                                <div class="form-group">
                                    {!! Form::label('name', 'Name' .' *',['class'=>'text-right']) !!}
                                    {!! Form::text('name', null, array('class' => 'form-control', 'required', 'disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('tag_category_id', 'Select a Tag Category' .' *',['class'=>'text-right']) !!}
                                    {!! Form::select('tag_category_id', $tag_categories , null, array('class' => 'form-control', 'required','disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_description', 'Short Description', ['class'=>'text-right']) !!}
                                    {!! Form::textarea('short_description', null, array('class' => 'form-control', "rows"=>2, 'disabled')) !!}
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
@endsection