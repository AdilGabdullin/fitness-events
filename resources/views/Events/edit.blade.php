@extends('layouts.admin')

@section('content')
    {{--{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}--}}
    {{--{!! Html::script('js/automate.js', array('type' => 'text/javascript')) !!}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Event Providers</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Event</a></li>
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
                                <h3 class="box-title">Update Event </h3><a class="btn btn-small btn-primary pull-right" href="{{ route('events.index') }}"><i class="fa fa-list"></i>&nbsp; List</a>
                            </div>
                        </div>
                    </div>
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-header"></div>
                            {{--{!! Form::open(array('url' => 'events', 'files' => true,)) !!}--}}
                            {!! Form::model($event, array('route' => array('events.update', $event->id), 'method' => 'PUT', 'files' => true,)) !!}
                            <div class="col-md-12">
                                <h3 class="form-section-heading">Event Details</h3>
                                <div class="row">
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('url', 'Url' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('url', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('event_provider_id', 'Event Provider' .' *',['class'=>'text-right']) !!}
                                            {!! Form::select('event_provider_id', $event_providers, null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row datetime">
                                            <div class="col-md-12">
                                                {!! Form::label('date_time', 'Date & Time' .' *',['class'=>'text-right']) !!}
                                            </div>
                                            <div class="col-md-12">
                                                {!! Form::text('date_time', null, array('class' => '', 'id'=>'date_time', 'required')) !!}
                                            </div>

                                        </div>
                                        <div class="form-group multiple-input">
                                            {!! Form::label('distance', 'Distance', ['class'=>'text-right']) !!}
                                            <div class="row">
                                                <div class="col-xs-10 no-right-padding">
                                                    {!! Form::text('distance', null, array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="col-xs-2 no-left-padding">
                                                    {!! Form::select('distance_type', ['KM'=>'KM', 'Miles'=>'Miles', 'Various'=>'Various'] , null, array('class' => 'form-control', 'required')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group cost-input">
                                            {!! Form::label('cost', 'Cost(£)' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('cost', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('phone', 'Phone' .' *',['class'=>'text-right']) !!}
                                            {!! Form::number('phone', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-8">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('short_description', 'Short Description', ['class'=>'text-right']) !!}
                                    {!! Form::textarea('short_description', null, array('class' => 'form-control', "rows"=>2, 'id'=>'short_description')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('long_description', 'Main Description', ['class'=>'text-right']) !!}
                                    {!! Form::textarea('long_description', null, array('class' => 'form-control', 'id'=>'long_description', "rows"=>5)) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3 class="form-section-heading">Location</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('address', 'Address' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('address', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('city', 'City' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('city', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('country', 'County' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('country', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('postcode', 'Postcode' .' *',['class'=>'text-right']) !!}
                                            {!! Form::text('postcode', null, array('class' => 'form-control', 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="searchMap">Exact Location</label>

                                            <input type="text" id="searchMap" class="form-control">

                                            <div id="map-canvas"></div>

                                        </div>
                                        <div class="form-group hidden">
                                            <label for="lat">Latitute</label>
                                            <input type="text" id="lat" class="form-control" name="latitude">
                                        </div>
                                        <div class="form-group hidden">
                                            <label for="lng">Longitute</label>
                                            <input type="text" id="lng" class="form-control" name="longitude">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h3 class="form-section-heading">Tags</h3>
                                <div class="row row-overflow-hidden">
                                    @foreach($atag_categories as $value)
                                        <div class="col-sm-3">
                                            <div class="tag-column">
                                                <h4 class="tag-category">{{$value->name}}</h4>
                                                <ul class="no-list-style">
                                                    @foreach($value->tag as $avalue)
                                                        <li>{!! Form::checkbox('tags_sport[]', $avalue->id, $tags_sport) !!} {{$avalue->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px;">
                                <div class="box box-success collapsed-box">
                                    <div class="box-header">
                                        <h3 class="box-title form-section-heading">Paid for / Affiliate Listings</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="display: none">
                                        <div class="form-group">
                                            {!! Form::label('signup_btn_txt', 'Signup Button Text',['class'=>'text-right']) !!}
                                            {!! Form::text('signup_btn_txt', null, array('class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('signup_btn_link', 'Signup Button Link',['class'=>'text-right']) !!}
                                            {!! Form::text('signup_btn_link', null, array('class' => 'form-control',)) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-success collapsed-box">
                                    <div class="box-header">
                                        <h3 class="box-title form-section-heading">Partner Portal</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="display: none">
                                        <div class="form-group">
                                            {!! Form::label('discount', 'Discount',['class'=>'text-right']) !!}
                                            {!! Form::number('discount', null, array('class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('discount_code', 'Discount Code',['class'=>'text-right']) !!}
                                            {!! Form::text('discount_code', null, array('class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('discount_link_text', 'Discount Link Text', ['class'=>'text-right']) !!}
                                            {!! Form::text('discount_link_text', null, array('class' => 'form-control')) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('discount_link', 'Discount Link', ['class'=>'text-right']) !!}
                                            {!! Form::text('discount_link', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @include('Events.charity_section')
                                <div class="box box-success collapsed-box">
                                    <div class="box-header">
                                        <h3 class="box-title form-section-heading">Related </h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body" style="display: none;" id="related_box">
                                        <div id="related">
                                        <div class="row related">
                                            <div class="col-sm-1">
                                                {!! Form::label('related_type', 'Type', ['class'=>'text-right']) !!}
                                            </div>
                                            <div class="col-sm-2">
                                                {!! Form::select('related_type', [1=>'Blog', 2=>'Event'], null, array('class' => 'form-control', 'id'=>'related_type','onchange'=>'relstedOnchange(this)')) !!}
                                            </div>
                                            <div id="related_event_selection">
                                                <div class="col-sm-1">
                                                    {!! Form::label('related_events', 'Events/Articles ', ['class'=>'text-right']) !!}
                                                </div>
                                                <div class="col-sm-2">
                                                    {!! Form::select('related_events[]', $events, null, array( 'id'=>'related_events', 'class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                            <div id="related_article_selection">
                                                <div class="col-sm-1">
                                                    {!! Form::label('related_articles', 'Events/Articles ', ['class'=>'text-right']) !!}
                                                </div>
                                                <div class="col-sm-2">
                                                    {!! Form::select('related_articles[]', $articles, null, array('id'=>'related_articles', 'class' => 'form-control')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <a href="javascript:;" class="btn btn-info" id="add_related">Add New</a>
                                    </div>
                                </div>
                                <h3 class="form-section-heading">SEO Friendly</h3>
                                <div class="form-group">
                                    {!! Form::label('meta_title', 'Meta title' .' *',['class'=>'text-right']) !!}
                                    {!! Form::text('meta_title', null, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('page_url', 'Page Url' .' *',['class'=>'text-right']) !!}
                                    {!! Form::text('page_url', null, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('meta_description', 'Meta Description' .' *',['class'=>'text-right']) !!}
                                    {!! Form::textarea('meta_description', null, array('class' => 'form-control', 'rows'=>3)) !!}
                                </div>
                                <h3 class="form-section-heading">Image</h3>
                                <div class="form-group">
                                    {!! Form::label('image', 'Image', ['class'=>'text-right']) !!}
                                    {!! Form::file('image', null, array('class' => 'form-control')) !!}

                                </div>
                                @php
                                    $media = $event->getMedia('event_image')->last();
                                    $bmedia_name = isset($media->name) ? $media->name : "";
                                @endphp
                                @if(!empty($media))
                                <img src="{{$media->getUrl()}}" alt="" height="50" />
                                @endif
                                {{--  <img src="{{asset($event->image)}}" alt="" width="70" style="margin-top: 10px">  --}}
                                <div class="form-group">
                                    {!! Form::label('image_name', 'Image Name', ['class'=>'text-right']) !!}
                                    {!! Form::text('image_name', $bmedia_name, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('image_alt_tag', 'Image alt tag', ['class'=>'text-right']) !!}
                                    {!! Form::text('image_alt_tag', null, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::checkbox('is_featured', 1) !!} {!! Form::label('is_featured', 'Make this event featured') !!}
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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Charity Sponsor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('url' => 'charities', 'files' => true, 'id'=>'charity-form')) !!}
                    <div class="" >
                        <div class="form-group">
                            {!! Form::label('name', 'Name' .' *',['class'=>'text-right']) !!}
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email',['class'=>'text-right']) !!}
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone',['class'=>'text-right']) !!}
                            {!! Form::number('phone', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('website_link', 'Website Link', ['class'=>'text-right']) !!}
                            {!! Form::text('website_link', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('logo', 'Logo',['class'=>'text-right']) !!}
                            {!! Form::file('logo', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="">
                            {!! Form::submit('Submit', array('class' => 'btn btn-primary', 'id'=>'add-charity')) !!}
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/jquery-1.11.2.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIsAAeQRHFo2xm5sbTm4pCCDhrVlr2Og4&libraries=places" type="text/javascript"></script>
    <script src="{{asset('js/tagsinput.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        var lng = <?php  if(!empty($event->longitude)){echo $event->longitude; } else {echo '27.72';}  ?>;
        var lat = <?php  if(!empty($event->latitude)) {echo $event->latitude; } else {echo '27.72';}  ?>;
        {{--var lat = {{(!empty($event->latitude) ? $event->latitude : '27.72'}};--}}
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat:lat,
                lng:lng
            },
            zoom:17
        });
        var marker = new google.maps.Marker({
            position:{
                lat:lat,
                lng:lng
            },
            map: map,
            draggable:true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));
        google.maps.event.addListener(searchBox, 'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(17);
        });
        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

        });
    </script>
    <script>
        $("document").ready(function () {
            tinymce.init({
                selector: '#long_description,#short_description',
                width: "700",
                height: "100",
                plugins: [
                    "code"
                ],
                toolbar: "code"
            });
            $("#date_time").datetimepicker({format: "YYYY-MM-DD LT"});
            $("#addCharity").on('click', function () {
                $("#myModal").addClass('in');
            });
        });
        $("#add_charities").on('click', function () {
            var cNo = $("#no_of_charities").val();
            var charityList = $("#list_of_charities").html();
            if (parseInt(cNo) == 0) {
                cNo = 1;
            }
            $("#charity_box").append('<div class="row charities"><div class="col-sm-1"><label for="charity_name_' + cNo + '" class="text-right">Charity</label></div> <div class="col-sm-2">'+charityList+'<input name="charity_name_' + cNo + '" type="hidden" id="charity_name" class="form-control"></div> <div class="col-sm-1"><label for="charity_phone_' + cNo + '" class="text-right">Phone</label></div> <div class="col-sm-2"><input name="charity_phone_' + cNo + '" type="text" id="charity_phone" class="form-control"></div> <div class="col-sm-1"><label for="charity_email_' + cNo + '" class="text-right">Email</label></div> <div class="col-sm-2"><input name="charity_email_' + cNo + '" type="text" id="charity_email" class="form-control"></div> <div class="col-sm-1"><label for="charity_url_' + cNo + '" class="text-right">Url</label></div> <div class="col-sm-2"><input name="charity_url_' + cNo + '" type="text" id="charity_url" class="form-control"></div></div>');
            $("#no_of_charities").val(parseInt(cNo) + 1);
        });

        function relstedOnchange(elem){
            var related = $(elem).parents('div.related');
            var value = $(elem).val();
            if(value == 1){
                related.children('div#related_article_selection').show();
                related.children('div#related_event_selection').hide();
            } else if(value == 2){
                related.children('div#related_event_selection').show();
                related.children('div#related_article_selection').hide();
            }
        }

        function charityOnChange(elem) {
            var charityId = $(elem).val();
            var url = '{{url('/getCharities')}}';
            var currentCharity = $(elem).parents('div.charities');
            var formData = {
              'charity_id': charityId
            };
            $.ajax({
                type: "GET",
                url: url,
                data: formData,
                cache: false,
                success: function(data){
                    currentCharity.children("div").children("input#charity_name").val(data.name);
                    currentCharity.children("div").children("input#charity_phone").val(data.phone);
                    currentCharity.children("div").children("input#charity_email").val(data.email);
                    currentCharity.children("div").children("input#charity_url").val(data.website_link);
                }
            })
        }

        $("#add_related").on('click', function () {
            var relatedHtml = $('#related').html();
            $("#related_box").append(relatedHtml);
        });


    </script>
@endsection