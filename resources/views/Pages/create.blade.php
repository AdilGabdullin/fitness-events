@extends('layouts.admin')

@section('content')
{{--{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}--}}
{{--{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}--}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pages</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pages</a></li>
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
		              <h3 class="box-title">Create Page</h3><a class="btn btn-small btn-primary pull-right" href="{{ route('pages.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
		            </div>
            	</div>
            </div>
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
					<div class="box-header"></div>
					{!! Form::open(array('route' => 'pages.store', 'files' => true,)) !!}
				<div class="col-md-12" >
					<div class="form-group">
						{!! Form::label('title', 'Title' .' *',['class'=>'text-right']) !!}
						{!! Form::text('title', null, array('class' => 'form-control', 'required')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('url', 'Url' .' *',['class'=>'text-right']) !!}
						{!! Form::text('url', null, array('class' => 'form-control')) !!}
					</div>
				</div>
					{{--  <h3 class="form-section-heading">Tags</h3>
					<div class="row row-overflow-hidden">
						@foreach($tag_categories as $value)
							<div class="col-sm-3">
								<div class="tag-column">
									<h4 class="tag-category">{{$value->name}}</h4>
									<ul class="no-list-style">
										@foreach($value->tag as $avalue)
											<li>{!! Form::checkbox('tag_ids[]', $avalue->id) !!} {{$avalue->name}}</li>
										@endforeach
									</ul>
								</div>
							</div>
						@endforeach
					</div>  --}}
					<div class="col-md-12" style="margin-top: 20px;">
						<div class="box box-success collapsed-box">
							<div class="box-header">
									<h3 class="box-title form-section-heading">Page Templates</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
										</button>
									</div>
							</div>
							<div class="box-body" style="display: none">
								<div class="">
									<div class="col-sm-3 text-right">
										<label for="page_category_id" class="text-right">Select a Page Template</label>
									</div>
									<div class="col-sm-3">
										{!! Form::select('page_category_id', $page_categories, null, ['class'=>'form-control', 'onChange'=>'changePageTemplate()', 'id'=>'page_category_id']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12" >
					<div class="form-group">
						{!! Form::label('description', 'Description', ['class'=>'text-right']) !!}
						{!! Form::textarea('description', null, array('class' => 'form-control', "rows"=>2, 'id'=>'short_description')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('content', 'Body Content', ['class'=>'text-right']) !!}
						{!! Form::textarea('content', null, array('class' => 'form-control', 'id'=>'main_content', "rows"=>5)) !!}
					</div>
					<h3 class="form-section-heading">Advertisements</h3>
					@for($i=1; $i<=3; $i++)
					<h4>Advert {{$i}}</h4>
					<div class="form-group">
						{!! Form::label('add_image_'.$i, 'Add Image', ['class'=>'text-right']) !!}
						{!! Form::file('add_image_'.$i, null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('add_image_name_'.$i, 'Add Image Name', ['class'=>'text-right']) !!}
						{!! Form::text('add_image_name_'.$i, null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('add_image_alt_tag_'.$i, 'Add Image alt tag', ['class'=>'text-right']) !!}
						{!! Form::text('add_image_alt_tag_'.$i, null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('add_image_link_'.$i, 'Add Image link', ['class'=>'text-right']) !!}
						{!! Form::text('add_image_link_'.$i, null, array('class' => 'form-control')) !!}
					</div>
					@endfor
					<h3 class="form-section-heading">SEO</h3>
					<div class="form-group">
						{!! Form::label('banner_image', 'Banner Image', ['class'=>'text-right']) !!}
						{!! Form::file('banner_image', null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('banner_image_name', 'Banner Image Name', ['class'=>'text-right']) !!}
						{!! Form::text('banner_image_name', null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('add_image_alt_tag', 'Banner Image alt Tag', ['class'=>'text-right']) !!}
						{!! Form::text('add_image_alt_tag', null, array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta_title', 'Meta Title', ['class'=>'text-right']) !!}
						{!! Form::text('meta_title', null, array('class' => 'form-control', )) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta_description', 'Meta Description', ['class'=>'text-right']) !!}
						{!! Form::textarea('meta_description', null, array('class' => 'form-control', 'rows'=>3 )) !!}
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