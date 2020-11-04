@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.gomelglass.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.gomelglasses.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.gomelglass.fields.photo').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description', trans('quickadmin.gomelglass.fields.description').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('sport', trans('quickadmin.gomelglass.fields.sport').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sport'))
                        <p class="help-block">
                            {{ $errors->first('sport') }}
                        </p>
                    @endif
                    
                        <label>{!! Form::radio('sport', 'Настольный теннис', false, ['required' => '']) !!}Настольный теннис</label>
                        <label>{!! Form::radio('sport', 'Лыжи', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Лыжи</label>
                        <label>{!! Form::radio('sport', 'Плавание', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Плавание</label>
                        <label>{!! Form::radio('sport', 'Волейбол', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Волейбол</label>
                        <label>{!! Form::radio('sport', 'Многоборье', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Многоборье</label>
                        <label>{!! Form::radio('sport', 'Шахматы', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Шахматы</label>
                        <label>{!! Form::radio('sport', 'Дартс', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Дартс</label>
                        <label>{!! Form::radio('sport', 'Футбол', false, ['required' => '', 'style' => 'margin-left: 1rem']) !!}Футбол</label>
                    
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')