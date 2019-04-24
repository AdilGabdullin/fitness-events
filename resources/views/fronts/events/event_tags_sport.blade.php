@extends('fronts.front')
@section('content')
@php
$tmedia = $csports_tag->getMedia('tag_image')->last();
$tbmedia_name = isset($tmedia->name) ? $tmedia->name : "";
$tmedia_url = ($tmedia != null) ? $tmedia->getUrl() : ""; 
@endphp
<div class="page-custom-event not-front">
<div id="banner_fluid">
    <div class="banner_fluid">
        <div class="region region-banner-fluid">
            <div id="block-views-full-width-picture-block-1" class="block block-views">
                <div class="content">
                    <div class="view view-full-width-picture view-id-full_width_picture view-display-id-block_1 view-dom-id-84069bc8925aa0b32d1dced352a0ae14">
                        <div class="view-content">
                            <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                <div class="row-slider" style="background-image: url({{$tmedia_url}})">
                                    <div class="container">
                                        <div class="flex-caption">
                                            <div class="content-edit"><span class="my-edit"></span></div>
                                            <h1>{{$csports_tag->name}}</h1>
                                            <div class="desc">{{$csports_tag->description}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content container" role="main">
    <div class="row">
        <div class="col-xs-12"></div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 content-left">
            <div class="sidebar" id="sidebar-first">
                <div class="region region-sidebar-first">
                    <div id="block-block-11" class="block block-block event-search">
                        <div class="content">
                            @include('fronts.partials.search_box')
                        </div>
                    </div>
                    <div id="block-block-36" class="block block-block">
                        <div class="content">
                            <a href="https://www.awin1.com/cread.php?s=494185&amp;v=3422&amp;q=239559&amp;r=460884"> <img style="height: 250px;max-width: 216px;" border="0" src="https://www.awin1.com/cshow.php?s=494185&amp;v=3422&amp;q=239559&amp;r=460884"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12 content">
            <section class="section main-content" id="region-content">
                <div class="tabs"></div>
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">
                        <div class="content">
                            <div class="view view-events-all view-id-events_all view-display-id-page row event-listing view-dom-id-da8b5be0b8415363041d761c71ee419b">
                                <div class="view-content">
                                    @foreach ($all_events as $value)
                                    @php
                                    $media = $value->getMedia('event_image')->last();
                                    $bmedia_name = isset($media->name) ? $media->name : "";
                                    $media_url = ($media != null) ? $media->getUrl() : ""; 
                                    $tags_sport = explode(',', $value->tags_sport);
                                    $url = explode('/event/', $value->page_url);
                                    @endphp
                                    <div class="views-row views-row-1 views-row-odd views-row-first col-md-4 col-lg-4 col-xs-6 box form-group">
                                        <div about="/event/duathlon/windsor-winter-duathlon" typeof="sioc:Item foaf:Document" class="ds-1col node node-event view-mode-event_listting clearfix">
                                            <div class="field field-name-event-summary field-type-ds field-label-hidden">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <div class="box-image">
                                                            <img alt="" src="{{$media_url}}" />
                                                            <div class="box-caption" align="center">
                                                                @foreach($tags_sport as $tag)
                                                                @if(isset($all_tags[$tag]))
                                                                <span align="name-color" style="background-color:{{$value->getTagColor($tag)}}">{{$all_tags[$tag]}}</span>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div align="center" class="box-inner" style="border-bottom: 2px solid #29af61">
                                                            <h3>{{$value->name}}</h3>
                                                            <div class="group-event-bottom">
                                                                <div class="col-md-12 event-location" style="text-align:left;padding-right: 0;">
                                                                    @if(!empty($value->city))
                                                                    <p><span class="icon-field"></span> {{$value->city}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 event-cost" style="text-align:left;">
                                                                    <p><span class="icon-field"></span> {{$value->cost}}</p>
                                                                </div>
                                                                <div class="col-md-6 distance"><span class="icon-field"></span>{{$value->distance.$value->distance_type}}</div>
                                                            </div>
                                                            <div class="col-md-12 date-event" style="text-align:left;">
                                                                <p class="date-moreellipses"><span class="icon-field"></span> <span class="date-more">{{$value->date_time}}</span></p>
                                                            </div>
                                                            <div class="col-md-12"> <span> <a class="eventReadMoreButton" data-eventid="78" data-supplierid="39" href="{{url('/event/'.$url[1])}}"> <input class="button" type="button" value="More Information"> </a> </span></div>
                                                            <br clear="both">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                <br clear="both">
                                <div class="text-center">
                                    <div class="item-list">
                                        {{$all_events->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="block-block-34" class="block block-block hide">
                        <div class="content">
                            <h1 class="title" id="page-title">Events All</h1></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
@endsection