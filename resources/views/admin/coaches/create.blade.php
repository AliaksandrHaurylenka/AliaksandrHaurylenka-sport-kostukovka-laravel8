@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.coach.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.coaches.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.coach.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Фамилия Имя Отчество', 'required' => '']) !!}
                    <p class="help-block">Фамилия Имя Отчество</p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.coach.fields.photo').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description', trans('quickadmin.coach.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => 'Год рождения, образование и т.п.', 'required' => '']) !!}
                    <p class="help-block">Год рождения, образование и т.п.</p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('section_id', trans('quickadmin.coach.fields.sport-section').'*', ['class' => 'control-label']) !!}
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
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('work', trans('quickadmin.coach.fields.work').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('work'))
                        <p class="help-block">
                            {{ $errors->first('work') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('work', 'Да', false, ['required' => '']) !!}
                            Да
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('work', 'Нет', false, ['required' => '']) !!}
                            Нет
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')