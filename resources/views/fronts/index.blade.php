@extends('fronts.front')
@include('fronts.partials.head')
@section('content')
<div id="banner_fluid">
    <div class="banner_fluid">
        <div class="region region-banner-fluid">
            <div id="block-views-slider-block" class="block block-views slideshow-front">
                <div class="content">
                    <div class="view view-slider view-id-slider view-display-id-block view-dom-id-c50b94dfc5594563e580d90c7009c37e">
                        <div class="view-content">
                            <div id="slideshow" class="owl-carousel" style="opacity: 1;">
                                <div class="row-slider" style="background-image: url(https://www.ukfitnessevents.co.uk/sites/default/files/styles/slideshow/public/banner1_2.jpg?itok=mWtMa2qi)">
                                    <div class="container">
                                        <div class="flex-caption">
                                            <h1>Welcome to UK Fitness Events</h1>
                                            <div class="content-edit"><span class="field-content"></span></div>
                                            <div class="desc">Use our site to find the best challenges from leading event providers in the UK. Covering eight categories that include running, open water swimming, muddy runs and triathlons. With the latest indoor and outdoor events being added all the time, you’re sure to find the ultimate challenge to push yourself, whatever your fitness level.
                                            </div>
                                            <div class="read-more">
                                                <div class="field-content"><a href="https://www.ukfitnessevents.co.uk/events">Find Events</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-slider" style="background-image: url(https://www.ukfitnessevents.co.uk/sites/default/files/styles/slideshow/public/CharityChallenges.jpg?itok=-iposVk9)">
                                    <div class="container">
                                        <div class="flex-caption">
                                            <h1>Charity Challenges</h1>
                                            <div class="content-edit"><span class="field-content"></span></div>
                                            <div class="desc">Whether you’re a fun runner or an experienced sports enthusiast looking to fundraise for charity, there are a huge amount of charity-run fitness events to choose from. We have great links with charities that have places in all types of fundraising events across the UK, from fun runs and marathons to charity treks and moonlit cycle rides. </div>
                                            <div class="read-more">
                                                <div class="field-content"><a href="https://www.ukfitnessevents.co.uk/events">Find Events</a></div>
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
</div>
<div class="before-content">
    <div class="container">
        <div class="region region-before-content">
            <div id="block-views-popular-block" class="block block-views popular-home">
                <div class="content">
                    <div class="view view-popular view-id-popular view-display-id-block view-dom-id-94d1cda65b05971c9a5f901487ad59be">
                        <div class="view-content">
                            @foreach($tag_sports as $value)
                            <div class="views-row views-row-1 views-row-odd views-row-first col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <div class="media Walking">
                                    <div class="content-edit"></div>
                                    <div class="lower-div">
                                        <div class="outer-div"> 
                                            @php
                                                $media = $value->getMedia('tag_image')->last();
                                                $bmedia_name = isset($media->name) ? $media->name : "";
                                                //$tags_sports = explode(',', $value->tags_sport)
                                            @endphp
                                            <img typeof="foaf:Image" src="{{$media->getUrl()}}" width="550" height="350" alt="" />
                                            <h2>
                                                <span>{{$value->name}}</span>
                                            </h2>
                                            <div class="caption-wrapper">
                                                <div class="caption-body">{!! $value->description !!}</div>
                                            </div>
                                        </div>
                                        <div class="caption-buttons" style="background-color: #66cc99"> <a data-gal="prettyPhoto" class="caption-zoom" href="{{url('/event/', $value->name)}}">Find Events</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
        <div class="col-md-12 col-sm-12 col-xs-12 content">
            <section class="section main-content" id="region-content">
                <h1 class="title" id="page-title">Home</h1>
                <div class="tabs"></div>
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">
                        <div class="content">
                            <div id="node-2170" class="node node-page clearfix" about="/content/home" typeof="foaf:Document"> <span property="dc:title" content="Home" class="rdf-meta element-hidden"></span>
                                <div class="content"></div>
                            </div>
                        </div>
                    </div>
                    <div id="block-views-featured-block" class="block block-views featured_events">
                        <div class="block-title">
                            <h2 class="title">Featured Events</h2></div>
                        <div class="content">
                            <div class="view view-featured view-id-featured view-display-id-block view-dom-id-a74c52c15bbcfa44e3635aa710bad24a">
                                <div class="view-content">
                                    @foreach($featured_events as $value)
                                    <div class="views-row views-row-1 views-row-odd views-row-first col-md-4 col-lg-4 col-xs-12 col-sm-6 box form-group">
                                        <div about="/event/running/rifle-run" typeof="sioc:Item foaf:Document" class="ds-1col node node-event view-mode-event_listting clearfix">
                                            <div class="field field-name-event-summary field-type-ds field-label-hidden">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <div class="box-image">
                                                            @php
                                                            $media = $value->getMedia('event_image')->last();
                                                            $bmedia_name = isset($media->name) ? $media->name : "";
                                                            $tags_sports = explode(',', $value->tags_sport)
                                                            @endphp
                                                            <img alt="" src="{{$media->getUrl()}}" />
                                                            <div class="box-caption" align="center">
                                                                @foreach($tags_sports as $tsport)
                                                                <span align="name-color" style="background-color:#29af61">{{$tsport}}</span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div align="center" class="box-inner" style="border-bottom: 2px solid #29af61">
                                                            <h3>{{$value->name}}</h3>
                                                            <div class="group-event-bottom">
                                                                <div class="col-md-12 event-location" style="text-align:left;padding-right: 0;">
                                                                    <p><span class="icon-field"></span> Lane End</p>
                                                                </div>
                                                                <div class="col-md-6 event-cost" style="text-align:left;">
                                                                    <p><span class="icon-field"></span> {{$value->cost}}</p>
                                                                </div>
                                                                <div class="col-md-6 distance"></div>
                                                            </div>
                                                            <div class="col-md-12 date-event" style="text-align:left;">
                                                                <p class="date-moreellipses"><span class="icon-field"></span> <span class="date-more">{{date('d/m/Y', strtotime($value->date_time))}}</span></p>
                                                            </div>
                                                            <div class="col-md-12"> <span> <a class="eventReadMoreButton" data-eventid="78" data-supplierid="39" href="{{route('events.show', $value->id)}}"> <input class="button" type="button" value="More Information"> </a> </span></div>
                                                            <br clear="both">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="after-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="region region-after-content">
                    <div id="block-views-popular-provider-block" class="block block-views">
                        <div class="content">
                            <div class="view view-popular-provider view-id-popular_provider view-display-id-block view-dom-id-905cab07d7d8762d0042e1d7c41a5cd4">
                                <div class="view-header">
                                    <p>Companies we work with</p>
                                </div>
                                <div class="view-content">
                                    <div class="views-row views-row-1 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div> <span class="my-edit"></span></div>
                                        <div class="views-field views-field-field-s-logo">
                                            <div class="field-content">
                                                <div class="popular-provider-thumb">
                                                    <div>
                                                        <a href="events/provider/3549"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/popular_logo/public/The%20Soldiers%20Charity%20Logo.jpg?itok=dl_bn0NP" width="150" height="150" alt="The Soldiers Charity Logo" title="The Soldiers Charity Logo" /></a>
                                                    </div>
                                                    <div class="popular-provider-title">ABF The Soldiers&#039; Charity</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="views-row views-row-2 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div> <span class="my-edit"></span></div>
                                        <div class="views-field views-field-field-s-logo">
                                            <div class="field-content">
                                                <div class="popular-provider-thumb">
                                                    <div>
                                                        <a href="events/provider/2950"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/popular_logo/public/Gung-Ho%20Logo.jpg?itok=1T6O4oRA" width="150" height="150" /></a>
                                                    </div>
                                                    <div class="popular-provider-title">Gung-Ho</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="views-row views-row-3 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div> <span class="my-edit"></span></div>
                                        <div class="views-field views-field-field-s-logo">
                                            <div class="field-content">
                                                <div class="popular-provider-thumb">
                                                    <div>
                                                        <a href="events/provider/87"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/popular_logo/public/SpartanRaceLogo.png?itok=fw1ehO8d" width="150" height="47" /></a>
                                                    </div>
                                                    <div class="popular-provider-title">Spartan Race</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="views-row views-row-4 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div> <span class="my-edit"></span></div>
                                        <div class="views-field views-field-field-s-logo">
                                            <div class="field-content">
                                                <div class="popular-provider-thumb">
                                                    <div>
                                                        <a href="events/provider/2"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/popular_logo/public/ToughMudder.png?itok=UAqcv3OB" width="150" height="84" /></a>
                                                    </div>
                                                    <div class="popular-provider-title">Tough Mudder</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="views-row views-row-5 col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div> <span class="my-edit"></span></div>
                                        <div class="views-field views-field-field-s-logo">
                                            <div class="field-content">
                                                <div class="popular-provider-thumb">
                                                    <div>
                                                        <a href="events/provider/36"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/popular_logo/public/BritishHeartFoundationLogo.jpg?itok=e4E69OPg" width="150" height="84" /></a>
                                                    </div>
                                                    <div class="popular-provider-title">British Heart Foundation</div>
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
    </div>
</div>
@endsection