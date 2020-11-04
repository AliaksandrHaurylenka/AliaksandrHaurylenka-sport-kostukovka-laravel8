@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.main.title')</h3>
    
    {!! Form::model($data, ['method' => 'PUT', 'route' => ['admin.mains.update', $data->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($data->photo)
                        <img class="photo" src="{{ asset($data->getImageAdminPanel()) }}">
                    @endif
                    {!! Form::label('photo', trans('quickadmin.main.fields.photo').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
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
                
                
                <div class="col-xs-12 form-group">
                    {!! Form::label('drop', trans('quickadmin.main.fields.class'), ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('class'))
                        <p class="help-block">
                            {{ $errors->first('drop') }}
                        </p>
                    @endif
                
	                <div>
                        <label>
                            {!! Form::radio('class', 'active', false) !!}
                            Да
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('class', '', false) !!}
                            Нет
                        </label>
                    </div>
                </div>
            	
                <div class="col-xs-12 form-group">
                    {!! Form::label('position', trans('quickadmin.main.fields.position'), ['class' => 'control-label']) !!}
                    {!! Form::number('position', old('position'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('position'))
                        <p class="help-block">
                            {{ $errors->first('position') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.main.fields.description'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('block', trans('quickadmin.main.fields.block').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('block'))
                        <p class="help-block">
                            {{ $errors->first('block') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('block', 'Слайд', false, ['required' => '']) !!}
                            Слайд
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('block', 'Сооружение', false, ['required' => '']) !!}
                            Сооружение
                        </label>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')