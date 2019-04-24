@section('head')
@if(!empty($page->meta_title))
<!-- some comment-->
<meta name="title" content="{{$page->meta_title}}" />
@endif
@if(!empty($page->meta_description))
<meta name="description" content="{{$page->meta_description}}" />
@endif
@if(!empty($page->url))
<meta property="og:url" content="{{$page->url}}" />
@endif
@endsection