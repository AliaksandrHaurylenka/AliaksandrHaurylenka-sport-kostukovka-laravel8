@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pride.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.prides.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.pride.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Имя Фамилия', 'required' => '']) !!}
                    <p class="help-block">Имя Фамилия</p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.pride.fields.photo').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required' => '']) !!}
                    {!! Form::hidden('photo_max_size', 2) !!}
                    {!! Form::hidden('photo_max_width', 4096) !!}
                    {!! Form::hidden('photo_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('photo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.pride.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sport_section', trans('quickadmin.pride.fields.sport-section').'*', ['class' => 'control-label']) !!}

                    {{Form::select('section_id',
                        $sections,
                        null,
                        ['class' => 'form-control select2'])
                    }}
                    <p class="help-block"></p>
                    @if($errors->has('section_id'))
                        <p class="help-block">
                            {{ $errors->first('section_id') }}
                        </p>
                    @endif

                    {{--<p class="help-block"></p>
                    @if($errors->has('sport_section'))
                        <p class="help-block">
                            {{ $errors->first('sport_section') }}
                        </p>
                    @endif--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'swimming', false, ['required' => '']) !!}
                            Плавание
                        </label>
                    </div>--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'wrestling', false, ['required' => '']) !!}
                            Борьба
                        </label>
                    </div>--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'light athletics', false, ['required' => '']) !!}
                            Легкая атлетика
                        </label>
                    </div>--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'heavy athletics', false, ['required' => '']) !!}
                            Тяжелая атлетика
                        </label>
                    </div>--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'football', false, ['required' => '']) !!}
                            Футбол
                        </label>
                    </div>--}}
                    {{--<div>
                        <label>
                            {!! Form::radio('sport_section', 'volleyball', false, ['required' => '']) !!}
                            Волейбол
                        </label>
                    </div>--}}
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')