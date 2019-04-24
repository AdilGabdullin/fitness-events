<div class="col-md-12">
    <div class="text-right blog-category-filter">
        Blog Filter <button id="blog_category_icon"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="blog-category-list">
            <form class="form" method="get" action="{{$filter_action}}" id="blog_filter_form">
                <ul>
                    @foreach($blog_categories as $value)
                        <li><input type="checkbox" name='blog_category_id[]' class="blog-filter-checkbox" value="{{$value->id}}" {{in_array($value->id, $selected_blog_category) ? 'checked' : ''}}> {{$value->name}}({{DB::table('blogs')->where('blog_category_id', $value->id)->count()}})</li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
</div>
@section('js')
<script>
    jQuery('#blog_category_icon').on('click', function () {
        jQuery('.blog-category-list').toggle();
    });
    jQuery('.blog-filter-checkbox').on('click', function () {
        jQuery('#blog_filter_form').submit();
    });
</script>
@endsection