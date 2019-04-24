@extends('fronts.front')
@section('content')
@php
$media = $blog->getMedia('blog_image')->last();
$bmedia_name = isset($media->name) ? $media->name : "";
$media_url = ($media != null) ? $media->getUrl() : "";  
@endphp
<div class="not-front">
    <div class="main-content container" role="main">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 content">
                <section class="section main-content" id="region-content">
                    <div class="tabs"></div>
                    <div class="region region-content">
                        <div id="block-system-main" class="block block-system">
                            <div class="content">
                                <div id="node-2249" class="node node-article clearfix" about="/blog/preparing-mud-run-obstacle" typeof="sioc:Item foaf:Document"> <span property="dc:title" content="Preparing For a Mud Run" class="rdf-meta element-hidden"></span>
                                    <div class="submitted"></div>
                                    <div class="content">
                                        <div class="main-box">
                                            <div class="btnred"><a href="{{url('/articles/all')}}">Back To Results</a></div>
                                            <div class="share-boxes">
                                                <div class="addthis_sharing_toolbox"></div>
                                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57a45555ee68a1de"></script>
                                            </div>
                                            <div class="share-boxes-mob"></div>
                                            <br clear="both">
                                            <br>
                                            <br>
                                            <br>
                                            <h1 class="articleh1">{{$blog->title}}</h1>
                                            <br>
                                            <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                <div class="field-items">
                                                    <div class="field-item even" property="content:encoded">
                                                        {!! $blog->main_content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-second">
                                            <div class="related_articles">
                                                <div class="view view-related-articles view-id-related_articles view-display-id-block view-dom-id-ac126b66143d718f57d47062a65cadf9">
                                                    <div class="view-header">
                                                        <div class="block-title">
                                                            <h2>Related articles</h2></div>
                                                    </div>
                                                    <div class="view-content">
                                                        @foreach($related_articles as $blog)
                                                        @php
                                                        $media = $blog->getMedia('blog_image')->last();
                                                        $bmedia_name = isset($media->name) ? $media->name : "";
                                                        $media_url = ($media != null) ? $media->getUrl() : "";  
                                                        $url = explode('/blog/', $blog->url);
                                                        if (!isset($url[1])) {
                                                            $url = explode('/article/', $blog->url);
                                                            $blog_url = '/article/'.$url[1];
                                                        } else {
                                                            $blog_url = '/blog/'.$url[1];
                                                        }
                                                        @endphp
                                                        <div class="views-row views-row-1 views-row-odd views-row-first">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="{{$media_url}}" width="100" height="61" alt="motivational quote" title="motivational quote" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="{{$blog_url}}">{{$blog->title}}</a></span></div>
                                                        </div>
                                                        @endforeach
                                                        {{--  <div class="views-row views-row-2 views-row-even">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/field/image/benefits%20of%20exercise.jpg?itok=PTMTZaVd" width="100" height="55" alt="looking at the benefits of exercise" title="benefits of exercise" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/what-are-the-benefits-of-exercise">What are the benefits of exercise?</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-3 views-row-odd">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/winter%2520running.jpg?itok=TeNbKkkQ" width="100" height="66" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/gear-running-winter">Running Tips: Gear for Running in Winter</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-4 views-row-even">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/8183925418_5023b77383_h.jpg?itok=c2LPkAl3" width="100" height="67" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/running-tips-how-to-pick-the-right-running-shoes">Running Tips: How to Pick the Right Running Shoes</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-5 views-row-odd">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/run%2520recovery.png?itok=fZoLi1-o" width="100" height="55" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/running-tips-how-to-recover-from-a-run">Running Tips: How to recover from a run</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-6 views-row-even">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/mesoecto.png?itok=pT1WcSVO" width="100" height="57" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/article/32/body-types-what-is-an-ectomorph-mesomorph-or-endomorph">Body Types: What is an Ectomorph, Mesomorph or Endomorph?</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-7 views-row-odd">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/Preparing%2520for%2520your%2520first%25205k.jpg?itok=kaGQC3F6" width="100" height="55" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/running-tips-how-to-train-for-a-5k">Running Tips: How to train for a 5k</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-8 views-row-even">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/RaceForLifeCancerResearchUK.jpg?itok=roQzgUG3" width="100" height="55" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/blog/early-bird-race-for-life-cancer-research">Early Bird: Race For Life - Cancer Research</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-9 views-row-odd">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/running%2520music.png?itok=Nu58H1W2" width="100" height="67" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/article/does-listening-to-music-make-you-faster">Does Listening to Music make you faster?</a></span></div>
                                                        </div>
                                                        <div class="views-row views-row-10 views-row-even views-row-last">
                                                            <div class="views-field views-field-field-image">
                                                                <div class="field-content"><img typeof="foaf:Image" src="https://www.ukfitnessevents.co.uk/sites/default/files/styles/thumbnail/public/image.jpeg?itok=2PLYnVn7" width="100" height="55" /></div>
                                                            </div>
                                                            <div class="views-field views-field-title"> <span class="field-content"><a href="/article/58/top-5-foods-to-eat-before-a-workout">Top 5 foods to eat before a workout</a></span></div>
                                                        </div>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="newsletter">
                                                <div class="block-title">
                                                    <h2>Newsletter</h2></div>
                                                <form class="mailchimp-signup-subscribe-form" action="/blog/preparing-mud-run-obstacle" method="post" id="mailchimp-signup-subscribe-block-e-newsletter-form--2" accept-charset="UTF-8">
                                                    <div>
                                                        <div class="mailchimp-signup-subscribe-form-description">Subscribe to our Newsletter and get the latest information on upcoming events.</div>
                                                        <div id="mailchimp-newsletter-76dfca1576-mergefields" class="mailchimp-newsletter-mergefields">
                                                            <div class="form-item form-type-textfield form-item-mergevars-EMAIL">
                                                                <label for="edit-mergevars-email--2">Email Address <span class="form-required" title="This field is required.">*</span></label>
                                                                <input class="form-control form-text required" type="text" id="edit-mergevars-email--2" name="mergevars[EMAIL]" value="" size="25" maxlength="128" />
                                                            </div>
                                                            <div class="form-item form-type-textfield form-item-mergevars-FNAME">
                                                                <label for="edit-mergevars-fname--2">First Name </label>
                                                                <input class="form-control form-text" type="text" id="edit-mergevars-fname--2" name="mergevars[FNAME]" value="" size="25" maxlength="128" />
                                                            </div>
                                                            <div class="form-item form-type-textfield form-item-mergevars-LNAME">
                                                                <label for="edit-mergevars-lname--2">Last Name </label>
                                                                <input class="form-control form-text" type="text" id="edit-mergevars-lname--2" name="mergevars[LNAME]" value="" size="25" maxlength="128" />
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="form_build_id" value="form-2BBt_86mu4dHbdDFPToR5Ogve0WRD6grBWMkx2U5T4k" />
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