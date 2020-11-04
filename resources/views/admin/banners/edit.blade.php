@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.banner.title')</h3>
    
    {!! Form::model($data, ['method' => 'PUT', 'route' => ['admin.banners.update', $data->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($data->banner)
                        <img class="photo" src="{{ asset($data->getImageAdminPanel()) }}">
                    @endif
                    {!! Form::label('banner', trans('quickadmin.banner.fields.banner').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('banner', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('banner_max_size', 2) !!}
                    {!! Form::hidden('banner_max_width', 4096) !!}
                    {!! Form::hidden('banner_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('banner'))
                        <p class="help-block">
                            {{ $errors->first('banner') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', trans('quickadmin.banner.fields.link').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Интернет ссылка ресурса', 'required' => '']) !!}
                    <p class="help-block">Интернет ссылка ресурса</p>
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

