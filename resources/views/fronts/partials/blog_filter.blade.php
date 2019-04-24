<div class="box-search">
    <div class="text-search-header">
        <h3>Filter</h3>
    </div>
    <form class="form" method="get" action="{{$filter_action}}" id="blog_filter_form">
        <div id="pppp" class="provider-search collapse in">
            <div id="provider-list" class="collapse in" aria-expanded="true" style="">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($blog_categories as $value)
                    <div class="panel panel-default">
                        <div class="panel-headings" role="tab" id="headingZero">
                            <h4 class="panel-title" data="sport">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#sport-list" aria-expanded="true" aria-controls="sport-list" class=""> <input type="checkbox" name='blog_category_id[]' class="blog-filter-checkbox" value="{{$value->id}}" {{in_array($value->id, $blog_category_id) ? 'checked' : ''}}> {{$value->name}}({{DB::table('blogs')->where('blog_category_id', $value->id)->count()}})
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</div>
@section('js')
    <script>
        jQuery('.blog-filter-checkbox').on('click', function () {
            jQuery('#blog_filter_form').submit();
        });
    </script>
@endsection