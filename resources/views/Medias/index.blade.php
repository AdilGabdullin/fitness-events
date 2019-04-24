@extends('layouts.admin')

@section('content')
<aside class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading"><h1>All Medias <small></small></h1></div>

            <div class="panel-body">
                <div class="row" >
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('medias.index')}}" method="get" class="form-inline text-right" style="margin-bottom: 10px;">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s" placeholder="Keyword" value="{{isset($s) ? $s : ''}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($medias as $media)
                    <div class="col-sm-2">
                        <div class="media well">
                                <img src="{{$media->getUrl()}}" alt="" width="100%" height="100">
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="viewMediaContent{{$media->id}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row media-modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <div class="col-sm-7">
                                                        <img src="{{$media->getUrl()}}" alt="" width="100%">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="media-text">
                                                            <p> <strong>Name : </strong>{{$media->name}}</p>
                                                            <p> <strong>Alt : </strong>{{$media->name}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="#" class="text-success view-modal" data-toggle="modal" data-target="#viewMediaContent{{$media->id}}" id="viewMedia{{$media->id}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="col-sm-4">
                                        {{-- <a href="#" class="text-warning"><i class="fa fa-pencil"></i></a> --}}
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="#" onclick="return confirm('are you sure?')" class="text-danger">{!! Form::open(array('url' => 'medias/' . $media->id, 'class' => 'form-inline media-delete')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {{-- {!! Form::submit($delete_icon, array('class' => 'delete-btn')) !!} --}}
                                            <button type="submit"><i class='fa fa-trash-o'></i></button>
                                            {!! Form::close() !!}</a>
                                    </div>
                                </div>
                            {{--<span>{{trans('dashboard.total_employees')}} : {{$employees}}</span>--}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination pull-right">
                            {{ $medias->appends(['s'=>$s])->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
    
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
    <script>
          $(".view-modal").on('click', function() {
            $(".modal").addClass('in');
          });
        
            
    </script>

@endsection
