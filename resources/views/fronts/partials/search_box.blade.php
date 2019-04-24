<div class="box-search">
    <div class="text-search-header">
        <h3>Search</h3>
    </div>
    <form action="{{url('/events/filter/tags')}}" method="get" accept-charset="UTF-8" id="event_filter">
        <div class="views-exposed-form">
            <div class="views-exposed-widgets clearfix">
                <div id="edit-keyword-wrapper" class="views-exposed-widget views-widget-filter-search_api_views_fulltext">
                    <label for="edit-keyword"> Keyword </label>
                    <div class="views-widget">
                        <div class="form-item form-type-textfield form-item-keyword">
                            <input class="form-control" type="text" name="s" value="{{isset($s) ? $s : ''}}" size="30" maxlength="128" />
                        </div>
                    </div>
                </div>
                <div class="views-exposed-widget views-submit-button">
                    <input class="btn btn-info form-submit" type="submit" name="" value="Search" /><i class="fa fa-angle-right submit-icon"></i></div>
            </div>
        </div>
        <button type="button" class="collapsible-button" data-toggle="collapse" data-target="#pppp"><span>Advanced Search</span><i class="fa fa-angle-down"></i>
        </button>
        <div id="pppp" class="provider-search collapse in">
            <div id="provider-list" class="collapse in" aria-expanded="true" style="">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="headingZero">
                            <h4 class="panel-title" data="sport">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#sport-list" aria-expanded="true" aria-controls="sport-list" class=""> Sport
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>

                                @if(!empty($selected_sport_tags))
                                <span class="atext-any">Multiple</span> </a>
                                <span class="link-any"><a href="{{url('/')}}/events">(x)</a></span>
                                @else
                                <span class="atext-any">Any</span> </a>
                                @endif
                            </h4>
                        </div>
                        <div id="sport-list" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingZero" aria-expanded="true" style="">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Sport</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <ul class="facetapi-facetapi-checkbox-links facetapi-facet-field-category facetapi-processed" id="facetapi-facet-search-apievent-display-block-field-category">
                                        @foreach($sports_tag as $tag)
                                        <li class="leaf first">
                                            <label class="element-invisible" for="facetapi-link--60--checkbox"> Apply Running filter </label>
                                            <input type="checkbox" name='sport_tags[]' class="event-checkbox" value="{{$tag->id}}" {{in_array($tag->id, $selected_sport_tags) ? 'checked' : ''}}><a href="/event/running" rel="nofollow" class="facetapi-checkbox facetapi-inactive facetapi-makeCheckbox-processed facetapi-disableClick-processed" id="facetapi-link--60"> {{$tag->name}} ({{DB::table('events')->where('date_time', '>=', Carbon\Carbon::now())->whereRaw("FIND_IN_SET($tag->id, tags_sport)")->count()}})</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="headingOne">
                            <h4 class="panel-title" data="region"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#region-list" aria-expanded="false" aria-controls="region-list" class="collapsed"> Region
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                @if(!empty($selected_region_tags))
                                <span class="atext-any">Multiple</span> </a>
                                <span class="link-any"><a href="{{url('/')}}/events">(x)</a></span>
                                @else
                                <span class="atext-any">Any</span> </a>
                                @endif</h4></div>
                        <div id="region-list" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Region</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <ul class="facetapi-facetapi-checkbox-links facetapi-facet-field-region facetapi-processed" id="facetapi-facet-search-apievent-display-block-field-region">
                                        @foreach($region_tags as $tag)
                                        <li class="leaf first">
                                            <label class="element-invisible" for="facetapi-link--47--checkbox"> Apply South East filter </label>
                                            <input type="checkbox" name='region_tags[]' class="event-checkbox" value="{{$tag->id}}" {{in_array($tag->id, $selected_region_tags) ? 'checked' : ''}}><a href="/event/south-east" rel="nofollow" class="facetapi-checkbox facetapi-inactive facetapi-makeCheckbox-processed facetapi-disableClick-processed" id="facetapi-link--47"> {{$tag->name}} ({{DB::table('events')->where('date_time', '>=', \Carbon\Carbon::now())->whereRaw("FIND_IN_SET($tag->id, tags_sport)")->count()}})</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="collapseFour">
                            <h4 class="panel-title" data="distance"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#distance-list" aria-expanded="false" aria-controls="distance-list" class="collapsed"> Distance <i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>
                                @if(!empty($selected_distance_tags))
                                <span class="atext-any">Multiple</span> </a>
                                <span class="link-any"><a href="{{url('/')}}/events">(x)</a></span>
                                @else
                                <span class="atext-any">Any</span> </a>
                                @endif</h4></div>
                        <div id="distance-list" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseFour" aria-expanded="false">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Distance</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <ul class="facetapi-facetapi-checkbox-links facetapi-facet-field-distance facetapi-processed" id="facetapi-facet-search-apievent-display-block-field-distance">
                                        @foreach($distance_tags as $tag)
                                        <li class="leaf first">
                                            <label class="element-invisible" for="facetapi-link--32--checkbox"> Apply 1-10 Miles filter </label>
                                            <input type="checkbox" name='distance_tags[]' class="event-checkbox" value="{{$tag->id}}" {{in_array($tag->id, $selected_distance_tags) ? 'checked' : ''}}><a href="/taxonomy/term/203" rel="nofollow" class="facetapi-checkbox facetapi-inactive facetapi-makeCheckbox-processed facetapi-disableClick-processed" id="facetapi-link--32"> {{$tag->name}} ({{DB::table('events')->where('date_time', '>=', \Carbon\Carbon::now())->whereRaw("FIND_IN_SET($tag->id, tags_sport)")->count()}})</a></li>
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="headingTwo">
                            <h4 class="panel-title" data="date"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#date-list" aria-expanded="false" aria-controls="date-list" class="collapsed"> Date <i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i> <span class="atext-any">Any</span></a></h4></div>
                        <div id="date-list" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Date</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="collapseThree">
                            <h4 class="panel-title" data="charity"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#charity-list" aria-expanded="false" aria-controls="charity-list" class="collapsed"> Charity <i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>
                                @if(!empty($selected_charity_sponsors))
                                <span class="atext-any">Multiple</span> </a>
                                <span class="link-any"><a href="{{url('/')}}/events">(x)</a></span>
                                @else
                                <span class="atext-any">Any</span> </a>
                                @endif</h4></div>
                        <div id="charity-list" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseThree" aria-expanded="false">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Charity</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <ul class="facetapi-facetapi-checkbox-links facetapi-facet-field-event-sponsor facetapi-processed" id="facetapi-facet-search-apievent-display-block-field-event-sponsor">
                                        @foreach($charity_sponsors as $tag)
                                        <li class="leaf first">
                                            <label class="element-invisible" for="facetapi-link--checkbox"> Apply Cancer Research UK filter </label>
                                            <input type="checkbox" name='charity_sponsors[]' class="event-checkbox" value="{{$tag->id}}" {{in_array($tag->id, $selected_charity_sponsors) ? 'checked' : ''}}><a href="/events/charity/39" rel="nofollow" class="facetapi-checkbox facetapi-inactive facetapi-makeCheckbox-processed facetapi-disableClick-processed" id="facetapi-link"> {{$tag->name}} ({{DB::table('events')->where('date_time', '>=', \Carbon\Carbon::now())->whereRaw("FIND_IN_SET($tag->id, charity_sponsors)")->count()}})</a></li>
                                            @endforeach
                                    </ul><a href="#" class="facetapi-limit-link">Show more</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="collapseFive">
                            <h4 class="panel-title" data="provider"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#provider-list-row" aria-expanded="false" aria-controls="provider-list-row" class="collapsed"> Provider
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                @if(!empty($selected_event_providers))
                                <span class="atext-any">Multiple</span> </a>
                                <span class="link-any"><a href="{{url('/')}}/events">(x)</a></span>
                                @else
                                <span class="atext-any">Any</span> </a>
                                @endif</h4></div>
                        <div id="provider-list-row" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseFive" aria-expanded="false">
                            <div class="panel-body">
                                <div class="flyout_header">
                                    <div class="flyout_title">Select Provider</div>
                                    <div class="right">
                                        <button type="button" class="sf-flyout">Close <i class="icon-x"></i></button>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <ul class="facetapi-facetapi-checkbox-links facetapi-facet-field-event-supplier facetapi-processed" id="facetapi-facet-search-apievent-display-block-field-event-supplier">
                                        @foreach($providers as $tag)
                                        <li class="leaf first">
                                            <label class="element-invisible" for="facetapi-link--68--checkbox"> Apply Tough Mudder filter </label>
                                            <input type="checkbox" name='event_providers[]' class="event-checkbox" value="{{$tag->id}}" {{in_array($tag->id, $selected_event_providers) ? 'checked' : ''}}><a href="/events/provider/2" rel="nofollow" class="facetapi-checkbox facetapi-inactive facetapi-makeCheckbox-processed facetapi-disableClick-processed" id="facetapi-link--68"> {{$tag->company_name}} ({{DB::table('events')->where('date_time', '>=', \Carbon\Carbon::now())->where("event_provider_id", $tag->id)->count()}})</a></li>
                                            @endforeach
                                    </ul><a href="#" class="facetapi-limit-link">Show more</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@section('js')
<script>
    jQuery('#event_filter .event-checkbox').on('click', function() {
        jQuery('#event_filter').submit();
    });
</script>
@endsection