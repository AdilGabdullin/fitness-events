<div class="box box-success collapsed-box">
    <div class="box-header">
        <h3 class="box-title form-section-heading">Charity Sponsors </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="box-body" style="display: none" id="charity_box">
        <input type="hidden" name="no_of_charities" id="no_of_charities" value="{{count($charity_sponsors)}}">
        @if (count($charity_sponsors) > 0)
            <?php $i = 0; ?>
            @foreach ($charity_sponsors as $value)
                @if($i > 0)
                    <div class="row charities">
                        <div class="col-sm-1">
                            {!! Form::label('charity_name_'.$i, 'Charity', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2" id="list_of_charities">
                            {!! Form::select('charity_sponsors[]', $scharities, $value->id, array('class' => 'form-control', 'onchange'=>'charityOnChange(this)')) !!}
                            {!! Form::hidden('charity_name_'.$i, $value->name, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_phone_'.$i, 'Phone', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_phone_'.$i, $value->phone, array('id'=>'charity_phone', 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_email_'.$i, 'Email', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_email_'.$i, $value->email, array('id'=>'charity_email', 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_url_'.$i, 'Url', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_url_'.$i, $value->website_link, array('id'=>'charity_url','class' => 'form-control')) !!}
                        </div>
                    </div>
                @else
                    <div class="row charities">
                        <div class="col-sm-1">

                            {!! Form::label('charity_name', 'Charity', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2" id="list_of_charities">
                            {!! Form::select('charity_sponsors[]', $scharities, $value->id, array('class' => 'form-control', 'onchange'=>'charityOnChange(this)')) !!}
                            {!! Form::hidden('charity_name', $value->name, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_phone', 'Phone', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_phone', $value->phone, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_email', 'Email', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_email', $value->email, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-1">
                            {!! Form::label('charity_url', 'Url', ['class'=>'text-right']) !!}
                        </div>
                        <div class="col-sm-2">
                            {!! Form::text('charity_url', $value->website_link, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                @endif
                <?php $i++; ?>
            @endforeach
        @else
            <div class="row charities">
                <div class="col-sm-1">
                    {!! Form::label('charity_name', 'Charity', ['class'=>'text-right']) !!}
                </div>
                <div class="col-sm-2" id="list_of_charities">
                    {!! Form::select('charity_sponsors[]', $scharities, null, array('class' => 'form-control', 'onchange'=>'charityOnChange(this)')) !!}
                    {!! Form::hidden('charity_name', null, array('class' => 'form-control')) !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::label('charity_phone', 'Phone', ['class'=>'text-right']) !!}

                </div>
                <div class="col-sm-2">
                    {!! Form::text('charity_phone', null, array('class' => 'form-control')) !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::label('charity_email', 'Email', ['class'=>'text-right']) !!}

                </div>
                <div class="col-sm-2">
                    {!! Form::text('charity_email', null, array('class' => 'form-control')) !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::label('charity_url', 'Url', ['class'=>'text-right']) !!}

                </div>
                <div class="col-sm-2">
                    {!! Form::text('charity_url', null, array('class' => 'form-control')) !!}
                </div>
            </div>
        @endif
        <a href="javascript:;" class="btn btn-info" id="add_charities">Add New</a>
    </div>
</div>