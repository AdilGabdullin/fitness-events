@extends('fronts.front')
@php

@endphp
@include('fronts.partials.head')
@section('content')
<div class="not-front">
<div class="main-content container" role="main">
    <div class="row">
        <div class="col-xs-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 content">
            <section class="section main-content" id="page-region-content">
                {!!$page->content!!}
            </section>
        </div>
    </div>
</div>
</div>
@endsection