@extends('fronts.front')
@php
$media = $event->getMedia('event_image')->last();
$bmedia_name = isset($media->name) ? $media->name : "";
$media_url = ($media != null) ? $media->getUrl() : ""; 
$event_provider = $event->eventprovider;
$event_provider_media = $event_provider->getMedia('event_provider_image')->last();
$provider_url = ($event_provider_media != null) ? $event_provider_media->getUrl() : ""; 
@endphp
@section('content')
<div class="not-front">
<div class="main-content container" role="main">
    <div class="row">
        <div class="col-xs-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 content">
            <section class="section main-content" id="region-content">
                <div class="tabs"></div>
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">
                        <div class="content">
                            <div id="node-1214" class="node node-event clearfix" about="/event/duathlon/windsor-winter-duathlon" typeof="sioc:Item foaf:Document">
                                <div class="content">
                                    <div class="main-box" style="border-bottom: 2px solid #29af61">
                                        <div class="btnred"><a href="{{url('/events')}}">Back To Results</a></div>
                                        <div class="share-boxes">
                                            <div class="addthis_sharing_toolbox"></div>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57a45555ee68a1de"></script>
                                        </div>
                                        <div class="share-boxes-mob"></div>
                                        <br clear="both" />
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h1 class="articleh1">{{$event->name}}</h1>
                                        <br/>
                                        <div class="field field-name-field-summary field-type-text-long field-label-hidden">
                                            <div class="field-items">
                                                <div class="field-item even">
                                                   {!! $event->short_description !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-image">
                                            <div class="single-post-image">
                                                <div class="field field-name-field-image field-type-image field-label-hidden">
                                                    <div class="field-items">
                                                        <div class="field-item even">
                                                            <img typeof="foaf:Image" src="{{$media_url}}" width="690" height="380" alt="Participant cycling near Dorney Lake at duathlon Windsor Winter Duathlon" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="group-event-row">
                                                <div class="col-md-6">
                                                    <div class="field field-name-field-event-cost field-type-text field-label-above">
                                                        <div class="field-label">Cost:&nbsp;</div>
                                                        <div class="field-items">
                                                            <div class="field-item even">{{$event->cost}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-label"><b>Event Time:</b></div>
                                                    <div class="field-items">{{date('h:i:s', strtotime($event->date_time))}}</div>
                                                </div>
                                                <div class="col-md-6 date-event">
                                                    <div class="field-label">Event Date:&nbsp;</div>
                                                    <div class="date-more field-items">{{date('d/m/Y', strtotime($event->date_time))}}</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="field-label"><b>Event Distance:</b></div>
                                                    <div class="field-items cus-distance"> {{$event->distance}}{{$event->distance_type}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border-bottom: 2px solid #29af61" />
                                        <div class="event-description-detail">
                                            <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                <div class="field-items">
                                                    <div class="field-item even" property="content:encoded">
                                                        {!!$event->long_description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border-bottom: 2px solid #29af61" />
                                        <div class="event-location-detail">
                                            <p><b>Event Location: </b>{{$event->address.','.$event->city.','.$event->postcode}}</p>
                                            <div id="map"></div>
                                        </div>
                                        <hr style="border-bottom: 2px solid #29af61" />
                                        <h2>Charities & Sponsors</h2>
                                        @foreach($charities as $charity)
                                        <div class="row">
                                            <div class="box-row">
                                                <div class="col-md-3 pd-field">
                                                    <div class="ep-logo"> <img src="https://www.ukfitnessevents.co.uk/sites/default/files/AgeUKLogo.jpeg" alt="" /></div>
                                                </div>
                                                <div class="col-md-6 pd-field">
                                                    <h3>{{$charity->name}}</h3>
                                                    <br/> <span>Email Address: <a href="mailto:{{$charity->email}}" target="_top">{{$charity->email}}</a></span>
                                                    <br/> Phone number: {{$charity->phone}}</div>
                                                <div class="col-md-3 pd-field website"> <a target="_blank" href="{{$charity->website_link}}">Click for the website</a></div>
                                            </div>
                                            <br>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="sidebar-second">
                                        <div class="main-box-right" style="border-bottom: 2px solid #29af61">
                                            <h2>Event Provider</h2>
                                            <div class="sup-logo"> <img src="{{$provider_url}}" alt=""></div>
                                            <p class="event-above-label">
                                                <h3>Event Provider Name:</h3></p>
                                            <p>{{$event_provider->company_name}}</p>
                                            <p class="event-above-label">
                                                <h3>Event Website:</h3></p>
                                            <p><a target="_blank" href="{{$event->page_url}}">Click here</a></p>
                                            <p class="event-above-label">
                                                <h3>Email Address:</h3></p>
                                            <p><a href="mailto:{{$event_provider->email}}" target="_top">{{$event_provider->email}}</a></p>
                                            <p class="event-above-label">
                                                <h3>Phone Number:</h3></p>
                                            <p>{{$event_provider->phone}}</p>
                                            <div class="social-media"> <a class="facebook" target="_blank" href="{{$event_provider->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a class="twitter" target="_blank" href="{{$event_provider->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                                            <script type="text/javascript">
                                                var map;

                                                function initMap() {
                                                    var myLatLng = {
                                                        lat: {{$event->latitude}},
                                                        lng: {{$event->longitude}},
                                                    };
                                                    //var myLatLng = {lat: 53.3301718, lng: -2.3870527000000266};
                                                    var map = new google.maps.Map(document.getElementById('map'), {
                                                        center: myLatLng,
                                                        zoom: 8,
                                                    });
                                                    var marker = new google.maps.Marker({
                                                        position: myLatLng,
                                                        map: map,
                                                        title: ''
                                                    });
                                                }
                                            </script>
                                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwSf6J8uDH69gbAU8IUXbEyaXq0UnhJaE&callback=initMap">
                                            </script>
                                            <style type="text/css">
                                                #map {
                                                    height: 350px;
                                                }
                                            </style>
                                            <br/>
                                        </div>
                                        <div class="newsletter">
                                            <div class="block-title">
                                                <h4>Newsletter</h4></div>
                                            <form class="mailchimp-signup-subscribe-form" action="/event/duathlon/windsor-winter-duathlon" method="post" id="mailchimp-signup-subscribe-block-e-newsletter-form--2" accept-charset="UTF-8">
                                                <div>
                                                    <div class="mailchimp-signup-subscribe-form-description">Subscribe to our Newsletter and get the latest information on upcoming events.</div>
                                                    <div id="mailchimp-newsletter-76dfca1576-mergefields" class="mailchimp-newsletter-mergefields">
                                                        <div class="form-item form-type-textfield form-item-mergevars-EMAIL">
                                                            <label for="edit-mergevars-email--2">Email Address <span class="form-required" title="This field is required.">*</span></label>
                                                            <input type="text" id="edit-mergevars-email--2" name="mergevars[EMAIL]" value="" size="25" maxlength="128" class="form-text required" />
                                                        </div>
                                                        <div class="form-item form-type-textfield form-item-mergevars-FNAME">
                                                            <label for="edit-mergevars-fname--2">First Name </label>
                                                            <input type="text" id="edit-mergevars-fname--2" name="mergevars[FNAME]" value="" size="25" maxlength="128" class="form-text" />
                                                        </div>
                                                        <div class="form-item form-type-textfield form-item-mergevars-LNAME">
                                                            <label for="edit-mergevars-lname--2">Last Name </label>
                                                            <input type="text" id="edit-mergevars-lname--2" name="mergevars[LNAME]" value="" size="25" maxlength="128" class="form-text" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="form_build_id" value="form-GBHQv1MVYgTs8c92ylAYp9IL3qmbKaM1QwKWbhXnP3k" />
                                                    <input type="hidden" name="form_id" value="mailchimp_signup_subscribe_block_e_newsletter_form" />
                                                    <input class="btn btn-info form-submit" type="submit" id="edit-submit--2" name="op" value="Subscribe" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
@endsection