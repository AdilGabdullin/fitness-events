@extends('fronts.front')
@section('content')
<div class="not-front">        
<div class="main-content container" role="main">
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 content-left">
            <div class="sidebar" id="sidebar-first">
                <div class="region region-sidebar-first">
                    <div id="block-block-11" class="block block-block event-search">
                        <div class="content">
                            @include('fronts.partials.blog_filter')
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
                <h1 class="title" id="page-title">Articles</h1>
                <div class="tabs"></div>
                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">
                        <div class="content">
                            <div class="view view-article-listing view-id-article_listing view-display-id-page_1 article-listing row view-dom-id-a158a9215952c3d6a79bd30f3b05e5ff">
                                <div class="view-content">
                                    @foreach($blogs as $value)
                                    @php
                                    $media = $value->getMedia('blog_image')->last();
                                    $bmedia_name = isset($media->name) ? $media->name : "";
                                    $media_url = ($media != null) ? $media->getUrl() : ""; 
                                    //$tags_sports = explode(',', $value->tags_sport);
                                    $description = strip_tags($value->main_content);
                                    if (strlen($description) > 220) {
                                        $descriptionCut = substr($description, 0, 220);
                                        $endPoint = strrpos($descriptionCut, ' ');
                                        $description = $endPoint? substr($descriptionCut, 0, $endPoint) : substr($descriptionCut, 0);
                                        $description .= '...';
                                    }
                                    $category_color = $value->blogCategoryColor();
                                    $url = explode('/blog/', $value->url);
                                    if (!isset($url[1])) {
                                        $url = explode('/article/', $value->url);
                                        $blog_url = '/article/'.$url[1];
                                    } else {
                                        $blog_url = '/blog/'.$url[1];
                                    }
                                    @endphp
                                    <div class="views-row views-row-1 views-row-odd views-row-first col-md-4 col-xs-6 box form-group mobile-row">
                                        <div about="/blog/race-to-the-stones-the-dixons-carphone-story" typeof="sioc:Item foaf:Document" class="ds-1col node node-article view-mode-article_listing clearfix">
                                            <div class="field field-name-article-summary field-type-ds field-label-hidden">
                                                <div class="field-items">
                                                    <div class="field-item even">
                                                        <div class="box-image"><img alt="{{$bmedia_name}}" src="{{$media_url}}" />
                                                            <div align="center" style="background-color: 
{{$category_color}}" class="box-caption"><span>{{$value->blogCategory->name}}</span></div>
                                                        </div>
                                                        <div align="center" class="box-inner" style="border-bottom: 2px solid {{$category_color}}">
                                                            <h2>{{$value->title}}</h2>
                                                            <div style="text-align:justify" class="justify-text articleText">
                                                                {!!$description!!}
                                                            </div>
                                                            <a href="{{url($blog_url)}}">
                                                                <input class="button" type="button" value="Read More"> </a>
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
                                        {{$blogs->appends(['blog_category_id'=>$blog_category_id])->links()}}
                                    </div>
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