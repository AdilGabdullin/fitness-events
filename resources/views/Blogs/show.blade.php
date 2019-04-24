@extends('layouts.admin')

@section('content')
    {{--{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}--}}
    {{--{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Blogs</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Blogs</a></li>
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
                                <h3 class="box-title">Create Blog</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('blogs.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
                            </div>
                        </div>
                    </div>
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-header"></div>
                            {{--{!! Form::open(array('url' => 'blogs', 'files' => true,)) !!}--}}
                            {!! Form::model($blog, array('route' => array('blogs.update', $blog->id), 'method' => 'PUT', 'files' => true,)) !!}
                            <div class="col-md-8" >
                                <div class="form-group">
                                    {!! Form::label('title', 'Title' .' *',['class'=>'text-right']) !!}
                                    {!! Form::text('title', null, array('class' => 'form-control', 'required', 'disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('blog_category_id', 'Select a Blog Category' .' *',['class'=>'text-right']) !!}
                                    {!! Form::select('blog_category_id', $blog_categories , null, array('class' => 'form-control', 'required', 'disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('short_description', 'Short Description', ['class'=>'text-right']) !!}
                                    {!! Form::textarea('short_description', null, array('class' => 'form-control', "rows"=>2, 'id'=>'short_description', 'disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('main_content', 'Main Content', ['class'=>'text-right']) !!}
                                    {!! Form::textarea('main_content', null, array('class' => 'form-control', 'id'=>'main_content', "rows"=>5,'disabled'=>true)) !!}
                                </div>
                                <h3 class="form-section-heading">SEO</h3>
                                <div class="form-group">
                                    {!! Form::label('meta_title', 'Meta Title' .' *',['class'=>'text-right']) !!}
                                    {!! Form::text('meta_title', null, array('class' => 'form-control', 'disabled'=>true)) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('meta_description', 'Meta Description',['class'=>'text-right']) !!}
                                    {!! Form::textarea('meta_description', null, array('class' => 'form-control', 'rows'=>3, 'disabled'=>true )) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('url', 'Url',['class'=>'text-right']) !!}
                                    {!! Form::text('url', null, array('class' => 'form-control','disabled'=>true)) !!}
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('image', 'Image', ['class'=>'text-right']) !!}
                                            {!! Form::file('image', null, array('class' => 'form-control')) !!}
                                            @php
                                                $media = $blog->getMedia('blog_image')->first();
                                                $bmedia_name = isset($media->name) ? $media->name : "";
                                            @endphp
                                            @if(!empty($media))
                                            <img src="{{$media->getUrl()}}" alt="" height="50" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('image_name', 'Image name', ['class'=>'text-right']) !!}
                                            {!! Form::text('image_name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('image_alt_tag', 'Image alt tag', ['class'=>'text-right']) !!}
                                            {!! Form::text('image_alt_tag', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

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
    {{--<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>--}}
    {{--<script>--}}
        {{--$("document").ready(function () {--}}
            {{--tinymce.init({--}}
                {{--selector: '#short_description,#main_content',--}}
                {{--width: "700",--}}
                {{--height: "100",--}}
                {{--plugins: [--}}
                    {{--"code"--}}
                {{--],--}}
                {{--toolbar: "code"--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection